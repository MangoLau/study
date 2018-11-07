#include <arpa/inet.h>
#include <string.h>
#include <errno.h>
#include <stdlib.h>
#include <stdio.h>

void error(char *msg)
{
    fprintf(stderr, "%s: %s\n", msg, strerror(errno));
    exit(1);// 立刻终止程序，并把退出状态置1。
}

int main(int argc, char *argv[])
{
    char *advice[] = {
        "Take smaller bites\r\n",
        "Go for the tight jeans. No they NOT make you look fat.\r\n",
        "One word: Inappropriate\r\n",
        "Just for today, be honest. Tell your boss what you *really* think\r\n",
        "You might want to rethink that haircut\r\n"
    };

    int listener_d = socket(PF_INET, SOCK_STREAM, 0);// 创建套接字。

    struct sockaddr_in name;
    name.sin_family = PF_INET;
    name.sin_port = (in_port_t)htons(30000);
    name.sin_addr.s_addr = htonl(INADDR_ANY);
    int reuse = 1;// 用一个整型变量保存选项。设为1，表示“重新使用端口”。
    if (setsockopt(listener_d, SOL_SOCKET, SO_REUSEADDR, (char *)&reuse, sizeof(int) == -1)) {
        error("无法设置套接字的“重新使用端口”选项");
    }
    int bindFlag = bind(listener_d, (struct sockaddr *) &name, sizeof(name));// 把套接字绑定到30000端口。
    if (bindFlag == -1)
        error("bind error: ");

    if (listen(listener_d, 10) == -1) {// 把监听长度设为10。
        error("listen error: ");
    }
    puts("Waiting for connection");

    while (1) {// 需要循环“接受连接，然后开始对话”。
        struct sockaddr_storage client_addr;
        unsigned int address_size = sizeof(client_addr);
        int connect_d = accept(listener_d, (struct sockaddr *)&client_addr, &address_size);// 接受来自客户端的连接。
        char *msg = advice[rand() % 5];

        if (send(connect_d, msg, strlen(msg), 0) == -1) {// 开始和客户端通信。
            error("send error: ");
        }
        close(connect_d);
    }

    return 0;
}