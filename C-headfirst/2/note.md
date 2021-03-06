## 2.存储器和指针：指向何方
#### C代码包含指针

	指针就是存储器中某条数据的地址。
	使用指针的原因：
		1. 在函数调用时，可以只传递一个指针，而不用传递整份数据。
		2. 让两段代码处理同一条数据，而不是处理两份独立的副本。
	指针做的两件事：避免副本和共享数据。
#### 深入挖掘存储器

	在函数声明的变量通常保存在栈中。
	在函数外声明的变量保存在全局量区。
#### 和指针起航

#### 试着传递指向变量的指针

#### 使用存储器指针

#### 为了使用指针读写数据，需要了解三件事。
1. 得到变量的地址。
```c
    int x = 4;
    printf("x lives at %p\n", &x);/*%p格式符将地址以16进制的格式输出。&运算符找到变量的地址。*/
```
2. 读取地址中的内容。
```c
    int *address_of_x = &x;/*这是一个指针棉量，它保存的是一个地址，这个地址中保存的是一个int型变量。*/
    /* *运算符和&运算符恰好相反。&运算符接收一个数据，然后告诉你这个数据保存在哪里；*运算符接收一个地址，然后告诉你这个地址中保存的是什么数据。 */
```
3. 改变地址中的内容。
```c
    *address_of_x = 99;
```

#### 怎么把字符串传给函数？

#### 数组变量好比指针

#### 运行代码时，计算机在想什么

#### 数组变量与指针又不完全相同

#### 为什么数组从0开始

#### 为什么指针有类型

	数组变量可以用作指针；
	但数组变量和指针又不完全相同。
	对数组变量和指针变量使用sizeof，效果不同。
	数组变量不能指向其他地方。
	把数组变量传给指针，会发生退化。
	索引的本质是指针算术运算，所以数组从0开始。
	指针变量具有类型，这样就能调整指针算术运算。
#### 用指针输入数据

#### 使用scanf()时要小心

	scanf()会导致缓冲区溢出：
		如果忘了限制scanf()读取字符串的长度，用户就可以输入远远超出程序空间的数据，多余的数据会写到计算机还没有分配好的存储器中。
#### 除了scanf()还可以用fgets()

	如果你要向fgets()函数传递数组变量，就用sizeof；如果只是传递指针，就应该输入你想要的长度。
#### 字符串字面值不能更新

#### 如果想修改字符串，就复制它

	如果在变量声明中看到* ，说明变量是指针。
	字符串字面值保存在只读存储器中。
	如果想要修改字符串，需要在新的数组中创建副本。
	可以将char指针声明成为const char * ，以防代码用它修改字符串。
#### 把存储器保存在大脑里

	栈。这是存储器用来保存局部变量的部分。每当调用函数，函数的所有局部变量都在栈上创建。它之所以叫栈是因为它看起来就像堆积而成的栈板：当进入函数时，变量会放到栈顶；离开函数时，把变量从栈顶拿走。奇怪的是，栈做起事来颠三倒四，它从存储器的顶部开始，向下增长。
	堆。堆用于动态存储：程序在运行时创建一些数据，然后使用很长一段时间。
	全局量。全局量位于所有函数之外，并对所有函数可见。程序一开始运行时就会创建全局量，你可以修改它们，不像常量。
	常量。常量也在程序一开始运行时创建，但它们保存在只读存储器中。常量是一些在程序中要用到的不变量，你不会想修改它们的值，例如字符串字面值。
	代码。最后是代码段，很多操作系统都把代码放在存储器地址的低位。代码段也是只读的，它是存储器中用来加载机器代码的部分。
#### C语言工具箱

- scanf("%i, &x")可以让用户直接输入数字x。
- 不同计算机的int大小不同。
- &x返回x的地址。
- &x称为指向x的指针。
- char指针变量x可以这么声明：char * x。
- 字符串字面值保存在只读存储器中。
- 局部变量保存在栈上。
- 用字符串初始化数组，数组会复制字符串中的内容。
- 用\*a读取地址a中的内容。
- 可以简单地用fgets(buf, size, stdin)输入文本。

