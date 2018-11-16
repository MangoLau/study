# 第11章
## 11.1 介绍
## 11.2 数据库查询   Database Queries
## 11.3 模板系统    Template Systems
### 11.3.1 模板术语     Template Terminology

|词语|意思|
|:-:|:-:|
|模板|输出的设计页；包含占位符和代码块|
|编译|把一个模板转换为PHP代码|
|占位符|在执行的时候被替代的有分界线的字符串|
|模块或者片段|一个模板中可以重复显示不同数据的部分|

### 11.3.2 HTML_Template_IT
**占位符语法**
```php
// IT使用大括号作为占位符分界线
<head><title>{pageTitle}</title></head>
```

**模块语法**
```php
<!-- BEGIN blockname -->
<li>{listItem}</li>
<!--END blockname -->
```

### 13.3.3 HTML_Template_Flexy

## 11.4 认证  Authentication
### 11.4.1 概述   Overview
### 11.4.2 例子：Auth使用密码文件    Example:Auth with Password File
### 11.4.3 例子：Auth使用DB和用户数据     Example:Auth with DB and Date
### 11.4.4 Auth关于安全的考虑  Auth Security Considerations
### 11.4.5 Auth关于升级的考虑  Auth Scalability Considerations

## 11.5 表单处理    Form Handling
### 11.5.1 HTML_QuickForm
### 11.5.2 例子：Login Form    
### 11.5.3 获取数据     Receiving Data

## 11.6 Caching
### 11.6.1 Cache_Lite

## 11.7 总结
