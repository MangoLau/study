<?php
/**
 * Created by PhpStorm.
 * User: mangolau
 * Date: 2019/3/10
 * Time: 7:48 PM
 */

namespace Application\Web;


class Securityclass
{
    private $filter;
    private $validate;

    /**
     * Securityclass constructor.
     */
    public function __construct()
    {
        $this->filter = [
            'striptags' => function ($a) {
                return strip_tags($a);
            },
            'digits' => function ($a) {
                return preg_replace('/[^0-9]/', '', $a);
            },
            'alpha' => function ($a) {
                return preg_replace('/[^A-Z]/i', '', $a);
            },
        ];
        $this->validate = [
            'alnum' => function ($a) {
                return ctype_alnum($a);
            },
            'digits' => function ($a) {
                return ctype_digit($a);
            },
            'alpha' => function ($a) {
                return ctype_alpha($a);
            },
        ];
    }

    /**
     * @param $method
     * @param $params
     * @return bool
     */
    public function __call($method, $params)
    {
        preg_match('/^(filter|validate)(.*?)$/i', $method, $matches);
        $prefix = $matches[1] ?? '';
        $function = strtolower($matches[2] ?? '');
        if ($prefix && $function) {
            return $this->$prefix[$function]($params[0]);
        }
        return false;
    }
}