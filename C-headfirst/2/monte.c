#include <stdio.h>

/*
*这个程序会报错
*字符串字面值不能更新
*指向字符串字面值的指针变量不能用来修改字符串的内容：
char *cards = "JQK";
不能用这个变量修改这个字符串。
但如果你用字符串字面值创建一个数组，就可以修改了：
char cards[] = "JQK";
*/
/*int main()
{
	char *cards = "JQK";
	char a_card = cards[2];
	cards[2] = cards[1];
	cards[1] = cards[0];
	cards[0] = cards[2];
	cards[2] = cards[1];
	cards[1] = a_card;
	puts(cards);
	return 0;
}*/


int main(int argc, char const *argv[])
{
	char cards[] = "JQK";
	char a_card = cards[2];
	cards[2] = cards[1];
	cards[1] = cards[0];
	cards[0] = cards[2];
	cards[2] = cards[1];
	cards[1] = a_card;
	puts(cards);
	return 0;
}