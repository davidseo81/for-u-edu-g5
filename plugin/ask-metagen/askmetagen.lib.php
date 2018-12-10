<?php

if (!defined('_GNUBOARD_')) {
    exit;
}

/**
 * ASK MetaTag Generator
 * 유료 프로그램입니다. 불법복제 금지
 */
class MetaTags {

    protected $indentation;
    protected $order;
    protected $tags = array();
    protected $g5;
    protected $board;

    /**
     * Create a new instance.
     *
     * @param string  $indentation
     * @param array   $order
     *
     * @return void
     */
    public function __construct($indentation = null, $order = null) {
        global $g5, $board;
        $this->g5 = $g5;
        $this->board = $board;
        //php 5.3 이하는 삼항연산자 생략하면 오류.
        $this->indentation = $indentation ? $indentation : '    ';
        $this->order = $order ? $order : array('title', 'meta', 'og', 'twitter', 'link', 'json-ld');
    }

    /**
     * 게시물 하나 가져오기
     * @param type $bo_table
     * @param type $wr_id
     * @param type $is_comment
     * @return type
     */
    public function get_view($bo_table, $wr_id, $is_comment = false) {
        $comment = " and wr_is_comment = '0'";
        if ($is_comment == true) {
            $comment = " and wr_is_comment = '1'";
        }
        $write_table = $this->g5['write_prefix'] . $bo_table;
        $sql = "SELECT * FROM `{$write_table}` where wr_parent = '{$wr_id}' {$comment}";
        $result = sql_query($sql);
        $data = array();
        while ($row = sql_fetch_array($result)) {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * 이미지 정보 하나만 가져오기
     * @param type $bo_table
     * @param type $wr_id
     * @return string
     */
    public function get_file($bo_table, $wr_id, $contents) {
        $images = array();
        $sql = " select * from {$this->g5['board_file_table']} where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' and (bf_type = '1' or bf_type = '2' or bf_type = '3') order by bf_no ";
        $result = sql_query($sql);

        //첨부이미지
        while ($row = sql_fetch_array($result)) {
            $images[] = G5_DATA_URL . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . $bo_table . DIRECTORY_SEPARATOR . $row['bf_file'];
        }

        //에디터로 등록된 이미지 검사
        $_img = get_editor_image($contents, false);
        foreach ($_img['1'] as $key => $value) {
            $images[] = $value;
        }

        return $images;
    }

    /**
     * 회원이미지
     * @param type $mb_id
     * @return string
     */
    public function get_member_image($mb_id) {
        $mb_dir = substr($mb_id, 0, 2);
        $icon_file = G5_DATA_PATH . '/member_image/' . $mb_dir . '/' . $mb_id . '.gif';
        if (file_exists($icon_file)) {
            $icon_url = G5_DATA_URL . '/member_image/' . $mb_dir . '/' . $mb_id . '.gif';
        } else {
            $icon_url = G5_URL . "/img/no_profile.gif";
        }
        return $icon_url;
    }

    /**
     * 내용관리 가져오기
     * @param type $co_id
     * @return type
     */
    public function get_content($co_id) {
        // 내용
        $sql = " select * from {$this->g5['content_table']} where co_id = '$co_id' ";
        $co = sql_fetch($sql);
        return $co;
    }

    /**
     * Build an HTML link tag.
     *
     * @param string  $key
     * @param string  $value
     *
     * @return string
     */
    public function link($key, $value) {
        if (!empty($value)) {
            $attributes = array('rel' => $key);

            if (is_array($value)) {
                foreach ($value as $key => $v) {
                    $attributes[$key] = $v;
                }
            } else {
                $attributes['href'] = $value;
            }

            $tag = $this->createTag('link', $attributes);

            $this->addToTagsGroup('link', $key, $tag);

            return $tag;
        }
    }

    /**
     * Build an HTML meta tag.
     *
     * @param string  $key
     * @param string  $value
     *
     * @return string
     */
    public function meta($key, $value) {
        if (!empty($value)) {
            $attributes = array('name' => $key);

            if (is_array($value)) {
                foreach ($value as $key => $v) {
                    $attributes[$key] = $v;
                }
            } else {
                $attributes['content'] = $value;
            }

            $tag = $this->createTag('meta', $attributes);

            $this->addToTagsGroup('meta', $key, $tag);

            return $tag;
        }
    }

    /**
     * Build an Open Graph meta tag.
     *
     * @param string   $key
     * @param string   $value
     * @param boolean  $prefixed
     *
     * @return string
     */
    public function og($key, $value, $prefixed = true) {
        if (!empty($value)) {
            $key = $prefixed ? "og:{$key}" : $key;
            $tag = $this->createTag('meta', array(
                'property' => $key,
                'content' => $value
            ));

            $this->addToTagsGroup('og', $key, $tag);

            return $tag;
        }
    }

    /**
     * Build an JSON linked data meta tag.
     *
     * @param array  $schema
     *
     * @return string
     */
    public function jsonld($schema) {
        if (!empty($schema)) {
            $json = json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

            $script = "<script type=\"application/ld+json\">\n" . $json . "\n</script>";

            // Fix schema indentation
            $this->tags['json-ld'][] = implode(
                    "\n" . $this->indentation,
                    explode("\n", $script)
            );

            return $script;
        }
    }

    /**
     * Build a Title HTML tag.
     *
     * @param string  $value
     *
     * @return string
     */
    public function title($value) {
        if (!empty($value)) {
            $tag = "<title>{$this->escapeAll($value)}</title>";

            $this->tags['title'][] = $tag;

            return $tag;
        }
    }

    /**
     * Build a Twitter Card meta tag.
     *
     * @param string   $key
     * @param string   $value
     * @param boolean  $prefixed
     *
     * @return string
     */
    public function twitter($key, $value, $prefixed = true) {
        if (!empty($value)) {
            $key = $prefixed ? "twitter:{$key}" : $key;
            $tag = $this->createTag('meta', array(
                'name' => $key,
                'content' => $value
            ));

            $this->addToTagsGroup('twitter', $key, $tag);

            return $tag;
        }
    }

    /**
     * Render all or a specific group of HTML meta tags
     *
     * @param mixed  $groups
     *
     * @return string
     */
    public function render($groups = null) {
        $groups = !is_null($groups) ? (array) $groups : $this->order;
        $html = array();

        foreach ($groups as $group) {
            $html[] = $this->renderGroup($group);
        }

        $html = implode('', $html);

        // Remove first indentation
        return preg_replace("/^{$this->indentation}/", '', $html, 1);
    }

    /**
     * Render all HTML meta tags from a specific group.
     *
     * @param string  $group
     *
     * @return string
     */
    protected function renderGroup($group) {
        if (!isset($this->tags[$group])) {
            return;
        }

        $html = array();

        foreach ($this->tags[$group] as $tag) {
            if (is_array($tag)) {
                foreach ($tag as $t) {
                    $html[] = $t;
                }
            } else {
                $html[] = $tag;
            }
        }

        return count($html) > 0 ? $this->indentation . implode("\n" . $this->indentation, $html) . "\n" : '';
    }

    /**
     * Add single HTML element to tags group.
     *
     * @param string  $group
     * @param string  $key
     * @param string  $tag
     *
     * @return void
     */
    protected function addToTagsGroup($group, $key, $tag) {
        if (isset($this->tags[$group][$key])) {
            $existingTag = $this->tags[$group][$key];

            if (is_array($existingTag)) {
                $this->tags[$group][$key][] = $tag;
            } else {
                $this->tags[$group][$key] = array($existingTag, $tag);
            }
        } else {
            $this->tags[$group][$key] = $tag;
        }
    }

    /**
     * Build an HTML attribute string from an array.
     *
     * @param array  $attributes
     *
     * @return string
     */
    protected function attributes(array $attributes) {
        $html = array();

        foreach ($attributes as $key => $value) {
            $element = $this->attributeElement($key, $value);

            if (!is_null($element)) {
                $html[] = $element;
            }
        }

        return count($html) > 0 ? ' ' . implode(' ', $html) : '';
    }

    /**
     * Build a single attribute element.
     *
     * @param string  $key
     * @param string  $value
     *
     * @return string
     */
    protected function attributeElement($key, $value) {
        if (!is_null($value)) {
            return $key . '="' . $this->escapeAll($value) . '"';
        }
    }

    /**
     * Build an HTML tag
     *
     * @param string  $tagName
     * @param array   $attributes
     *
     * @return string
     */
    protected function createTag($tagName, $attributes) {
        if (!empty($tagName) && is_array($attributes)) {
            return "<{$tagName}{$this->attributes($attributes)}>";
        }
    }

    /**
     * Replace special characters with HTML entities
     *
     * @param string  $value
     *
     * @return string
     */
    protected function escapeAll($value) {
        return htmlentities($value, ENT_QUOTES, 'UTF-8');
    }

}
