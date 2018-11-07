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
