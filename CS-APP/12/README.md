# 第十二章 并发编程
## 12.1 基于进程的并发编程
### 12.1.1 基于进程的并发服务器
### 12.1.2 进程的优劣
## 12.2 基于I/O多路复用的并发编程
### 12.2.1 基于I/O多路复用的并发事件驱动服务器
### 12.2.2 I/O多路复用的优劣
## 12.3 基于线程的并发编程
### 12.3.1 线程执行模型
### 12.3.2 Posix线程
### 12.3.3 创建线程
### 12.3.4 终止线程
### 12.3.5 回收已终止线程的资源
### 12.3.6 分离线程
### 12.3.7 初始化线程
### 12.3.8 基于线程的并发服务器
## 12.4 多线程程序中的共享变量
### 12.4.1 线程内存模型
### 12.4.2 将变量映射到内存
### 12.4.3 共享变量
## 12.5 用信号量同步线程
### 12.5.1 进程图
### 12.5.2 信号量
### 12.5.3 使用信号量来实现互斥
### 12.5.4 利用信号量来调度共享资源
### 12.5.5 综合：基于预线程化并发服务器
## 12.6 使用线程提高并行性
## 12.7 其他并发问题
### 12.7.1 线程安全
### 12.7.2 可重入性
### 12.7.3 在线程化的程序中使用已存在的库函数
### 12.7.4 竞争
### 12.7.5 死锁
## 12.8 小结