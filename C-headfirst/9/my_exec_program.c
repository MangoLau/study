#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

void main()
{
    char *my_env[] = {"JUICE=pech and apple", NULL};// 可以用字符串指针数组的形式创建一组环境变量。环境变量的格式时“变量名=值”。数组最后一项必须是NULL
    execle("diner_info", "diner_info", "4", NULL, my_env);// execle传递参数列表和环境变量。my_env里放的是环境变量。
}