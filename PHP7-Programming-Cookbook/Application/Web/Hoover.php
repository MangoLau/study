<?php
/**
 * Created by PhpStorm.
 * User: liuhongwei
 * Date: 2019-02-14
 * Time: 22:33
 */

namespace Application\Web;


class Hoover
{
    protected $content;

    /**
     * 获取目标网站的内容
     * @param $url
     * @return \DOMDocument
     */
    public function getContent($url)
    {
        if (!$this->content) {
            if (stripos($url, 'http') !== 0) {
                $url = 'http://' . $url;
            }
            $this->content = new \DOMDocument('1.0', 'utf-8');
            $this->content->preserveWhiteSpace = false;
            // @符号用于过滤掉配置错误的网页所生成的警告
            @$this->content->loadHTMLFile($url);
        }
        return $this->content;
    }

    /**
     * 提取感兴趣的标签
     * @param $url
     * @param $tag
     * @return array
     */
    public function getTags($url, $tag)
    {
        $count = 0;
        $result = [];
        $elements = $this->getContent($url)->getElementsByTagName($tag);
        foreach ($elements as $node) {
            $result[$count]['value'] = trim(preg_replace('/\s+/', ' ', $node->nodeValue));
            if ($node->hasAttributes()) {
                foreach ($node->attributes as $name => $attr) {
                    $result[$count]['attributes'][$name] = $attr->value;
                }
            }
            $count++;
        }
        return $result;
    }

    /**
     * 提取指定的属性
     * @param $url
     * @param $attr
     * @param null $domain
     * @return array
     */
    public function getAttribute($url, $attr, $domain = null)
    {
        $result = [];
        $elements = $this->getContent($url)->getElementsByTagName('*');
        foreach ($elements as $node) {
            if ($node->hasAttribute($attr)) {
                $value = $node->getAttribute($attr);
                if ($domain) {
                    if (stripos($value, $domain) !== false) {
                        $result[] = trim($value);
                    }
                } else {
                    $result[] = trim($value);
                }
            }
        }
        return $result;
    }
}