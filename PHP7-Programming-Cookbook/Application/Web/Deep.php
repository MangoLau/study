<?php
/**
 * Created by PhpStorm.
 * User: liuhongwei
 * Date: 2019-02-18
 * Time: 22:21
 */

namespace Application\Web;


class Deep
{

    protected $domain;

    /**
     * @param $url
     * @param $tag
     * @return \Generator|int
     */
    public function scan($url, $tag)
    {
        $vac = new Hoover();
        $scan = $vac->getAttribute($url, 'href', $this->getDomain($url));
        foreach ($scan as $subSite) {
            yield from $vac->getTags($subSite, $tag);
        }
        return count($scan);
    }

    /**
     * @param $url
     * @return string $dns = DNS domain
     */
    public function getDomain($url)
    {
        if (!$this->domain) {
            $this->domain = parse_url($url, PHP_URL_HOST);
        }
        return $this->domain;
    }
}