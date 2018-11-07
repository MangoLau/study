#include <stdio.h>
#include <stdlib.h>
#include <time.h>

char* now()// 函数返回一个字符串，包含当前文本和时间
{
    time_t t;
    time(&t);
    return asctime(localtime(&t));
}

/* 主控程序，用来登记警卫的巡逻记录 */
int main()
{
    char comment[80];
    char cmd[120];
    fgets(comment, 80, stdin);
    sprintf(cmd,
     "echo '%s %s' >> reports.log",
      comment, now());
    system(cmd);
    return 0;
}