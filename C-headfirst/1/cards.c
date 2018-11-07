/*
 * 计算牌面点数的程序。
 * 使用“拉斯维加斯公开许可证”。
 * (c)2014学院21点扑克游戏小组
 */

#include <stdio.h>
#include <stdlib.h>

int main()
{
	char card_name[3];
	puts("输入排名：");
	scanf("%2s", card_name);
	int val = 0;
	if (card_name[0] == 'K') {
		val = 10;
	} else if (card_name[0] == 'Q') {
		val = 10;
	} else if (card_name[0] == 'J') {
		val = 10;
	} else if (card_name[0] == 'A') {
		val = 11;
	} else {
		 val = atoi(card_name);
	}
	printf("这张牌的点数是：%i\n", val);
	return 0;
}