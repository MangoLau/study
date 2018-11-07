#include <stdio.h>
#include <unistd.h>
#include <errno.h>
#include <string.h>
#include <stdlib.h>

void error(char *msg)
{
    fprintf(stderr, "%s: %s\n", msg, strerror(errno));
    exit(1);// 立刻终止程序，并把退出状态置1。
}

void open_url(char *url)
{
    char launch[255];
    sprintf(launch, "cmd /c start %s", url);// 在Windows上打开网页。
    system(launch);
    sprintf(launch, "x-www-browser '%s' &", url);// 在Linux上打开网页。
    system(launch);
    sprintf(launch, "open '%s'", url);// 在Mac上打开网页。
    system(launch);
}

int main(int argc, char *argv[])
{
    char *phrase = argv[1];
    char *vars[] = {"RSS_FEED=http://www.ftchinese.com/rss/diglossia", NULL};
    int fd[2];
    if (pipe(fd) == -1) {
        error("Can't create the pipe");
    }
    pid_t pid = fork();
    if (pid == -1) {
        error("Can't fork process");
    }
    if (!pid) {
        dup2(fd[1], 1);
        close(fd[0]);
        if (execle("/usr/bin/python", "/usr/bin/python", "../9/rss/rssgossip.py", phrase, NULL, vars) == -1) {
            error("Can't run script");
        }
    }
    dup2(fd[0], 0);
    close(fd[1]);
    char line[255];
    while (fgets(line, 255, stdin)) {
        if (line[0] == '\t')
            open_url(line + 1);
    }
    return 0;
}