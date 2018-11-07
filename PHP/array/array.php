<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/26 0026
 * Time: 14:34
 */
// 数值键
$state[0] = 'Delaware';
echo $state[0], '<br />';
$state[] = 'Pennsylvania';
echo $state[1];

// 关联键
$state['Delaware'] = 'December 7, 1787';
$state['Pennsylvania'] = 'December 12, 1787';
$state['New jersey'] = 'December 18, 1787';
var_dump($state);
echo '<hr>';


echo '<p>使用array()创建索引数组</p>';
$language = array('English', 'Gaelic', 'Spanish');
var_dump($language);
echo '<p>使用array()创建一个关联数组</p>';
$languages = array(
    'Spain' => 'Spanish',
    'Ireland' => 'Gaelic',
    'United States' => 'English'
);
var_dump($languages);


echo '<p>list()函数也array()类似，只是它可以在一次操作中从一个数组内提取多个值，同时为多个变量赋值。</p>';
// 打开users.txt文件
$users = fopen('users.txt', 'r');
// 若未达到EOF，则获取下一行
while ($line = fgets($users, 4096)) {
    // 用explode()分离数据片段
    list($name, $occupation, $color) = explode('|', $line);
    // 格式化数据并输出
    printf('Name: %s <br />', $name);
    printf('Occupation: %s <br />', $occupation);
    printf('Faviorite Color: %s <br />', $color);
}


echo '<hr><p>用预定义的值范围填充数组</p>';
// range()函数是一个快速创建数组的简单方法，并会使用low到high范围内的整数值填充数组。
$die = range(1, 6); // 类似于指定 $die = array(1, 2, 3, 4, 5, 6)
var_dump($die);
$even = range(0, 20, 2); // Array ( [0] => 0 [1] => 2 [2] => 4 [3] => 6 [4] => 8 [5] => 10 [6] => 12 [7] => 14 [8] => 16 [9] => 18 [10] => 20 )
var_dump($even);
$letters = range('A', 'F'); // Array ( [0] => A [1] => B [2] => C [3] => D [4] => E [5] => F )
var_dump($letters);


echo '<hr><p>测试数组</p>';
$states = array('Florida');
$state = 'Ohio';
printf('$states is an array: %s <br />', (is_array($states) ? 'TRUE' : 'FALSE'));
printf('$state is an array: %s <br />', (is_array($state) ? 'TRUE' : 'FALSE'));


echo '<hr><p>输出数组</p>';
$states = array('Ohio', 'Florida', 'Texas');
foreach ($states as $state) {
    echo $state,'<br />';
}
$customers = array(
    array('Jason Gilmore', 'jason@example.com', '614-999-9999'),
    array('Jesse James', 'jesse@example.net', '818-999-9999'),
    array('Donald Duck', 'donald@example.org', '212-999-9999')
);
foreach ($customers as $customer) {
    vprintf('<p>Name: %s<br />E-mail: %s<br />Phone: %s</p>', $customer);
}


echo '<hr><p>在数组头添加元素</p>';
$states = array('Ohio', 'New York');
array_unshift($states, 'California', 'Texas');
print_r($states);


echo '<hr><p>在数组尾添加元素。</p>';
$states = array('Ohio', 'New York');
array_push($states, 'California', 'Texas');
print_r($states);


echo '<hr><p>从数组头删除元素。array_shift()删除并返回数组中找到的第一个元素</p>';
$states = array('Ohio', 'New York', 'California', 'Texas');
$state = array_shift($states);
echo $state,'<br>';
print_r($states);


echo '<hr><p>从数组尾删除元素。删除并返回数组中找到的最后一个元素</p>';
$states = array('Ohio', 'New York', 'California', 'Texas');
$state = array_pop($states);
echo $state,'<br>';
print_r($states);


echo '<hr><p>搜索数组</p>';
$state = 'Ohio';
$states = array('Ohio', 'New York', 'California', 'Texas');
if (in_array($state, $states)) echo 'Not to worry, ',$state,' is smoke-free!';


echo '<hr><p>搜索关联数组键：array_key_exists(),如果在一个数组中找到一个指定的键，返回true，否则返回false</p>';
$state = array(
    'Delaware' => 'December 7, 1787',
    'Pennsylvania' => 'December 12, 1787',
    'Ohio' => 'March 1, 1803',
);
if (array_key_exists('Ohio', $state))
    printf('Ohio joined the Union on %s<br />', $state['Ohio']);


