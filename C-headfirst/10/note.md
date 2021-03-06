## 10.进程间通信 沟通的艺术
#### 输入输出重定向
在命令行运行程序时，可以用“>”运算符把标准输出重定向到文件：
```c
python ./rssgossip.py Snooki > stories.txt
```

标准输出是三大默认数据流之一。

#### 进程内部一瞥
进程含有它正在运行的程序，还有栈和堆数据空间。

<table>
<tr><th>#</th><th>desc</th><th>数据流</th></tr>
<tr><td>0</td><td>标准输入</td><td>键盘</td></tr>
<tr><td>1</td><td>标准输出</td><td>屏幕</td></tr>
<tr><td>2</td><td>标准错误</td><td>屏幕</td></tr>
<tr><td>3</td><td>进程也可能打开其他形式的数据流。</td><td>数据库连接</td></tr>
</table>

#### 重定向即替换数据流
**进程可以重定向自己**

除了在命令行中用“>”和“<”运算符重定向，用可以通过修改描述符表来重定向它们自己。

难怪要用“2>”

    在命令行中用“2>”重定向标准错误：
    ./myprog > output.txt 2> errors.log

```shell
./myprog 2>&1
```
“2>”表示“重定向标准错误”。
“&1”表示“到标准输出”。

#### fileno()返回描述符号
**警告：每次程序执行只有一次调用exit()的机会，“程序突然结束恐惧症”患者慎用。**

#### 有时需要等待
waitpid(pid, pid_status, options)函数会等子进程结束以后才返回

- pid

    父进程在克隆子进程时会得到子进程ID
    
- pid_status

    pid_status用来保存进程的退出信息。因为waitpid()需要修改pid_status，因此它必须是个指针。
    
- 选项

    waitpid()有一些选项，详情可以输入man waitpid查看。如果把选项设为0，函数将等待进程结束。
    
**要点**
- exit()可以快速结束程序。
- 所有打开的文件都记录在描述符表中。
- 通过修改描述符表就可以重定向输入和输出。
- fileno()能在符表中查找描述符。
- dup2()可以用来修改描述符表。
- waitpid()等待进程结束。

#### 家书抵万金

#### 用管道连接进程
pipe()打开两条数据流

pipe()函数创建了管道，并返回了两个描述符：fd[1]用来向管道写数据，fd[0]用来从管道读数据，你将在父、子进程中使用这两个描述符。

#### 案例研究：在浏览器中打开新闻
#### 子进程
#### 父进程
#### 在浏览器中打开网页
- 父子进程可以用管道通信。
- pipe()函数创建一个管道和两个描述符。
- 一个描述符是管道的读取端。另一个是写入端。
- 可以把标准输入和标准输出重定向管道。
- 父子进程各自使用管道的一端。

#### 进程之死
**操作系统用信号控制程序**

信号是一条短消息，即一个整型值。

#### 捕捉信号然后运行自己的代码
#### 用sigaction()来注册sigaction

    sigaction(signal_no, &new_action, &old_action);

- 信号编号。代表你希望处理的信号。
- 新动作。你想注册的新sigaction的地址。
- 旧动作。如果你想保存被替换的信号处理器，可以再传一个sigaction指针；如果不想保存，可以设置为NULL。

#### 使用信号处理器
操作系统向进程发送的信号与原因：

    SIGINT      进程被中断。
    SIGQUIT     有人要求停止进程，并把存储器中的内容保存到核心转储文件。
    SIGFPE      浮点错误。
    SIGTRAP     调试人员询问进程执行到了哪里。
    SIGSEGV     进程企图访问非法存储器地址。
    SIGWINCH    终端窗口的大小发生改变。
    SIGTERM     有人要求内核终止进程。
    SIGPIPE     进程在向一个没有人读的管道写数据。

#### 用kill发送信号
    kill -KILL <进程号>
    一定可以让你的程序上西天

用raise()发送信号
    
    raise(SIGTERM);

#### 打电话叫程序起床
**要点**
- 操作系统用信号来控制进程。
- 程序通常用信号来结束。
- 进程收到信号后会运行信号处理器。
- 大部分错误信号的默认处理器会终止程序。
- 可以用sigaction()函数替换处理器。
- 可以用raise()向自己发送信号。
- 间隔定时器发送SIGALRM信号。
- 每个进程只能有一个定时器。
- 不要同时使用sleep()和alarm()。
- kill命令可以向进程发送信号。
- kill -KILL一定可以终止进程。

#### C语言工具箱
- exit()立即终止程序。
- fileno()查找描述符。
- dup2()复制数据流。
- waitpid()等待进程结束。
- pipe()创建通信管道。
- 进程可以用管道通信。
- 信号是O/S发出的消息。
- 用sigaction()处理信号。
- kill命令发送信号。
- 程序可以用raise()想自己发送信号。
- alarm()会在几秒钟以后向进程发送SIGALRM信号。