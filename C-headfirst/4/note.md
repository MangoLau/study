## 4.使用多个源文件，分而治之
### 大程序不等于大源文件。

#### 简明数据类型指南

**char**
    字符在计算机的存储器中以字符编码的形式保存，字符编码是一个数字，因此在计算机看来，A与数字65完全一样。

**int**
    如果你要保存一个整数，通常可以使用int。不同计算机中int的大小不同，但至少应该有16位。一般而言，int可以保存几万以内的数字。
    
**short**
    但有时候你想节省一点空间，毕竟如果只想保存一个几百、几千的数字，何必用int？可以用short，short通常只有int的一半大小。
    
**long**
    但如果想保存一个很大的计数呢？long数据类型就是为此而生的。在某些计算机中，long的大小是int的两倍，所以可以保存几十亿以内的数字；但大部分计算机的long和int一样大，因为在计算机中int本身就很大。long至少应该有32位。
    
**float**
    float是保存浮点数的基本数据类型。平时你会碰到很多浮点数，比如一杯香橙摩卡冰乐有多少毫升，就可以用float保存。
    
**double**
    但如果想表示很精确的浮点数呢？如果想让计算结果精确到小数点以后很多位，可以使用double。double比float多占一杯空间，可以保存更大、更精确的数字。

#### 勿以小杯乘大物
赋值时要保证指的类型与保存它的变量类型相匹配。不同数据类型的大小不同，千万别让值的大小超过变量。short比int的空间小，int有比long小。
```c
int x = 100000;
short y = x;
print("y的值是%hi\n", y);//y的值是-31072
```
    数字以2进制保存，二进制的100000看起来像这样：
        x <- 0001 1000 0110 1010 0000
    当计算机想把这个值保存到short时，发现只能保存2个字节，所以只保存了数字右半边：
        y <- 1000 0110 1010 0000
    最高位是1的二进制有符号数会被当成负数处理，它等价于下面的十进制数：
        -31072

#### 使用类型转换把float值存进整型变量
你认为下面的这段代码将显示什么？
```c
int x = 7;
int y = 2;
float z = x / y;
printf("z = %f\n", z);
```
答案是3.000。为什么是3.0000？因为x和y都是整型，而两个整型相除，结果是一个舍入的整数，在这个例子中就是3.

如果希望两个整数相除的结果是浮点数，应该先把整数保存到float变量中，但这样稍微有点麻烦，可以使用类型转换临时转换数值的类型：
```c
int x = 7;
int y = 2;
float z = (float)x / (float)y;
printf("z = %f\n", z);
```
(float)会把int值转换为float值，计算时就可以把变量当成浮点数来用，事实上，如果编译器发现有整数在加、减、乘、除浮点数，会自动替你完成转换，因此可以减少代码中显示类型转换的次数：
```c
float z = (float)x / y;// 编译器会自动把y的类型转换成float。
```
不同平台上数据类型大小不同，那怎么知道int或double占了多少字节？好在C标准库中有几个头文件提供了这些细节。下面这个程序将告诉你int与float的大小。
```c
#include <stdio.h>
#include <limits.h> // 含有表示整型（比如int和char）大小的值。
#include <float.h> // 含有表示float和double类型大小的值。

int main()
{
    printf("The value of INT_MAX is %i\n", INT_MAX);// 最大值
    printf("The value of INT_MIN is %i\n", INT_MIN);// 最小值
    printf("An int takes %z bytes\n", sizeof(int));
    
    printf("The value of FLT_MAX is %f\n", FLT_MAX);// 最大值
    printf("The value of FLT_MIN is %f\n", FLT_MIN);// 最小值
    printf("An float takes %z bytes\n", sizeof(float));// sizeof返回数据类型占了多少字节。
    
    return 0;
}

```
编译并运行代码，会看到这样的结果：
```shell
The value of INT_MAX is 2147483647
The value of INT_MIN is -2147483648
An int takes % bytes
The value of FLT_MAX is 340282346638528859811704183484516925440.000000
The value of FLT_MIN is 0.000000
An float takes % bytes
```
不同计算机上的结果很可能不同。

