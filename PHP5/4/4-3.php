<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/9
 * Time: 11:08
 */

class NumberSquared implements Iterator
{
    private $start, $end, $cur;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * 重新把迭代器指向列表的开始处
     */
    public function rewind()
    {
        $this->cur = $this->start;
    }

    /**
     * 返回当前位置的关键字
     * @return mixed
     */
    public function key()
    {
        return $this->cur;
    }

    /**
     * 放回当前位置的值
     * @return number
     */
    public function current()
    {
        return pow($this->cur, 2);
    }

    /**
     * 把迭代器移动到下一个关键字/值对
     */
    public function next()
    {
        $this->cur++;
    }

    /**
     * 判断是否还有更多的值
     * @return bool
     */
    public function valid()
    {
        return $this->cur <= $this->end;
    }
}

$obj = new NumberSquared(3, 7);

foreach ($obj as $k => $v) {
    echo 'The square of ', $k, ' is ', $v, PHP_EOL;
}