echo '<hr><p>搜索关联数组值：array_search(),在一个数组中搜索一个指定的键，如果找到则返回相应的键，否则返回false</p>';
$state = array(
    'Delaware' => 'December 7',
    'Pennsylvania' => 'December 12',
    'Ohio' => 'March 1',
);
$founded = array_search('December 7', $state);
if ($founded) printf('%s was founded on %s.', $founded, $state[$founded]);


echo '<hr><p>获取数组键；array array_keys ( array $input [, mixed $search_value = NULL [, bool $strict = false ]] )
 函数返回一个数组，其中包含所搜索数组中找到的所有键.如果指定了可选参数 search_value，则只返回该值的键名。否则 input 数组中的所有键名都会被返回。</p>';
$state = array(
    'Delaware' => 'December 7',
    'Pennsylvania' => 'December 12',
    'Ohio' => 'March 1',
);
$keys = array_keys($state);
$key = array_keys($state, 'March 1');
var_dump($key);
var_dump($keys);


echo '<hr><p>返回数组中所有的值；array array_values ( array $input ). 返回 input 数组中所有的值并给其建立数字索引。 </p>';
$state = array(
    'Delaware' => 'December 7',
    'Pennsylvania' => 'December 12',
    'Ohio' => 'March 1',
);
$values = array_values($state);
var_dump($values);


echo '<hr><p>返回数组中所有的值；array array_values ( array $input ). 返回 input 数组中所有的值并给其建立数字索引。 </p>';
$capitals = array(
    'Ohio' => 'Columbus',
    'Iowa' => 'Des Moines'
);
echo '<p>Can you name the capitals of these states?</p>';
while ($key = key($capitals)) {
    printf('%s <br />', $key);
    next($capitals); // 将指针往下移
}


echo '<hr><p>返回数组中的当前单元；mixed current ( array &$array ). 每个数组中都有一个内部的指针指向它"当前的"单元，初始指向插入到数组中的第一个单元。 </p>';
$capitals = array(
    'Ohio' => 'Columbus',
    'Iowa' => 'Des Moines'
);echo '<p>Can you name the states belonging to these capitals?</p>';
while ($key = current($capitals)) {
    printf('%s <br />', $key);
    next($capitals); // 将指针往下移
}


echo '<hr><p>返回数组中当前的键／值对并将数组指针向前移动一步.在执行 each() 之后，数组指针将停留在数组中的下一个单元或者当碰到数组结尾时停留在最后一个单元。如果要再用 each 遍历数组，必须使用 reset()。  </p>';
$foo = array("bob", "fred", "jussi", "jouni", "egon", "marliese");
$bar = each($foo);
print_r($bar);


echo '<hr><p>mixed next ( array &$array ) : 将数组中的内部指针向前移动一位.返回数组内部指针指向的下一个单元的值，或当没有更多单元时返回 FALSE。  </p>';
echo '<hr><p>mixed prev ( array &$array ) : 将数组的内部指针倒回一位。返回数组内部指针指向的前一个单元的值，或当没有更多单元时返回 FALSE。 </p>';
echo '<hr><p>mixed end ( array &$array ) : 将数组的内部指针指向最后一个单元 。
<b>参数array： 该数组是通过引用传递的，因为它会被这个函数修改。 这意味着你必须传入一个真正的变量，而不是函数返回的数组，因为只有真正的变量才能以引用传递。</b>
返回最后一个元素的值，或者如果是空数组则返回 FALSE。 </p>';
echo '<hr><p>mixed reset ( array &$array ) :将数组的内部指针指向第一个单元。返回数组第一个单元的值，如果数组为空则返回 FALSE</p>';

$transport = array('foot', 'bike', 'car', 'plane');
$mode = current($transport); // $mode = 'foot';
echo $mode,PHP_EOL;
$mode = next($transport);    // $mode = 'bike';
echo $mode,PHP_EOL;
$mode = next($transport);    // $mode = 'car';
echo $mode,PHP_EOL;
$mode = prev($transport);    // $mode = 'bike';
echo $mode,PHP_EOL;
$mode = end($transport);     // $mode = 'plane';
echo $mode,PHP_EOL;
$mode = reset($transport);
echo $mode,PHP_EOL;


