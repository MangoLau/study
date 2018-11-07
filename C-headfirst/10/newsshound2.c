#include <stdio.h>
#include <unistd.h>
#include <errno.h>
#include <string.h>
#include <sys/wait.h>

void error(char *msg)
{
    fprintf(stderr, "%s: %s\n", msg, strerror(errno));
    exit(1);// 立刻终止程序，并把退出状态置1。
}

int main(int argc, char *argc[])
{
    char *phrase = argv[1];
    char *vars = {"RSS_FEED=http://www.cnn.com/rss/celebs.xml", NULL};
    FILE *f = fopen("stories.txt", "w");
    if (!f) {// 如果不能以“写”模式打开stories.txt，f就是0。
        error("Can't open stories.txt");
    }
    pid_t pid = fork();
    if (pid == -1) {
        error("Can't fork process");
    }
    if (!pid) {
        if (dup2(fileno(f), 1) == -1) {// 令1号描述符指向stories.txt文件。
            error("Can't redirect Standard Output");
        }
        if (execle("/usr/bin/python", "/usr/bin/python", "./rssgossip.py", phrase, NULL, vars) == -1) {
            error("Can't run script");
        }
    }
    int pid_status;// 保存进程信息
    if (waitpid(pid, &pid_status, 0) == -1) {
        error("等待子进程时发生了错误");
    }
    return 0;
}