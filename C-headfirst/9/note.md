## 9.进程与系统调用
#### 操作系统热线电话
#### 黑客入侵了
#### 岂止是安全问题
什么是内核？主管室三样东西
- 进程

    只有当内核把程序加载到存储器时程序才能运行。
    内核创建进程，并确保它们得到了所需资源。
    内核同时也会留意那些变得贪得无厌或者已经崩溃的进程。
    
- 存储器

    计算机所能提供的存储器资源是有限的，因此内核必须小心翼翼地分配每个进程所能使用的存储器大小。
    内核还能把部分存储器交换到磁盘从而增加虚拟存储器空间。
    
- 硬件

    内核用设备驱动与连接到计算机上的设备交互。
    你的程序不了解键盘、屏幕和图形处理器的情况下就能使用它们，因为内核会代表你与它们交涉。
    
系统调用是程序用来与内核对话的函数。

#### exec()给你更多控制权
进程是存储器中运行的程序。

操作系统用一个数字来标识进程，它叫**进程标识符（process identifier，简称PID）**。

exec()函数通过运行其他程序来替换当前进程。
你可以告诉exec()函数要使用哪些命令行参数和环境变量。
新程序启动后PID和老程序一样，就像两个程序接力跑，你的程序把进程交接给了新程序。

#### exec()函数有很多
列表函数：execl()、execlp()、execle()

列表函数以参数列表的形式接收命令行参数：
- 程序。

    第一个参数告诉exec()函数将运行什么程序。
    
- 命令行参数。

    你需要依次列出想使用的命令行参数。
    
- NULL。
    
    没错，需要在最后一个命令行参数后加上NULL，告诉函数没有其他参数了。
    
- 环境变量（如果有的话）。
    
    如果调用了以...e()结尾的exec()函数，还可以传递环境变量数组，像“POWER=4”、“SPEED=17”、“PORT=OPEN”......那样的字符串数组。

```c
execl("/home/flynn/clu", "/home/flynn/clu", "paranoids", "contract", NULL);
```

#### 数组函数：execv()、execvp()、execve()
```c
// execv=参数数组或参数向量（vector）。
execv("/home/flynn/clu", my_args);// 参数需要保存在字符串数组my_args中。
// execvp=参数数组/向量（vector）+在PATH中查找。
execvp("clu", my_args);// 参数需要保存在字符串数组my_args中。
```
上面两个函数的唯一区别就是execvp会用PATH变量查找程序。

**教你如何记住exec()函数**

execle = exec + l + e = 参数列表+环境变量

1. v总是在p、e之前出现；p、e是可选的。

<table>
<tr><th>使用</th><th>字符</th></tr>
<tr><td>参数列表</td><td>l</td></tr>
<tr><td>参数数组/向量</td><td>v</td></tr>
<tr><td>根据PATH查找</td><td>p</td></tr>
<tr><td>环境变量</td><td>e</td></tr>
</table>

#### 传递环境变量
判断exec()有没有出错很容易：如果exec()调用成功，当前程序就会停止运行。一旦程序运行了exec()以后的代码，就说明出了问题。

**失败黄金法则**
- 尽可能收拾残局。
- 把errno变量设为错误码。
- 返回-1。

errno变量是定义在errno.h中的全局变量，和它定义在一起的还有很多标准错误码，如：

```
EPERM=1     不允许操作
ENOENT=2    没有该文件或目录
ESRCH=3     没有该进程
EMULLET=81  不存在，自定义错误
```
可以拿errno和这些值比较，也可以用string.h中的strerror()的函数查询标准错误信息：
```c
puts(strerror(errno));// strerror()将错误码转换为一条信息。
```
当系统找不到你想运行的程序时就会把errno变量设置为ENOENT，以上代码就会显示这条消息：

    没有该文件或目录

#### 大多数系统调用以相同方式出错
- 系统调用是操作系统中的函数。
- 当进行系统调用时，相当于调用你程序外面的代码。
- system()系统调用可以运行命令字符串。
- system()用起来方便，但也容易出错。
- exec()系统调用时给了你更多控制权。
- exec()系统调用有很多版本。
- 系统调用出错时一般会返回-1，但不是绝对的。
- 系统调用在出错的同时将errno变量设为错误码。

#### 用RSS读新闻

#### exec()是程序中最后一行代码
#### 用fock()+exec()运行子进程
在子进程中调用exec()函数，这样原来的父进程就能继续运行了。

1. 复制进程

    第一步用fork()系统调用复制当前进程。
    进程需要以某种方式区分自己是父进程还是子进程，为此fork()函数向子进程返回0，向父进程返回**非零值**。
    
2. 如果是子进程，就调用exec()

    这一刻，你有两个完全相同的进程在运行，它们使用相同的代码，但子进程(从fork()接收到0的那个)现在需要调用exec()运行程序替换自己：
    现在你有两个独立的进程：子进程在运行rssgossip.py脚本，而原来的父进程可以继续做其他事，完全不受干扰。

**要点**

- 系统调用是内核中的函数。
- exec()函数比system()提供了更多控制权。
- exec()函数替换当前进程。
- fork()函数复制当前进程。
- 系统调用在失败时通常返回-1。
- 系统调用失败以后会把errno变量设为错误码。

#### C语言工具箱
- system()会把字符串当成命令运行。
- fork()复制当前进程。
- fork() + exec()创建子进程。