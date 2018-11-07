#include <stdio.h>
#include <unistd.h>
#include <string.h>
#include <errno.h>

int main(int argc, char *argv[])
{
    char *feeds[] = {
        "http://www.cnn.com/rss/celebs.xml",
        "http://www.rolingstone.com/rock.xml",
        "http://eonlie.comgossip.xml"
    };
    int times = 3;
    char *phrase = argv[1];
    int i;
    for (i = 0; i < times; i++) {
        char var[255];
        sprintf(var, "RSS_FEED=%s", feeds[i]);
        char *vars[] = {var, NULL};
        pid_t pid = fork();// 首先调用fork()克隆进程。
        if (pid == -1) {// 如果fork()返回-1，就说明在克隆进程时出了问题。
            fprintf(stderr, "Can't fork process: %s\n", strerror(errno));
            return 1;
        }
        if (!pid) {// 如果fork()返回0，说明代码运行在子进程中。
            // 如果你执行到这里，说明你是子进程，应该调用exec()运行脚本。
            if (execle("/usr/bin/python", "/usr/bin/python", "./rssgossip.py", phrase, NULL, vars) == -1) {
                fprintf(stderr, "Can't run script: %s\n", strerror(errno));
                return 1;
            }
        }
    }
    return 0;
}