echo '<hr><p>bool array_walk ( array &$array , callable $funcname [, mixed $userdata = NULL ] )。  使用用户自定义函数对数组中的每个元素做回调处理。将用户自定义函数 funcname 应用到 array 数组中的每个单元。

array_walk() 不会受到 array 内部数组指针的影响。array_walk() 会遍历整个数组而不管指针的位置。
</p>';
$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");

function test_alter(&$item1, $key, $prefix)
{
    $item1 = "$prefix: $item1";
}

function test_print($item2, $key)
{
    echo "$key. $item2<br />\n";
}

echo "Before ...:\n";
array_walk($fruits, 'test_print');

array_walk($fruits, 'test_alter', 'fruit');
echo "... and after:\n";

array_walk($fruits, 'test_print');


echo '<hr><p>确定数组大小: count() = sizeof(); int count ( mixed $var [, int $mode = COUNT_NORMAL ] )</p>
 <p>如果可选的 mode 参数设为 COUNT_RECURSIVE（或 1），count() 将递归地对数组计数。对计算多维数组的所有单元尤其有用。mode 的默认值是 0。count() 识别不了无限递归。 </p>';
$transport = array('foot', 'bike', 'car', 'plane');
echo count($transport),'<br />';
$food = array('fruits' => array('orange', 'banana', 'apple'),
    'veggie' => array('carrot', 'collard', 'pea'));

// recursive count
echo count($food, COUNT_RECURSIVE),'<br />'; // output 8


echo '<hr><p>统计数组出现的频度。array array_count_values ( array $input )   统计数组中所有的值出现的次数。返回一个关联数组，用 input 数组中的值作为键名，该值在数组中出现的次数作为值。</p>';
$array = array('1', 'Mango', 'Blue', '1', 'Red', '2');
$count_values = array_count_values($array);
var_dump($count_values);


echo '<hr><p>array array_unique ( array $array [, int $sort_flags = SORT_STRING ] )。移除数组中重复的值</p>';
$array = array('1', 'Mango', 'Blue', '1', 'Red', '2');
$array = array_unique($array);
var_dump($array);


echo '<hr><p><b>数组排序。</b></p>';
echo '<p>array array_reverse ( array $array [, bool $preserve_keys = false ] )  array_reverse() 接受数组 array 作为输入并返回一个单元为相反顺序的新数组。
 参数 preserve_keys 如果设置为 TRUE 会保留数字的键。 非数字的键则不受这个设置的影响，总是会被保留。 </p>';
$states = array('Ohio', 'New York', 'California', 'Texas');
$rstates = array_reverse($states);
$rstates2 = array_reverse($states, true);
var_dump($states);
var_dump($rstates);
var_dump($rstates2);


echo '<hr><p><b>交换数组中的键和值。</b>  array array_flip ( array $trans )   返回一个反转后的 array，例如 trans 中的键名变成了值，而 trans 中的值成了键名。<i>如果同一个值出现了多次，则最后一个键名将作为它的值，所有其它的都丢失了。 </i> </p>';
$state = array('Delaware', 'Pennsylvania', 'New Jersey', 'Pennsylvania');
$state = array_flip($state);
var_dump($state);


echo '<hr><p><b>数组排序。</b><i>bool sort ( array &$array [, int $sort_flags = SORT_REGULAR ] )</i>对数组按值由低到高排序。键/值关联不再保持</p>';
$fruits = array("lemon", "orange", "banana", "apple");
sort($fruits);
var_dump($fruits);


echo '<hr><p><b>数组排序。</b><i>bool asort ( array &$array [, int $sort_flags = SORT_REGULAR ] )</i>本函数对数组进行排序，数组的索引保持和单元的关联。主要用于对那些单元顺序很重要的结合数组进行排序。 </p>';
$fruits = array("lemon", "orange", "banana", "apple");
asort($fruits);
var_dump($fruits);


echo '<hr><p><b>以逆序对数组排序。</b><i>bool rsort ( array &$array [, int $sort_flags = SORT_REGULAR ] )</i>本函数对数组进行逆向排序（最高到最低）。此函数为 array 中的元素赋与新的键名。这将删除原有的键名，而不是仅仅将键名重新排序。</p>';
$fruits = array("lemon", "orange", "banana", "apple");
rsort($fruits);
var_dump($fruits);