如果你想知道char、double或long的细节呢？简单，只要把INT和FLT替换成CHAR(char)、DBL(double)、SHRT(short)或LNG(long)即可。


#### 不好啦，兼职演员来了......

#### 代码到底怎么了

#### 编译器不喜欢惊喜

#### 声明与定义分离
如果编译器一开始就知道函数的返回类型，就不用稍后再找了。为了防止编译器假设函数的返回类型，你可以显式地告诉它。告诉编译器函数会返回什么类型的语句就叫**函数声明**。
```c
float add_with_tax()(float f);// 声明告诉编译器函数会返回什么类型。声明没有函数体。仅以“;”（分号）结束。
```
声明只是一个函数签名：一条包含函数名、形参类型与返回类型的记录。

一旦声明了函数，编译器就不需要假设，完全可以先调用函数，再定义函数。

如果代码中有很多函数，你又不想管它们在文件中的顺序，可以在代码的开头列出函数声明：
```c
float do_something_fantastic();
double awesomeness_2_dot_0();
int stinky_pete();
char make_maguerita(int count);
```
甚至可以把这些声明拿到代码外，放到一个头文件中。你已经用头文件包含过C标准库中的代码：
```c
#include <stdio.h>// 包含一个叫stdio.h的头文件中的内容。
```

#### 创建第一个头文件
为了创建头文件，只要做两件事：

    1. 创建一个扩展名为.h的文件。
    如果程序叫totaller，就创建一个叫totaller.h的文件，并把你的声明写在里面：
    float add_with_tax(float f);
    不用在头文件中包含main()函数，反正也没有函数会调用它。
    2. 在主文件中包含头文件。
    应该在代码的顶部加一句include：
    #include <stdio.h>
    #include "totaller.h"
    
头文件的名字用双引号括起来，而不是尖括号，它们的区别是什么？当编译器看到尖括号，就会到标准库代码所在目录查找头文件，但现在你的头问及那和.c文件在同一目录下，用引号把文件名括起来，编译器就会在本地查找文件。

当编译器在代码中读到#include，就会读取头文件中的内容，仿佛它们本来就在代码中。

**#include是预处理命令。**

- 如果编译器发现你调用了一个它没见过的函数，就会假设这个函数返回int。
- 所以如果想在定义函数前就调用它，就可能出问题。
- 函数声明在定义函数前就告诉编译器函数长什么样子。
- 如果在源代码顶端声明了函数，编译器就知道函数返回什么类型。
- 函数声明通常放在头文件中。
- 可以用#include让编译器从头文件中读取内容。
- 编译器会把包含进来的代码看成源文件的一部分。

#### 如果有共同特性......

#### 把代码分成多个文件

#### 编译的幕后花絮
1. 预处理：修改代码。
2. 编译：转换成汇编代码。
3. 汇编：生成目标代码。
4. 链接：放在一起。

#### 共享代码需要自己的头文件
如果想在多个程序之间共享encrypt.c代码，需要想办法让这些程序知道它，为此你可以用头文件。
encrypt.h
```c
void encrypt(char *message);
```
你将在encrypt.c中包含这个头文件。
```c
#include "encrypt.h"
void encrypt(char *message)
{
    char c;
    while (*message) {
        *message = *message ^ 31;
        message++;
    }
}
```
**在程序中包含encrypt.h**

在这里使用头文件不是为了能够调整函数之间的顺序，而是为了让其他程序知道encrypt()函数：
message_hider.c
```c
#include <stdio.h>
#include "encrypt.h"

int main()
{
    char msg[80];
    while (fgets(msg, 80, stdin)) {
        encrypt(msg);
        printf("%s", msg);
    }
}
```
主程序有encrypt.h，这表示编译器知道encrypt()函数，这样才能编译代码。在链接阶段，编译器会把message_hidder.c中的encrypt(msg)调用连接到encrypt.c中的encrypt()函数。
最后，为了把所有东西编译到一起，只需要把源文件传给gcc：
```shell
gcc message_hider.c encrypt.c -o message_hidder
```

