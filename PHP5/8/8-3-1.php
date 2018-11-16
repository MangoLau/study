<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/13
 * Time: 11:36
 */

$level = 0;
$char_data = '';

$xml = xml_parser_create('UTF-8');

xml_set_element_handler($xml, 'start_handler', 'end_handler');
xml_set_character_data_handler($xml, 'character_handler');

/**
 * 开始标记的处理器
 * @param $xml
 * @param $tag
 * @param $attributes
 */
function start_handler($xml, $tag, $attributes)
{
    global $level;
    // 从字符处理器中清空收集的数据
    flush_data();
    // 把属性变为一个字符串，然后输出
    echo PHP_EOL, str_repeat(' ', $level), ">>>$tag";
    foreach ($attributes as $key => $value) {
        echo " $key $value";
    }
    // 提高缩进级别
    $level++;
}


// 如果大小写折叠被开启（默认开启），标记名都是通过大写字母传递的。你可以通过设置XML解析器对象的选项来关掉这个特性，如下：
xml_parser_set_option($xml, XML_OPTION_CASE_FOLDING, false);

// 结束标记处理器没有传递属性数组，只有XML解析器对象和标记名：
function end_handler($xml, $tag)
{
    global $level;
    // 从字符处理器中清空收集的数据
    flush_data();
    // 减少缩进的尺度，并且打印结束标记
    $level--;
    echo str_repeat(' ', $level), "<<<$tag";
}

function character_handler($xml, $data)
{
    global $level;
    $data = explode("\n", wordwrap($data, 76 - ($level * 2)));
    foreach ($data as $line) {
        echo str_repeat(' ', ($level + 1)), $line, PHP_EOL;
    }
}

function flush_data()
{
    global $level, $char_data;
    // 当存在数据时，修正数据，并且输出
    $char_data = trim($char_data);
    if (strlen($char_data) > 0) {
        echo PHP_EOL;
        // 精心封装它，使它适合一个终端的屏幕
        $data = explode("\n", wordwrap($char_data, 76-($level * 2)));
        foreach ($data as $line) {
            echo str_repeat(' ', ($level + 1)) , "[", $line, "]", PHP_EOL;
        }
    }
}

// 在执行所有的处理器后，就可以开始解析XML文件了：
xml_parse($xml, file_get_contents('./test1.xhtml'));