echo '<hr><p><b> 对数组进行逆向排序并保持索引关系 。</b><i>bool arsort ( array &$array [, int $sort_flags = SORT_REGULAR ] )</i>主要用于对那些单元顺序很重要的结合数组进行排序。 </p>';
$fruits = array("lemon", "orange", "banana", "apple");
arsort($fruits);
var_dump($fruits);


echo '<hr><p><b> 数组自然排序 。</b><i>bool natsort ( array &$array )</i>本函数实现了一个和人们通常对字母数字字符串进行排序的方法一样的排序算法并保持原有键／值的关联，这被称为"自然排序"。</p>';
$pictures = array("picture1.jpg", "picture2.jpg", "picture10.jpg", "picture21.jpg", 'picture3.jpg');
natsort($pictures);
var_dump($pictures);

echo '<hr><p><b> 不区分大小写的自然排序 。</b><i>bool natcasesort ( array &$array )</i>用"自然排序"算法对数组进行不区分大小写字母的排序 </p>';
$pictures = array("picture1.jpg", "picture2.jpg", 'PICTURE4.JPG', "picture10.jpg", "picture21.jpg", 'picture3.jpg');
natcasesort($pictures);
var_dump($pictures);


echo '<hr><p><b> 按键值对数组排序 。</b><i>bool ksort ( array &$array [, int $sort_flags = SORT_REGULAR ] )</i>对数组按照键名排序，保留键名到数据的关联。本函数主要用于关联数组。</p>';
$fruits = array("d"=>"lemon", "a"=>"orange", "b"=>"banana", "c"=>"apple");
ksort($fruits);
var_dump($fruits);


echo '<hr><p><b> 以逆序对数组键排序 。</b><i>bool krsort ( array &$array [, int $sort_flags = SORT_REGULAR ] )</i>对数组按照键名逆向排序，保留键名到数据的关联。主要用于结合数组。 </p>';
$fruits = array("d"=>"lemon", "a"=>"orange", "b"=>"banana", "c"=>"apple");
krsort($fruits);
var_dump($fruits);


echo '<hr><p><b> 使用用户自定义的比较函数对数组中的值进行排序  。</b><i>bool usort ( array &$array , callable $cmp_function )</i>  本函数将用用户自定义的比较函数对一个数组中的值进行排序。如果要排序的数组需要用一种不寻常的标准进行排序，那么应该使用此函数。
 array<br />
输入的数组<br />
cmp_function<br />
在第一个参数小于，等于或大于第二个参数时，该比较函数必须相应地返回一个小于，等于或大于 0 的整数。<br />
</p>';
$dates = array(
    '10-10-2011',
    '2-17-2010',
    '2-16-2011',
    '1-01-2013',
    '10-10-2012'
);
var_dump($dates);
sort($dates);
echo '<p>Sorting the array using the sort() function:</p>';
var_dump($dates);
natsort($dates);
echo '<p>Sorting the array using the natsort() function:</p>';
var_dump($dates);

function DateSort($a, $b) {
    // 如果日期相等，则什么都不做
    if ($a == $b) return 0;
    // 反汇编日期
    list($amonth, $aday, $ayear) = explode('-', $a);
    list($bmonth, $bday, $byear) = explode('-', $b);
    // 如果没有前导0，则为月份加前导0
    $amonth = str_pad($amonth, 2, '0', STR_PAD_LEFT);
    $bmonth = str_pad($bmonth, 2, '0', STR_PAD_LEFT);
    // 如果没有前导0，则为日份加前导0
    $aday = str_pad($aday, 2, '0', STR_PAD_LEFT);
    $bday = str_pad($bday, 2, '0', STR_PAD_LEFT);
    // 重组日期
    $a = $ayear . $amonth . $aday;
    $b = $byear . $bmonth . $bday;
    // 确定是否$a > $date b
    return ($a > $b) ? 1 : -1;
}
usort($dates, 'DateSort');
echo '<p>Sorting the array using the usort() function:</p>';
var_dump($dates);



