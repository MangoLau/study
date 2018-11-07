#include <stdio.h>
#include <stdlib.h>

int main()
{
	char card_name[3];
	puts("输入牌名：");
	scanf("%2s", card_name);
	int val = 0;
	/*if (card_name[0] == 'K') {
		val = 10;
	} else if (card_name[0] == 'Q') {
		val = 10;
	} else if (card_name[0] == 'J') {
		val = 10;
	} else if (card_name[0] == 'A') {
		val = 11;
	} else {
		val = atoi(card_name);
	}*/

	switch (card_name[0]) {
		case 'K':
		case 'Q':
		case 'J':
			val = 10;
			break;
		case 'A':
			val = 11;
			break;
		default:
			val = atoi(card_name);
	}
	/* 检查牌的点数是否在3到6之间 */
	if (val >= 3 && val <= 6) {
		puts("计数增加");
	} else if (val == 10) {
		puts("计数减少");
	}
}