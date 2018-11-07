## 11.网络与套接字 金窝，银窝，不如127.0.0.1的草窝
#### 互联网knock-knock服务器
#### knock-knock服务器概述
协议是一段结构化对话。

#### BLAB：服务器连接网络四部曲
在使用套接字与客户端程序通信前，服务器需要历经四个阶段：

    绑定（Bind）：代表绑定端口。
    监听（Listen）：代表监听。
    接受（Accept）：代表接受连接。
    开始（Begin）：代表开始通信。

1. 绑定端口
服务器在启动时，需要告诉操作系统将要使用哪个端口，这个过程叫端口绑定。
绑定端口，需要使用两样东西：套接字描述符和套接字名。
    ```c
    #include <arpa/inet.h>
    ...
    struct sockaddr_in name;
    name.sin_family = PF_INET;
    name.sin_port = (in_port_t)htons(30000);
    name.sin_addr.s_addr = hton1(INADDR_ANY);
    int c = bind(listener_d, (struct sockaddr *) &name, sizeof(name));
    if (c == -1)
        error("无法绑定端口");
    ```

2. 监听
用listen()系统调用告诉操作系统你希望队列有多长。

    ```
    if (listen(listener_d), 10) == -1
        error("无法监听");
    ```

3. 接受连接
accept()系统调用会一直等待，直到有客户端连接服务器时，它会返回第二个套接字描述符，然后就可以用它通信了。

#### 套接字不是传统意义上的数据流
```c
char *msg = "Internet Knock-Knock Protocol Server\r\nVersion 1.0\r\nKnock! Knock!\r\n>";
if (send(connect_d, msg, strlen(msg), 0) == -1) {
    error("send");
}
```

**通常情况下，请使用1024号以上的端口。**

#### 服务器有时不能正常启动
#### 妈妈说要检查错误
**绑定端口有延时**
当你在某个端口绑定了套接字，在接下来的30秒内，操作系统不允许任何程序再绑定它，包括上一次绑定这个端口的程序。
只要在绑定前设置套接字的某个选项就可以解决这个问题。
```c
int reuse = 1;// 用一个整型变量保存选项。设为1，表示“重新使用端口”。
if (setsockopt(listener_d, SQL_SOCKET, SO_REUSEADDR, (char *)&reuse, sizeof(int) == -1) {
    error("无法设置套接字的“重新使用端口”选项");
}
```

#### 从客户端读取数据
用recv()读取数据。

<读了几个字节> = recv(<描述符>, <缓冲区>, <要读取几个字节>, 0);

牢记以下几点：
- 字符串不以\0结尾。
- 当用户在telnet输入文本时，字符串以\r\n结尾。
- recv()将返回字符个数，如果发生错误就返回-1，如果客户端关闭了连接，就返回0.
- recv()调用不一定能一次接收到所有字符。意味着可能要多次调用recv()。

#### 一次只能服务一个人
#### 为每个客户端fork()一个子进程
#### 自己动手写网络客户端
#### 主动权在客户端手中
客户端只需两步就能取得套接字：

    1. 连接远程端口
    2. 开始通信

服务器在连接网络时必须决定使用哪个端口，而客户端除了要知道端口号还需要知道远程服务器的IP地址。
IP地址难以记忆，所以人们一般使用域名。

#### 创建IP地址套接字
服务器把套接字绑定到本地端口，而客户端会把套接字连接至远程端口

```c
struct sockaddr_in si;
memset(&si, 0, sizeof(si));
si.sin_family = PF_INET;
si.sin_addr.s_addr = inet_addr("208.201.239.100");
si.sin_port = htons(80);
connect(s, (struct sockaddr *)&si, sizeof(si));// 把套接字连接至远程端口。
```

#### getaddrinfo()获取域名的地址
```c
getaddrinfo("www.oreilly.com", "80", &hints, &res);// 创建www.oreilly.com地址80端口的名字资源。
// getaddrinfo()接收字符串格式的端口号。
```

**要点**
- 协议是一段结构化对话。
- 服务器连接本地端口。
- 客户端连接远程端口。
- 客户端和服务器使用套接字通信。
- 用send()向套接字写数据。
- 用recv()从套接字读数据。
- HTTP是一种网络协议。

#### C语言工具箱
- telnet是一个简易网络客户端。
- 用socket()函数创建套接字。
- 服务器BLAB四部曲：B=bind()   l=listen()  A=accept()  B=开始对话
- 用fork()克隆子进程，同时处理多个客户端。
- DNS=域名系统
- getaddrinfo()根据域名找地址。