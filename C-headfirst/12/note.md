## 12.线程：平行世界
#### 任务是串行的。。。还是。。。
#### 。。。进程不是唯一答案
创建进程要花时间

共享数据不方便

进程真的很难

#### 普通进程一次只做一件事
#### 多雇几名员工：使用线程
#### 如何创建线程？
线程函数的返回类型必须是void*。
```c
void* does_not(void *a)
{
    int i = 0;
    for (i = 0; i < 5; i++) {
        sleep(1);
        puts("Does not!");
    }
    return NULL;
}

void* does_too(void *a)
{
    int i = 0;
    for (i = 0; i < 5; i++) {
        sleep(1);
        puts("Does too!");
    }
    return NULL;
}
```

#### 用pthread_create创建线程
为了使用pthread库，必须在编译程序时链接它：
```shell
gcc argument.c -lpthread -o argument
```

#### 线程不安全
#### 增设红绿灯
#### 用互斥锁来管理交通
```c
pthread_mutex_t a_lock = PTHREAD_MUTEX_INITIALIZER;
```

1. 红灯停。

    你需要把第一盏红绿灯放在这段代码的开头，pthread_mutex_lock()只允许一个线程通过，其他线程运行到这行代码时必须等待。
    ```c
        pthread_mutex_lock(&a_lock);
        /* 含有共享数据的代码从这里开始 */
    ```

2. 绿灯行。

    当线程到达代码的尾部就会调用pthread_mutex_unlock()把红绿灯调回绿灯，其他线程就能进入这段代码了
    ```c
        /* ...代码结束了 */
        pthread_mutex_unlock(&a_lock);
    ```

#### C语言工具箱

- 普通进程一次只做一件事。
- POSIX线程(pthread)是一个线程库。
- 有了线程，进程一次就能做多件事。
- 线程是“轻量级”进程。
- pthread_create()创建线程来运行函数。
- pthread_join()会等待线程结束。
- 线程共享相同的全局变量。
- 如果线程读取并更新了相同变量，代码的运行结果将不可预测。
- 互斥锁是用来保护共享数据的锁。
- pthread_mutex_lock()在代码中创建互斥锁。
- pthread_mutex_unlock()释放互斥锁。