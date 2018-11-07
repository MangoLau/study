## 5.结构、联合与位字段。创建自己的结构
#### 有时要传很多数据
#### 窃窃私语
#### 用结构创建结构化数据类型
封装一个新的大型数据
```c
struct fish {
    const char *name;
    const char *species;
    int teeth;
    int age;
}
```
- 结构的大小固定。
- 结构中的数据都有名字。
```c
struct fish snappy = {"Snappy", "Piranha", 69, 4};
```

#### 只要把“鱼”给函数就行了
```c
/* 打印目录项 */
void catalog(struct fish f)
{
    //todo...
}

/* 打印贴在水缸上的标签 */
void label(struct fish f)
{
    //todo...
}

struct fish snappy = {"Snappy", "Piranha", 69, 4};
catalog(snappy);
label(snappy);
```
**把参数封装在结构中，代码会更稳定。**

#### 使用“.”运算符读取结构字段
```c
f.name
```
**切记，为结构变量赋值相当于叫计算机复制数据。**

#### 结构中的结构
在C语言中可以为结构创建别名，你只要在struct关键字前加上typedef，并在右花括号后写上类型名，就可以在任何地方使用这种新类型。
```c
typedef struct cell_phone {// typedef表示将为结构类型起一个新的名字。
    int cell_no;
    const char *wallpaper;
    float minutes_of_charge;
}phone;// phone将成为“struce cell_phone”的别名。

phone p = {5557878, "sinatra.png", 1.53};// 现在，只要编译器看到“phone”，就把它当成“struct cell_phone”
```
**要点**
- 结构是一种由一系列其他数据类型组成的数据类型。
- 结构的大小固定。
- 结构字段按名访问，用<结构>.<字段名>语法（也叫“点表示法”）。
- 结构字段在存储器中保存的顺序和它们出现在代码中的顺序相同。
- 可以嵌套定义结构。
- typedef创建数据类型的别名。
- 用typedef定义结构时可以省略结构名。

#### 如何更新结构
```c
fish snappy = {"Snappy", "piranha", 69, 4};
printf("Hello %s\n", snappy.name);
snappy.teeth = 68;// 设置teeth字段的值。
```

#### 代码克隆了乌龟
```c
void happy_birthday(turtle t)
{
...
}

happy_birthday(myrtle);//myrtle结构会复制给形参。
```
在C语言中，参数按值传递给函数。也就是说，当调用函数时，传入函数的值会赋给形参，因此这段代码等价于
```c
turtle t = myrtle;
```
在C语言中，当为结构赋值时，计算机会复制结构的值。当调用happy_birthday()函数时，形参t中放的是myrtle结构的副本，仿佛函数克隆了原来那只乌龟，于是函数中的代码虽然更新了乌龟的年龄，却不是原来的那只。

函数返回以后呢？形参t不见了，main()中剩下的代码使用了myrtle结构。而myrtle的值从来没有被代码修改过，它一直是一条完全独立的数据。

#### 你需要结构指针
```c
void happy_birthday(turtle *t)
{
    (*t).age = (*t).age + 1;// 要把*放在变量名前，因为你想得到指针指向的值。
    printf("Happy Birthday %s! You are now %i years old!\n", (*t).name, (*t).age);// 括号非常重要，如果不加会出错。
}

happy_birthday(&myrtle);
```

#### (*t).age和*t.age
(*t).age和*t.age是两个完全不同的表达式。

表达式*t.age等于*(t.age)。代表“t.age这个存储器单元中的内容”，但t.age不是存储器单元。

**使用结构时要小心括号的位置，它们会影响表达式的值。**

_(*t).age_ 等价于 _t->age_

**要点**
- 当调用函数时，计算机会把值复制给形参变量。
- 可以像创建其他类型的指针那样创建结构指针。
- “指针->字段”等于“(*指针).字段”。
- “->”表示法省掉了括号，代码更易阅读。

#### 同一类事物，不同数据类型
- 结构在存储器中占了更多空间。
- 用户可能设置多个值。
- 没有叫“量”的字段。

#### 联合可以有效使用存储器空间
当定义union时，计算机只其中一个最大的字段分配空间。
```c
// “量”（可能是float，也可能是short）
// 如果float占4字节，short占2字节，那么quantity占4字节
typedef union {// 联合看起来很像结构，但用的是union关键字。
    short count;
    float weight;
    float volume;
    // 所有字段将保存在同一个地方。
} quantity;
```

#### 如何使用联合
C89方式
```c
quantity q = {4};// 表示“量”是4个。
```

指定初始化器，按名设置联合字段的值：
```c
quantity q = {.weight=1.5};// 把联合设为浮点型的重量值。
```

“点”表示法
```c
quantity q;// 创建变量
q.vloume = 3.7;// 设置字段值
```
**_无论用哪种方法设置联合的值，都只会保存一条数据。联合只是提供了一种让你创建支持不同数据类型的变量的方法。_**

#### 枚举变量保存符号

#### 有时你想控制某一位

#### 位字段的位数可调
位字段（bitfield）指定一个字段有多少位。
```c
typedef struct {
    unsigned int low_pass_vcf:1;// 每个字段都必须是unsigned int
    unsigned int filter_coupler:1;// 1表示该字段只是用1位存储空间
}synth;
```
**注：只有出现在同一个结构中，位字段才能节省空间。** 
如果编译器发现结构中只有一个位字段，还是会把它填充成一个字，这就是为什么位字段总是结合在一起。

**注：如何选择位数？** 
位字段不仅可以用来保存一连串真/假值，还可以用来保存小范围的数字，例如一年中的十二个月。假设想在某个结构中保存月份（0到11的值），就可以用一个4位的位字段来保存，为什么？因为4位可以保存0到15，而3位只能保存0到7。
```c
unsigned int month_no:4;
```
```c
typedef struct {
    // 你是第一次来参观水族馆吗？
    unsigned int first_visit:1;//1位可以保存2个值：真或假
    // 您还会再来吗？
    unsigned int come_agiain:1;
    // 您被食人鱼咬掉几根手指？
    unsinged int fingers_lost:4;// 保存0到10的值，需要4位。
    // 您的小孩是否在鲨鱼表演时遇难？
    unsinged int shark_attack:1;
    // 如果可以的话，您一周会来参观几次？
    unsigned int days_a_week;// 3位可以保存0到10的值。
} survey;
```
**要点**
- 可以用联合在同一个存储器单元中保存不同数据类型。
- “指定初始化器”按名设置字段的值。
- C99标准支持“指定初始化器”，C++不支持。
- 如果用{花括号}中的值初始化联合，这个值会以第一个字段类型保存。
- 你完全可以读取联合中未初始化过的字段，编译器不会干涉。但要小心，因为这么做很有可能会出错。
- 枚举保存符号。
- 可以用位字段自定义字段的位数。
- 位字段应当声明为unsigned int。

#### C语言工具箱
- 结构把数据类型组合在一起。
- 可以像初始化数组那样初始化结构。
- 可以用“点表示法”读取结构中的字段。
- 可以用typedef为数据类型创建别名。
- 有了“->”表示法，就能用结构指针更新字段，十分方便。
- 可以用“指定初始化器”按名设置结构或联合的字段。
- 联合可以在同一个存储器单元中保存不同的数据类型。
- 可以用枚举创建一组符号。
- 可以用位字段控制结构中的某些位。

