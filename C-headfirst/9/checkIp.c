#include <stdio.h>
#include <errno.h>
#include <string.h>
#include <unistd.h>

int main()
{
    // 使用execl()，因为你有程序文件的路径。
    if (execl("/sbin/ifconfig", "/sbin/ifconfig", NULL) == -1) {// 如果execl()返回-1，就表明它执行失败，我们应该去找ipconfig。
        if (execlp("ipconfig", "ipconfig", NULL) == -1) {// 我们可以用execlp()根据PATH查找ipconfig命令。
            fprintf(stderr, "Cannot run ipconfig: %s", strerror(errno));// 检查返回值是否是-1，以防命令执行失败。strerror()函数将显示任何可能出现的错误。
            return 1;
        }
    }
    return 0;
}