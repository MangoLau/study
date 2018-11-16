# 第8章 PHP5中处理XML
## 8.1 介绍
## 8.2 词汇   Vocabulary

**head标记** （\<head>和\</head>）包含的是指定了XML Example标题的嵌套的title标记。

**Body** 标记包括了背景属性。属性包含的是关于一个特定的标记的额外信息。
XML标准要求所有的属性都要有值。属性的值必须用单引号或者双引号包含起来。

## 8.3 解析XML    Parsing XML
### 8.3.1 SAX
### 8.3.2 DOM
#### 使用XPath
```php
<?php
$dom = new DomDocument();
$dom->load('test2.xml');
$xpath = new DOMXPath($dom);
$nodes = $xpath->query("*[local-name()='body']", $dom->documentElement);
echo $nodes->item(0)->getAttributeNode('background')->value, PHP_EOL;
```
#### 创建一个DOM树

## 8.4 SimpleXML
1. 属性表示元素的迭代器。
2. 数字索引表示元素。
3. 非数字索引表示属性。
4. 允许用字符串转换访问TEXT数据。

### 8.4.1 创建一个SimpleXML对象   Creating a SimpleXML Object
### 8.4.2 浏览SimpleXML对象     Browsing SimpleXML Objects
第一个规则是“属性表示元素的迭代器”，它表示你可以循环所有在<body>中的<p>标记，例如：
```php
foreach ($sx2->body->p as $p) {
}
```

第二个规则描述“数组索引表示元素”，它意味着你可以如此访问第二个<p>标签
```php
$sx->body->p[1];
```

第三个规则是“非数字索引表示属性”，它意味着你可以如此访问body标记的背景标签
```php
echo $sx->body['background'];
```

最后一个规则，“允许用字符串转化访问TEXT数据”，意味着你可以从元素中访问所有的文本数据。
通过下面的代码，我们可以把第二个<p>标记的内容输出（也就是结合规则2和4）：
```php
echo $sx->body->p[1];
```

### 8.4.3 保存SimpleXML对象     Storing SimpleXML Objects
```php
file_put_contents('filename.xml', $sx2->asXML());
```

## 8.5 PEAR
### 8.5.1 XML_Tree
### 8.5.2 XML_RSS
RSS(RDF Site Summary, Really Simple Syndication)源是XML的一个常用应用。

## 8.6 XML转换    Converting XML
### 8.6.1 XSLT
## 8.7 使用进行XML通信
### 8.7.1 XML-RPC
#### 信息
#### 请求
#### 响应
#### 错误
#### 客户端
#### 列举
#### 服务器

## 8.8 总结
