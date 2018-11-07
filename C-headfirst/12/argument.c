#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <errno.h>
#include <pthread.h>

/* 报错 */
void error(char *msg)
{
    fprintf(stderr, "%s: %s\n", msg, strerror(errno));
    exit(1);// 立刻终止程序，并把退出状态置1。
}

void* does_not(void *a)
{
    int i = 0;
    for (i = 0; i < 5; i++) {
        sleep(1);
        puts("Does not!");
    }
    return NULL;
}

void* does_too(void *a)
{
    int i = 0;
    for (i = 0; i < 5; i++) {
        sleep(1);
        puts("Does too!");
    }
    return NULL;
}

int main()
{
    pthread_t t0;// 它保存了线程的所有信息。
    pthread_t t1;
    if (pthread_create(&t0, NULL, does_not, NULL) == -1)// 创建线程。does_not是线程将运行的函数名。
        error("无法创建线程t0");
    if (pthread_create(&t1, NULL, does_too, NULL) == -1)// &t1是用来保存线程信息的数据结构的地址。
        error("无法创建线程t1");

    void* result;
    if (pthread_join(t0, &result) == -1)// pthread_join()函数会等待线程结束。
        error("无法回收线程t0");
    if (pthread_join(t1, &result) == -1)
        error("无法回收线程t1");
    return 0;
}