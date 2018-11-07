#include <stdio.h>
#include <string.h>
#include <errno.h>
#include <stdlib.h>
#include <sys/socket.h>
#include <arpa/inet.h>
#include <unistd.h>
#include <signal.h>

int read_in(int socket, char *buf, int len)// 这个函数读取\n前的所有字符。
{
    char *s = buf;
    int slen = len;
    int c = recv(socket, s, slen, 0);
    while ((c > 0) && (s[c-1] != '\n')) {// 循环读取字符，直到没有字符可读或读到了\n。
        s += c;
        slen -= c;
        c = recv(socket, s, slen, 0);
    }
    if (c < 0)
        return c;// 防止错误。
    else if (c == 0)
        buf[0] = '\0';// 什么都没读到，返回一个空字符串。
    else
        s[c-1] = '\0';// 用\0替换掉\r
    return len - slen;
}

/* 报错 */
void error(char *msg)
{
    fprintf(stderr, "%s: %s\n", msg, strerror(errno));
    exit(1);// 立刻终止程序，并把退出状态置1。
}

/* open socket */
int open_listener_socket()
{
    int s = socket(PF_INET, SOCK_STREAM, 0);
     if (s == -1) {
        error("Can't open socket: ");
     }
     return s;
}

/* 绑定端口 */
void bind_to_port(int socket, int port)
{
    struct sockaddr_in name;
        name.sin_family = PF_INET;
        name.sin_port = (in_port_t)htons(port);
        name.sin_addr.s_addr = htonl(INADDR_ANY);
        int reuse = 1;// 用一个整型变量保存选项。设为1，表示“重新使用端口”。
        if (setsockopt(socket, SOL_SOCKET, SO_REUSEADDR, (char *)&reuse, sizeof(int)) == -1) {
            error("无法设置套接字的“重新使用端口”选项");
        }
        int bindFlag = bind(socket, (struct sockaddr *) &name, sizeof(name));// 把套接字绑定到30000端口。
    if (bindFlag == -1)
        error("bind error: ");
}

/* 向客户端发送信息 */
int say(int socket, char *s)
{
    int result = send(socket, s, strlen(s), 0);
    if (result == -1) {
        fprintf(stderr, "%s: %s\n", "和客户端通信时发生了错误", strerror(errno));
    }
    return result;
}

int listener_d;

void handle_shutdown(int sig)// 如果有人在服务器运行期间按了Ctrl-c，这个函数就会赶在程序结束前关闭套接字。
{
    if (listener_d)
        close(listener_d);

    fprintf(stderr, "Bye!\n");
    exit(0);
}

int catch_signal(int sig, void (*handler)(int))
{
    struct sigaction action;// 创建动作
    action.sa_handler = handler;// 将动作处理器设为我们传递来的函数
    sigemptyset(&action.sa_mask);// 使用一个空的掩码。
    action.sa_flags = 0;
    return sigaction(sig, &action, NULL);
}

/* 主函数 */
int main(int argc, char *argv[])
{
    if (catch_signal(SIGINT, handle_shutdown) == -1)
        error("Can't set the interrupt handler");// 如果有人按了Ctrl-C就调用handle_shutdown()。

    listener_d = open_listener_socket();// 创建套接字。
    bind_to_port(listener_d, 30000);
    if (listen(listener_d, 10) == -1) {// 把监听长度设为10。
        error("listen error: ");
    }
    struct sockaddr_storage client_addr;
    unsigned int address_size = sizeof(client_addr);
    puts("Waiting for connection");
    char buf[255];

    while (1) {// 需要循环“接受连接，然后开始对话”。
        int connect_d = accept(listener_d, (struct sockaddr *)&client_addr, &address_size);// 接受来自客户端的连接。
        if (connect_d == -1) {
            error("connect error:");
        }

        if (!fork()) {// 创建子进程，如果fork()调用返回0，就说明你在子进程中。
            close(listener_d);// 在子进程中，需要关闭主监听套接字。子进程只用connect_d套接字和客户端通信。
            if (say(connect_d, "Internet Knock-Knock Server \r\nVersion 1.0\r\nKnock! Knock!\r\n>") != -1){
                read_in(connect_d, buf, sizeof(buf));
                if (strncasecmp("Who's there?", buf, 12))
                    say(connect_d, "You should say 'Who's there?' !");
                else {
                    if (say(connect_d, "Oscar\r\n>") != -1) {
                        read_in(connect_d, buf, sizeof(buf));
                        if (strncasecmp("Oscar who?", buf, 10))
                            say(connect_d, "You should say 'Oscar who?' !\r\n");
                        else
                            say(connect_d, "Oscar silly question, you set a silly answer\r\n");
                    }
                }
            }
            close(connect_d);// 一旦通信结束，子进程就可以关闭通信套接字了。
            exit(0);// 通信结束以后，子进程应该退出程序。这样就能防止子进程进入服务器的主循环。
        }
        close(connect_d);
    }
    return 0;
}