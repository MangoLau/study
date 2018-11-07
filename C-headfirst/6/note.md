## 6.数据结构与动态存储 牵线搭桥
#### 保存可变数量的数据

#### 链表就是一连串的数据
**链表是一种抽象数据结构。**
链表保存了一条数据和一个链向另一条数据的链接。

#### 在链表中插入数据

#### 创建递归结构
链表中的每个结构需要与下一个结构相连。如果一个结构包含一个链向同种结构的链接，那么这个结构就被成为递归结构。
```c
typedef struct island {// 必须为这个结构命名。
    char *name;// 你将用字符串表示岛名和机场的营业时间。
    char *opens;
    char *closes;
    struct island *next;// 你在结构中保存了一个指针，指向下一座岛。
} island;
```
**递归结构要有名字。**
当用typedef命令定义结构时可以跳过为结构起名字这步，但在递归结构中，需要包含一个相同类型的指针，C语言的语法不允许用typedef别名来声明它，因此必须为结构起一个名字。

#### 用C语言创建岛屿
```c
// Amity->Craggy->Isla Nublar->Shutter
island amity = {"Amity", "09:00", "17:00", NULL};// 这段代码将为每座岛创建island
island craggy = {"Craggy", "09:00", "17:00", NULL};
island isla_nublar = {"Isla Nublar", "09:00", "17:00", NULL};
island shutter = {"Shutter", "09:00", "17:00", NULL};
```
在C语言中，NULL的值实际上为0，NULL专门用来把某个指针设为0。
一旦你创建好了岛，就可以把它们连接在一起：
```c
amity.next = &craggy;
craggy.next = &isla_nublar;
isla_nublar.next = &shutter;
```

#### 在链表中插入值
通过修改指针的值，就可以插入island，就像之前做的那样：
```c
// Amity->Craggy->Isla Nublar->Skull->Shutter,插入Skull岛
island skull = {"Skull", "09:00", "17:00", NULL};
isla_nublar.next = &skull;// 这行代码把isla Nublar岛连到skull岛。
skull.next = &shutter;// 这行代码把skull岛连到Shutter岛
```
```c
void display(island *start)
{
    island *i = start;
    for (; i != NULL; i = i->next) {
        printf("Name: %s\n open: %s-%s\n", i->name, i->opens, i->closes);
    }
}
```

#### 有用有还
一旦申请了堆上的空间，这块空间就再也不能分配出去，知道告诉C标准库你已经用完了。
堆存储空间有限，如果在代码中不断地申请堆空间，很快就会发生存储器泄露。
调用free()释放存储器

#### 用malloc()申请存储器
```c
island *p = malloc(sizeof(island));// 表示“为island创建足够空间，然后将地址保存在变量p中”。
free(p);// 表示“释放你分配的存储器，从堆地址p开始”。
```
**记住：如果在一个地方用malloc()分配了存储器，就应该在后面用free()释放它。**

#### 用strdup()修复代码
stardup()函数可以把字符串复制到堆上：
```c
char *s = "MONA LISA";
char *copy = stardup(s);
```
1. stardup()函数计算出字符串的长度，然后调用malloc()函数在堆上分配相应的空间。
2. 然后stardup()函数把所有字符复制到堆上的新空间。

#### 用完后释放存储器
- 可以用动态数据结构保存可变数量的数据项。
- 可以很方便地在链表这种数据结构中插入数据项。
- 在C语言中，动态数据结构通常用递归结构来定义。
- 递归结构中有一个或多个指向相同结构的指针。
- 栈用来保存局部变量，它由计算机管理。
- 堆用来保存长期使用的数据，可以用malloc()分配空间。
- sizeof运算符告诉你一个结构需要多少时间。
- 数据会一直留在堆上，直到用free()释放它。

#### SPIES系统综述

#### 软件取证：使用valgrind

#### 反复使用valgrind，收集更多证据
#### 推敲证据
#### 最终审判
- valgrind可以检查存储器泄露。
- valgrind通过拦截对malloc()与free()的调用来工作。
- 程序在停止运行时，valgrind会打印留在堆上数据的详细信息。
- 编译代码时，如果在可执行文件中加上调试信息，valgrind可以提供更多信息。
- 多次运行程序可以缩小泄露的范围。
- valgrind可以告诉你源文件的哪行代码把数据放到了堆上。
- valgrind可以用来检验泄露是否已修复。

#### C语言工具箱
- 链表比数组更容易扩展。
- 在链表中插入数据很方便。
- 链表是动态数据结构。
- 动态数据结构使用递归结构。
- 递归结构包含一个或多个链向相同结构数据的链接。
- malloc()在堆上分配存储器。
- free()释放堆上的存储器。
- 与栈不同，堆存储器不会自动释放。
- 栈用来保存局部变量。
- strdup()会把字符串复制到堆上。
- 存储器泄露是指存储器分配出去以后，你再也访问不到。
- valgrind可以帮助追踪存储器泄露。

