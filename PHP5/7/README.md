# 第7章 错误处理
## 7.1 介绍
## 7.2 错误类型 Types of Errors
### 7.2.1 编程错误  Programming Errors
**语法/解析错误**

语法错误和其他解析错误是在文件编译的时候发现的，在PHP开始执行它之前。
```php
<?php
print "Hello!\n";
<gobbledigook/>
?>
```
**Eval**
```php
<?php
print "Hello!\n";
eval("<gobbledigook/>");
?>
```
这次错误是在执行的过程中显示的。这是因为用eval()执行的代码一直到eval()本身被执行时才编译。

**Include/Require**

如果你的脚本包含另一个有解析错误的文件，编译将在解析错误时停止。
解析错误之前的代码和声明被编译，而错误之后的代码将被丢弃。
这意味着如果文件中有解析错误的话你将得到一个编译一半的文件。

### 7.2.2 未定义符号 Undefined Symbols
当PHP执行的时候，它可能遇到许多变量、函数等它不知道的名字。

**变量和常量**

**数组索引**

**函数和类**

**逻辑错误**

### 7.2.3 通用性错误 Portability Errors
#### 操作系统差异

#### PHP配置差异

#### 魔术引用

#### SAPI差异

#### 处理通用性

#### 通用化工具

### 7.2.4 运行错误  Runtime Errors

### 7.2.5 PHP错误     PHP Errors
#### 错误级别
E_ERROR

    这是一个严重的、不可恢复的错误。
E_WARNING

    这是最普遍的错误类型。
E_PARSE

    解析错误在编译的时候发生，而且会强制PHP在执行前退出。
    
E_STRICT

E_NOTICE

    表示运行的代码可能在操作未知的一些事情，例如读取未定义的变量。

E_CORE_ERROR

    这个内部的PHP错误是由于扩展启动失败导致的，而且会导致PHP运行退出。

E_COMPILE_ERROR

    编译错误是在编译的时候发送，而且与E_PARSE不同。这个错误会导致PHP运行退出。

E_COMPILE_WARNING

    这个编译时出现的警告告诉用户一些不推荐使用的语法信息。

E_USER_ERROR

    这个用户定义的错误导致PHP退出执行。

E_USER_WARNING

    这个用户定义的错误不会导致PHP退出执行。脚本可以用它来通知一个执行失败，相应地执行失败PHP也会用E_WARNING来通知。

E_USER_NOTICE

    这个用户定义的通过可以用来在脚本中表示可能存在的错误（类似E_NOTICE）。

#### 错误报告

#### 定义错误处理器

#### 抑制错误

## 7.3 PEAR错误   PEAR Errors
#### 捕获错误
#### 产生错误
### 7.3.1 PEAR_Error类   The PEAR_Error Class
### 7.3.2 处理PEAR错误  Handling PEAR Errors
### 7.3.3 PEAR错误模式  PEAR Error Modes
### 7.3.4 巧妙的处理     Graceful Handling
## 7.4 异常处理     Exceptions

## 7.5 总结
