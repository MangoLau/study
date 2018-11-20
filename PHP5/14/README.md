# 第14章 性能   Performance
## 14.1 介绍

## 14.2 性能设计    Design for Performance
### 14.2.1 PHP设计技巧#1：了解状态   PHP Design Tip #1: Beware of State
#### Session状态
#### 单独的状态
### 14.2.2 PHP设计技巧#2：缓存     PHP Design Tip #2: Cache
#### 数据库查询/结果缓存
#### 调用缓存
    指缓存一个函数针对一组参数的返回值。
#### 编译的模板
#### 输出缓存
### 14.2.3 PHP设计技巧#3：不要超标设计     PHP Design Tip #3: Do Not Over Design
#### 针对内置函数的面向对象的封装
#### 谨慎地归纳
#### 不要把PHP当做Java！

## 14.3 压力测试    Benchmarking
### 14.3.1 使用ApacheBench    Using ApacheBench
```shell
ab -n 10000 -c 10 http://localhost/test.php
```
-n选项设置请求的数量，而-c选项设置并发客户端的数量。

### 14.3.2 使用Siege  Using Siege
http://www.joedog.org/
```shell
siege -i -t 10S -f urls.txt
```

### 14.3.3 测试与实际流量的比较   Testing Versus Real Traffic

## 14.4 用Zend Studio的Profile来分析性能   Profiling with Zend Studio's Profiler

## 14.5 用APD进行性能分析  Profiling with APD
Advanced PHP Debugger
### 14.5.1 安装APD Installing APD
### 14.5.2 分析跟踪数据   Analyzing Trace Data

## 14.6 用Xdebug进行性能分析   Profiling with Xdebug

## 14.7 使用APC（Advanced PHP Cache）

## 14.8 使用ZPS（Zend Performance Suite）
### 14.8.1 自动优化     Automatic Optimization
### 14.8.2 编译代码缓存   Compiled Code Caching
### 14.8.3 动态内容缓存   Dynamic Content Caching
### 14.8.4 内容压缩     Content Compression

## 14.9 优化代码    Optimizing Code
### 14.9.1 微型压力测试   micro-benchmarks
### 14.9.2 用C重写     Rewrite in C
### 14.9.3 面向对象与面向过程代码的比较   OO Versus Procedural Code

## 14.10 总结
