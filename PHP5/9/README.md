# 第9章 主流扩展  Mainstream Extensions
## 9.1 介绍

## 9.2 文件与流     Files and Streams
### 9.2.1 文件访问  File Access
### 9.2.2 程序输入/输出   Program Input/Output
#### popen()
#### proc_open()
#### 文件描述符
#### 管道
#### 文件

### 9.2.3 输入/输出流    Input/Output Streams
通过PHP，你可以把stdin、stdout和stderr当作文件来使用。

### 9.2.4 压缩流   Compression Streams

### 9.2.5 用户流   User Streams

### 9.2.6 URL流  URL Streams
PHP支持的基础URL流包括：
- http://。针对位于一个HTTP服务器上的文件。
- https://。针对位于一个使用ssl的HTTP服务器上的文件。
- ftp://。针对位于一个FTP服务器上的文件。
- ftps://。针对位于一个支持ssl的FTP服务器上的文件。

对于HTTP或者FTP服务器的认证，你可以在URL的主机名前面加上username:password@，如下所示：
```php
$fp = fopen('ftp://derick:sercret@ftp.php.net', 'wb');
```
HTTP处理器只支持文件的读取，所以你需要指定模式为rb。
FTP处理器支持打开一个读取或者写入模式的流，但是不能同时打开读取和写入模式。
另外，如果你尝试打开一个已存在的文件而写入的话，连接会失败，除非你设置了“overwrite”上下文选项：
```php
$context = stream_context_create(['ftp' => ['overwrite' => true]]);
$fp = fopen('ftp://secret@ftp.php.net', 'wb', false, $context);
```

STREAM_NOTIFY_CONNECT
    这个事件是当一个连接到资源被建立时触发的。

STREAM_NOTIFY_AUTH_REQUIRED
    当一个认证的请求完成，这个事件就触发并告诉你是否是一个成功的认证或者是连接失败。
    
STREAM_NOTIFY_AUTH_RESULT
    一旦认证通过，这个事件就触发并告诉你是否是一个成功的认证或者是连接失败。

STREAM_NOTIFY_MIME_TYPE_IS
    HTTP流处理层（http://和https://）在HTTP请求的响应中获得Content-Type头信息时触发这个事件。

STREAM_NOTIFY_FILE_SIZE_IS
    当FTP处理层计算出文件的大小时触发这个事件，或者当一个HTTP处理层看到Content-Length头信息时触发。

STREAM_NOTIFY_REDIRECTED
    这个事件是通过HTTP处理层在它遇到一个重定向请求（Loaction:header）时触发的。

STREAM_NOTIFY_PROGRESS
    这个事件是大家喜欢的事件之一；他在我们额例子中被广泛使用。它是在数据包到达后迅速发送的。在我们的例子中，我们使用这个事件来执行带宽限制并且显示进度条。

STREAM_NOTIFY_FAILURE
    当一个错误出现时，例如登录签名出错，处理器将触发这个事件。

### 9.2.7 加锁    Locking

### 9.2.8 重命名与删除文件  Renaming and Removing Files
unlink()

rename()

### 9.2.9 临时文件  Temporary Files
```php
$fp = tmpfile();
fwrite($fp, 'temporary data');
fclose($fp);// 自动删除tmpfile()创建的临时文件
```

```php
$filename = tempnam('/tmp', 'p5pp);
$fp = fopen($filename, 'w');
fwrite($fp, 'temporary data');
fclose($fp);
unlink($filename);// 需要手动删除tempnam()产生的文件
```

## 9.3 正则表达式    Regular Expressions
### 9.3.1 语法    Syntax
#### 正则式语法
#### 元字符
#### 转义序列
#### 无限匹配
#### 修饰符
### 9.3.2 函数    Functions
#### 匹配函数
preg_match()

#### 替换函数
preg_replace()

preg_replace_callback()

#### 分割字符串

## 9.4 日期处理     Date handling
### 9.4.1 获取日期与时间信息     Retrieving Date and Time Information
### 9.4.2 格式化日期和时间  Formatting Date and Time
### 9.4.3 解析日期格式    Parsing Date Formats

## 9.5 使用GD来处理图形    Graphics Manipulation with GD
### 9.5.1 案例1：表单提交验证    Case 1: Bot-Proof Submission Forms
### 9.5.2 案例2：条形图   Case 2: Bar Chart
### 9.5.3 Exif
## 9.6 多字节字符串和字符集   Multi-Byte Strings and Character Sets
### 9.6.1 字符集转换     Character Set Conversions
### 9.6.2 处理多字节字符集的其他函数     Extra Functions Dealing with Multi-Byte Character Sets
### 9.6.3 环境    Locales
## 9.7 总结
