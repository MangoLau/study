#include <stdio.h>
#include <stdlib.h>
#include <errno.h>
#include <string.h>
#include <unistd.h>
#include <signal.h>

void error(char *msg)
{
    fprintf(stderr, "%s: %s\n", msg, strerror(errno));
    exit(1);// 立刻终止程序，并把退出状态置1。
}

int catch_signal(int sig, void (*handler)(int))
{
    struct sigaction action;// 创建动作
    action.sa_handler = handler;// 将动作处理器设为我们传递来的函数
    sigemptyset(&action.sa_mask);// 使用一个空的掩码。
    action.sa_flags = 0;
    return sigaction(sig, &action, NULL);
}

void diediedie(int sig)
{
    puts("Goodbye cruel world...\n");
    exit(1);
}

int main()
{
    if (catch_signal(SIGINT, diediedie) == -1) {
        fprintf(stderr, "Can't map the handler");
        exit(2);
    }
    char name[30];
    printf("Enter you name: ");
    fgets(name, 30, stdin);
    printf("Hello %s\n", name);
    return 0;
}
