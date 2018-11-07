#include <stdio.h>
#include <string.h>
#include <stdlib.h>

typedef struct island {// 必须为这个结构命名。
    char *name;// 你将用字符串表示岛名和机场的营业时间。
    char *opens;
    char *closes;
    struct island *next;// 你在结构中保存了一个指针，指向下一座岛。
} island;

void display(island *start)
{
    island *i = start;
    for (; i != NULL; i = i->next) {
        printf("Name: %s\n open: %s-%s\n", i->name, i->opens, i->closes);
    }
}

island* create(char *name)
{
	island *i = malloc(sizeof(island));
	i->name = strdup(name);
	i->opens = "09:00";
	i->closes = "17:00";
	i->next = NULL;
	return i;
}

void main()
{
	char name[80];
	fgets(name, 80, stdin);
	island *p_island0 = create(name);
	fgets(name, 80, stdin);
	island *p_island1 = create(name);
	display(p_island0);
	display(p_island1);
}
