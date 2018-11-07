#include <stdio.h>
#include <stdlib.h>

int main(int argc, char *argv[])
{
    printf("Diners: %s\n", argv[1]);
    printf("Juice: %s\n", getenv("JUICE"));// 你可以使用stdlib.h中的getenv()读取环境变量。
    return 0;
}