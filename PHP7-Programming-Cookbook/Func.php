<?php
Class Func
{
    /**
    * 冒泡排序
    * @param array $arr 要排序的数组
    * @return array 排好序后的数组
    */
    public static function bubleSort(array $arr):array
    {
        $len = count($arr);
        if ($len < 2) {
            return $arr;
        }
        for ($i = 0; $i < $len; $i++) {
            for ($j = $len - 1; $j > $i; $j--) {
                if ($arr[$j] < $arr[$j - 1]) {
                    $tmp = $arr[$j - 1];
                    $arr[$j - 1] = $arr[$j];
                    $arr[$j] = $tmp;
                }
            }
        }
        return $arr;
    }

    /**
    * 快速排序
    * 用第一值作为标准值，遍历其余数组值，小的往前排，大的往后排，直到从小到达为止
    * @param array $arr 要排序的数组
    * @return array 排好序的数组
    */
    public static function quickSort(array $arr):array
    {
        if (count($arr) < 2) {
            return $arr;
        }
        $lows = $gt = [];
        $tmpKey = key($arr);
        $tmpVal = array_shift($arr);
        foreach ($arr as $v) {
            if ($v <= $tmpVal) {
                $lows[] = $v;
            } else {
                $gt[] = $v;
            }
        }
        return array_merge(self::quickSort($lows), [$tmpKey => $tmpVal], self::quickSort($gt));
    }

    /**
    * 二分查找有序数组
    * @param array $array 有序数组
    * @param string|intval $k 要查找的值
    * @param intval $low 开始查找的最小索引
    * @param intval $high 开始查找的最大索引
    */
    public static function binSearch($array, $k, $low = 0, $high = 0) {
        if (count($array) != 0 && $high == 0) {
            $high = count($array);
        }
        if ($low <= $high) {
            $mid = intval(($low + $high) / 2);
            // var_dump(['min' => $low, 'max' => $high, 'mid' => $mid]);
            if ($array[$mid] == $k) {
                return $mid;
            } elseif ($k < $array[$mid]) {
                return self::binSearch($array, $k, $low = 0, $mid - 1);
            } else {
                return self::binSearch($array, $k, $mid + 1, $high);
            }
        } else {
            return false;
        }
    }

    public static function calNext($str)
    {
        $len = mb_strlen($str);
        $next[0] = -1;
        $i = 0;
        $j = 1;
        while ($j < $len) {
            var_dump(['i' => $i, 'j' => $j, 'strI' => $str[$i], 'strJ' => $str[$j]]);
            if ($i == -1 || $str[$i] == $str[$j]) {
                $i++;
                $j++;
                if ($j < $len) {
                    $next[$j] = $i;
                }
            } else {
                $i = $next[$i];
            }
        }
        return $next;
    }
}