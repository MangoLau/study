#include <stdio.h>
/*
* 将跳过文本消息的前六个字符
*/
void skip(char *msg)
{
	puts(msg + 6);
}

void main(int argc, char const *argv[])
{
	
	char *msg_from_amy = "Don't call me";
	skip(msg_from_amy);
}