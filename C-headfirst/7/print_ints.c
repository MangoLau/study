#include <stdio.h>
#include <stdarg.h>

void print_ints(int args, ...)// int args是普通参数，可变参数跟在后面。
{
    va_list ap;// va_list用来保存传给函数的其他参数。
    va_start(ap, args);// va_start表示可变参数从哪里开始。从args参数开始后面都是可变参数。
    int i;
    for (i = 0; i < args; i++) {// 循环遍历所有其他参数。args中保存了变量的数目。
        printf("argument: %i\n", va_arg(ap, int));// va_arg接收两个值：va_list和要读取参数的类型。
    }
    va_end(ap);// 销毁va_list
}

void main()
{
    print_ints(3, 100, 200, 300);
}