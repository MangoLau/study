#include <stdio.h>
#include <stdarg.h>

enum drink {
    MUDSLIDE, FUZZY_NAVEL, MONKEY_GLAND, ZOMBIE
};

double price (enum drink d)
{
    switch (d) {
        case MUDSLIDE:
            return 6.79;
        case FUZZY_NAVEL:
            return 5.31;
        case MONKEY_GLAND:
            return 4.82;
        case ZOMBIE:
            return 5.89;
    }
    return 0;
}

double total(int args, ...)
{
    double total = 0;
    va_list ap;// va_list用来保存传给函数的其他参数。
    va_start(ap, args);// va_start表示可变参数从哪里开始。从args参数开始后面都是可变参数。
    int i;
    for (i = 0; i < args; i++) {// 循环遍历所有其他参数。args中保存了变量的数目。
        enum drink d = va_arg(ap, enum drink);// va_arg接收两个值：va_list和要读取参数的类型。
        total += price(d);
    }
    va_end(ap);// 销毁va_list
    return total;
}

void main()
{
    printf("Price is %.2f\n", total(2, MONKEY_GLAND, MUDSLIDE));
    printf("Price is %.2f\n", total(3, MONKEY_GLAND, MUDSLIDE, FUZZY_NAVEL));
    printf("Price is %.2f\n", total(1, ZOMBIE));
}