**要点**
- 为了共享代码，可以把代码放到一个单独的C文件中。
- 需要把函数声明放到一个单独的.h文件中。
- 在所有需要使用共享代码的C文件中包含这个头文件。
- 在编译的命令中列出所有C文件。

#### 又不是造火箭......还真是！

#### 不要重新编译所有文件
**保存目标代码的副本**

#### 首先，把源代码编译为目标文件
```shell
gcc -c *.c
```

**然后，把目标文件链接起来**
```shell
gcc *.o -o launch
```
编译器能够识别这些文件是目标文件，而非源文件，因此它会跳过大部分编译步骤，直接把目标文件链接为一个叫launch的可执行程序。

和以前一样，现在你有了一个编译好的程序，同事你也得到了一批目标文件，可以在需要时随时把它们链接起来。如果要修改其中一个文件，只需要重新编译一个文件，然后重新链接程序即可：
```shell
gcc -c thruster.c
gcc *.o -o launch
```

#### 记不住修改了哪些文件

#### 用make工具自动化构建
make是一个可以替你运行编译命令的工具。make会检查源文件和目标文件的时间戳，如果目标文件过期，make就会重新编译它。

但是做到这些事情前，需要告诉make源代码的一些情况。make需要知道文件之间的依赖关系，同时还需要告诉它你具体想如何构建代码。

**make需要知道什么？**

make编译的文件叫**目标**。

对每个目标，make需要知道两件事：
- 依赖项。生成目标需要哪些文件。
- 生成方法。生成该文件时要用哪些指令。

依赖项和生成方法结合在一起构成了一条规则。有了规则，make就知道如何生成目标。

#### make是如何工作的
通过依赖项和生成方法生成目标文件

thruster.c ->  thruster.o

其中thruster.c是依赖项，thruster.o是目标文件。生成方法就是将thruster.c转化成thruster.o的编译命令

gcc -c thruster.c

#### 用makefile向make描述代码
所有目标、依赖项和生成方法的细节信息需要保存在一个叫Makefile或makefile的文件中

你将在makefile中这样描述构建过程：
```shell
launch.o: launch.c launch.h thruster.h #目标文件:依赖文件
    gcc -c launch.c#生成方法，必须以tab开头
    
thruster.o: thruster.h thruster.c
    gcc -c thruster.c
    
launch: launch.o thruster.o
    gcc launch.o thruster.o -o launch
```

**生成方法都必须以tab开头。** 如果尝试用空格缩进，就无法生成程序。

将make规则保存在当前目录下一个叫Makefile的文本文件中，然后在控制台输入make launch

```shell
oggswing:oggswing.c oggswing.h
    gcc oggswing.c -o oggswing
swing.ogg:whitennerdy.ogg oggswing
    oggswing whitenerdy.ogg swing.ogg
```

#### 火箭升空！
**要点**
- 编译大量文件非常的耗时。
- 可以把目标代码保存在*.o文件中，加快编译速度。
- gcc不但能从源文件，而且能从目标文件编译程序。
- make工具可以用来自动化代码的构建过程。
- make清楚文件之间的依赖关系，可以只编译那些修改过的文件。
- 你需要使用makefile告诉make如何构建代码。
- 处理makefile的格式时要小心，别忘了用tab来缩进，不是空格！

#### C语言工具箱
- char是数值。
- 小整数用short。
- 普通整数用int。
- 大整数用long。
- 一般的浮点数用float。
- 高精度的浮点数用double。
- 函数的声明与定义分离。
- 把声明放在头文件中。
- 用#include<>包含标准库头文件。
- 用#indlude ""包含本地头文件。
- 把目标代码保存到文件中，提高构建速度。
- 使用make管理代码构建过程。

