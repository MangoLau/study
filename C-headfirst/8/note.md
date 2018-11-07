## 8.静态库与动态库 热插拔代码
#### 值得信赖的代码
#### 尖括号代表标准头文件
通常类Unix操作系统（如Mac或Linux）中，编译器会在以下目录查找头文件：
```shell
/usr/local/include #通常用来放第三方库的头文件。编译器会先检查这里。
/usr/include #一般用来放操作系统的头文件。
```
#### 如何共享代码？
#### 共享.h文件
1. 把头文件保存在标准目录中。
    只要把头文件复制到/usr/local/include这样的标准目录中，就可以在源代码中用尖括号包含它们。
2. 在include语句中使用完整路径名。
    如果你想把头文件放在其他地方，如/my_header_files，可以把目录名加到include语句中：
    ```c
    #include "/my_header_files/encrypt.h"
    ```
3. 你可以告诉编译器去哪里找头文件。
    可以使用gcc的-I选项：
    ```c
    gcc -I/my_header_files test_code.c ... -o test_code
    ```
    让编译器同时在/my_header_files 和标准目录中进行查找。

#### 用完整路径名共享.o目标文件
可以把.o目标文件放在一个类似共享目录的地方。当编译程序时，只要在目标文件前加上完整路径就行了：

gcc -I/my_header_files test_code.c /my_object_files/encrypt.o /my_object_files/checksum.o -o test_code

使用目标文件的完整路径名，你就能在多个C项目中共享它们。

/my_object_files就好比一个中央仓库，专门用来保存目标文件。

#### 存档中包含多个.o文件
#### 用ar命令创建存档
- 使用尖括号（<>），编译器就会从标准目录中读取头文件。
- 常见的标准头文件目录有/usr/include和C:\MinGW\include。
- 一个库存档中有多个目标文件。
- 可以用ar -rcs libarchive.a file0.o file1.o...创建存档。
- 库存档名应以lib开头，以.a结尾。
- 如果想链接一个叫libfred.a的存档，就使用-lfred选项。
- 在gcc命令中，-l标志应该在源代码文件后出现。

#### head first 健身房全球化战略
#### 计算卡路里
1. 首先创建一个叫hfcal.o的目标文件，hfcal.h头文件将保存在./includes中：
    ```shell
    gcc -I./includes -c hfcal.c -o hfcal.o
    ```

2. 接着你需要用测试代码elliptical.c创建一个叫elliptical.o的目标文件：
    ```shell
    gcc -I./includes -c elliptical.c -o elliptical.o
    ```
3. 现在 你需要用hfcal.o创建存档库，并把它保存到./libs：
    ```shell
    ar -rcs ./libs/libhfcal.a hfcal.o #存档需要保存在./libs目录中。
    ```
4. 最后，用elliptical.o和hfcal存档创建elliptical可执行文件：
    ```shell
    gcc elliptical.o -L ./libs -lhfcal -o elliptical
    ```

#### 事情可没那么简单。。。
#### 程序由碎片组成。。。
#### 在运行时动态链接
#### .a能在运行时链接吗？
#### 首先，创建目标文件
```shell
gcc -I/includes -fPIC -c hfcal.c -o hfcal.o#hfcal.h头文件在/includes中。-c表示“不要链接代码”。
#-fPIC，它告诉gcc你想创建位置无关代码。
```

位置无关代码：就是无论计算机把它加载到存储器的哪个位置都可以运行的代码。

#### 一种平台一个叫法
```shell
gcc -shared hfcal.o -o C:\libs\hfcal.dll#Windows上的wingw
gcc -shared hfcal.o -o ./libs/libhfcal.dll#Windows上的cygwin
gcc -shared hfcal.o -o ./libs/libhfcal.so#Linux或Unix
gcc -shared hfcal.o -o ./libs/libhfcal.dylib#Mac
#-shared选项告诉gcc你想把.o目标文件转化为动态库。编译器创建动态库时会把库的名字保存在文件中，
#假设你在Linux中创建了一个叫libhfcal.so的库，那么libhfcal.so文件就会记住它的库名叫hfcal。
#若想重命名库，就必须用新的名字重新编译一次。
```
#### 编译elliptical程序
一旦创建了动态库，你就可以像静态库那样使用它。
```shell
gcc -I./includes -c elliptical.c -o elliptical.o
gcc elliptical.o -L./libs -lhfcal -o elliptical
```
Linux试驾
    export LD_LIBRARY_PATH=$LD_LIBRARY_PATH:/libs
    在Linux上，你需要设置LD_LIBRARY_PATH变量，这样程序才能发现动态库。
    如果动态库已经在标准目录中（如/usr/lib），就不需要这样做。


- 动态库在运行时链接程序。
- 用一个或多个目标文件创建动态库。
- 在一些机器上，需要用-fPIC选项来编译目标文件。
- -fPIC令目标代码位置无关。
- 在一些机器上，可以省略-fPIC。
- -shared编译选型可以创建动态库。
- 动态库在不同机器上名字不同。
- 如果把动态库保存在标准目录中，生活会变得更简单。
- 不然，就需要设置PATH变量和LD_LIBRARY_PATH变量。

#### C语言工具箱
- \#include<>会查找包括/usr/include在内的标准目录。
- -l<路径名>会链接标准目录（例如/usr/lib）下的文件。
- -l<路径名>在标准include目录中添加目录。
- -l<路径名>在标准lib目录列表中添加目录。
- ar命令创建目标文件的存档。
- gcc -shared把目标文件转化为动态库。
- 动态库在运行时链接。
- 动态库的后缀名有.so、 .dylib、 .dll和.dll.a等。
- 动态库在不同的操作系统上有不同的名字。
- 库存档名形如libXXX.a。
- 库存档是静态链接的。