echo '<hr><p><b>合并数组。</b><i>array array_merge ( array $array1 [, array $... ] )</i>将一个或多个数组的单元合并起来，一个数组中的值附加在前一个数组的后面。返回作为结果的数组。

如果输入的数组中有相同的字符串键名，则该键名后面的值将覆盖前一个值。然而，如果数组包含数字键名，后面的值将不会覆盖原来的值，而是附加到后面。

如果只给了一个数组并且该数组是数字索引的，则键名会以连续方式重新索引。
</p>';
$face = array('J','K','Q','A');
$numbered = array('2','3','4','5','6','7','8','9','10');
$cards = array_merge($face, $numbered);
shuffle($cards);
var_dump($cards);


echo '<hr><p><b>递归地合并一个或多个数组</b><i>array array_merge_recursive ( array $array1 [, array $... ] )</i>将一个或多个数组的单元合并起来，一个数组中的值附加在前一个数组的后面。返回作为结果的数组。
如果输入的数组中有相同的字符串键名，则这些值会被合并到一个数组中去，这将递归下去，因此如果一个值本身是一个数组，本函数将按照相应的条目把它合并为另一个数组。然而，如果数组具有相同的数组键名，后一个值将不会覆盖原来的值，而是附加到后面。
</p>';
$class1 = array('John' => 100, 'James' => 85);
$class2 = array('Micky' => 78, 'John' => 45);
$classScores = array_merge_recursive($class1, $class2);
var_dump($classScores);


echo '<hr><p><b>创建一个数组，用一个数组的值作为其键名，另一个数组的值作为其值</b><i>  array array_combine ( array $keys , array $values )  </i>返回一个 array，用来自 keys 数组的值作为键名，来自 values 数组的值作为相应的值。 <b>返回合并的 array，如果两个数组的单元数不同则返回 FALSE。 </b></p>';
$abbreviations = array('AL', 'AK', 'AZ', 'AR');
$states = array('Alabama', 'Alaska', 'Arizona', 'Arkansas');
$stateMap = array_combine($abbreviations, $states);
var_dump($stateMap);


echo '<hr><p><b>把数组中的一部分去掉并用其它值取代 </b><i>  array array_splice ( array &$input , int $offset [, int $length = 0 [, mixed $replacement ]] )  </i>array_slice() 返回根据 offset 和 length 参数所指定的 array 数组中的一段序列。 </p>';
$states = array('Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut');
$subset = array_slice($states, 1, 3);
var_dump($subset);
$subset = array_slice($states, 2, -2);
var_dump($subset);


echo '<hr><p><b>从数组中取出一段</b><i>  array array_slice ( array $array , int $offset [, int $length = NULL [, bool $preserve_keys = false ]] )  </i>把 input 数组中由 offset 和 length 指定的单元去掉，如果提供了 replacement 参数，则用其中的单元取代。
注意 input 中的数字键名不被保留。 <br />
参数 <br />
input <br />
输入的数组。 <br />
offset <br />
如果 offset 为正，则从 input 数组中该值指定的偏移量开始移除。如果 offset 为负，则从 input 末尾倒数该值指定的偏移量开始移除。 <br />
length<br />
如果省略 length，则移除数组中从 offset 到结尾的所有部分。如果指定了 length 并且为正值，则移除这么多单元。如果指定了 length 并且为负值，则移除从 offset 到数组末尾倒数 length 为止中间所有的单元。小窍门：当给出了 replacement 时要移除从 offset 到数组末尾所有单元时，用 count($input) 作为 length。 <br />
replacement<br />
如果给出了 replacement 数组，则被移除的单元被此数组中的单元替代。 <br />
如果 offset 和 length 的组合结果是不会移除任何值，则 replacement 数组中的单元将被插入到 offset 指定的位置。 注意替换数组中的键名不保留。 <br />
如果用来替换 replacement 只有一个单元，那么不需要给它加上 array()，除非该单元本身就是一个数组、一个对象或者 NULL。 <br />
</p>';
$states = array('Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Connecticut');
$subset = array_splice($states, 2, -1, array('New York', 'Florida'));
var_dump($subset);
var_dump($states);


