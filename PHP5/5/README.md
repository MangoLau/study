# 第5章 如何用PHP写一个web应用
## 5.1 介绍
## 5.2 嵌入HTML当中
## 5.3 获取用户数据
## 5.4 对用户输入的数据进行安全验证   Safe-handling User Input
### 5.4.1 常见的错误 Common Mistake
全局变量

跨站运行脚本

SQL注入

## 5.5 一些让脚本运行“安全”的技术   Techniques to Make Script "Safe"
### 5.5.1 用户输入的验证   Input Validation
### 5.5.2 HMAC确认    HMAC Verification
### 5.5.3 PEAR::Crypt_HMAC
### 5.5.4 输入过滤器 Input Filter
### 5.5.5 处理密码  Working with Passwords
### 5.5.6 错误处理  Error Handling

## 5.6 Cookies

## 5.7 Sessions

## 5.8 文件上传
### 5.8.1 处理输入的上传文件 Handling the Incoming Uploaded File

## 5.9 架构
### 5.9.1 单一脚本响应所有请求    One Script Serves All
    
    单一脚本响应所有请求表示用一个脚本，通常是index.php，可以处理所有针对不用页面的请求。
    
### 5.9.2 每个脚本负责一项功能    One Script per Function

### 5.9.3 把业务逻辑与显示分离    Separating Logic from Layout

## 5.10 总结
