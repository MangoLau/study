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

void* do_stuff(void* param)// 线程函数可以接收一个void指针类型的参数。
{
    long thread_no = (long)param;// 把它转回long。
    printf("Thread number %ld\n", thread_no);
    return (void*)(thread_no + 1);// 返回时将其类型转化为void指针。
}

int main()
{
    pthread_t threads[3];
    long t;
    for (t = 0; t < 3; t++) {
        pthread_create(&threads[t], NULL, do_stuff, (void*)t);// 将long型变量t的值转化为void指针类型。
    }
    void* result;
    for (t = 0; t < 3; t++) {
        pthread_join(threads[t], &result);
        printf("Thread %ld returned %ld\n", t, (long)result);// 在使用前先把它转换为long。
    }
    return 0;
}