echo '<hr><p><b>计算数组的交集 </b><i>  array array_intersect ( array $array1 , array $array2 [, array $ ... ] )  </i> 返回一个数组，该数组包含了所有在 array1 中也同时出现在所有其它参数数组中的值。注意键名保留不变。 </p>';
$array1 = array('OH', 'CA', 'NY', 'HI', 'CT');
$array2 = array('OH', 'CA', 'NY', 'HI', 'IA');
$array3 = array('TX', 'MD', 'NE', 'OH', 'HI');
$intersection = array_intersect($array1, $array2, $array3);
var_dump($intersection);


echo '<hr><p><b>带索引检查计算数组的交集 </b><i>  array array_intersect_assoc ( array $array1 , array $array2 [, array $ ... ] )  </i> array_intersect_assoc() 返回一个数组，该数组包含了所有在 array1 中也同时出现在所有其它参数数组中的值。注意和 array_intersect() 不同的是键名也用于比较。 </p>';
$array1 = array('OH' => 'Ohio', 'CA' => 'California', 'HI' => 'Hawaii');
$array2 = array('50' => 'Hawii', 'CA' => 'California', 'OH' => 'Ohio');
$array3 = array('TX' => 'Texas', 'MD' => 'Maryland', 'OH' => 'Ohio');
$intersection = array_intersect_assoc($array1, $array2, $array3);
var_dump($intersection);


echo '<hr><p><b>计算数组的差集 </b><i>  array array_diff ( array $array1 , array $array2 [, array $... ] )  </i> 返回一个数组，该数组包括了所有在 array1 中但是不在任何其它参数数组中的值。注意键名保留不变。</p>';
$array1 = array('OH', 'CA', 'NY', 'HI', 'CT');
$array2 = array('OH', 'CA', 'NY', 'HI', 'IA');
$array3 = array('TX', 'MD', 'NE', 'OH', 'HI');
$diff = array_diff($array1, $array2, $array3);
var_dump($diff);


echo '<hr><p><b>带索引检查计算数组的差集 </b><i>  array array_diff_assoc ( array $array1 , array $array2 [, array $... ] )  </i> 返回一个数组，该数组包括了所有在 array1 中但是不在任何其它参数数组中的值。注意和 array_diff() 不同的是键名也用于比较。 </p>';
$array1 = array('OH' => 'Ohio', 'CA' => 'California', 'HI' => 'Hawaii');
$array2 = array('50' => 'Hawii', 'CA' => 'California', 'OH' => 'Ohio');
$array3 = array('TX' => 'Texas', 'MD' => 'Maryland', 'OH' => 'Ohio');
$diff = array_diff_assoc($array1, $array2, $array3);
var_dump($diff);


echo '<hr><p><b>返回一组随机的键 </b><i>  mixed array_rand ( array $input [, int $num_req = 1 ] )  </i> 从数组中取出一个或多个随机的单元，并返回随机条目的 $num_req 个键。  </p>';
$states = array('OH' => 'Ohio', 'CA' => 'California', 'HI' => 'Hawaii');
$randomStates = array_rand($states, 2);
var_dump($randomStates);


echo '<hr><p><b>将数组打乱 </b><i>  bool shuffle ( array &$array )  </i> 本函数打乱（随机排列单元的顺序）一个数组。 </p>';
$cards = array('2','3','4','5','6','7','8','9','10', 'J','K','Q','A');
shuffle($cards);
shuffle($cards);
shuffle($cards);
shuffle($cards);
var_dump($cards);


echo '<hr><p><b>对数组中的值求和 </b><i>  number array_sum ( array $array )  </i> 如果数组中包含其他数据类型（例如字符串），这些值将被忽略 </p>';
$grades = array(42, 'hello', 43);
$total = array_sum($grades);
echo $total;


echo '<hr><p><b>划分数组 </b><i>  array array_chunk ( array $input , int $size [, bool $preserve_keys = false ] )  </i><br />
参数 <br />
input<br />
需要操作的数组 <br />
size<br />
每个数组的单元数目 <br />
preserve_keys<br />
设为 TRUE，可以使 PHP 保留输入数组中原来的键名。如果你指定了 FALSE，那每个结果数组将用从零开始的新数字索引。默认值是 FALSE。
</p>';
$cards = array('2','3','4','5','6','7','8','9','10', 'J','K','Q','A');
shuffle($cards);
$hands = array_chunk($cards, 5);
var_dump($hands);


