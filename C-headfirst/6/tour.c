#include <stdio.h>
#include <string.h>
#include <stdlib.h>

typedef struct island {// 必须为这个结构命名。
    char *name;// 你将用字符串表示岛名和机场的营业时间。
    char *opens;
    char *closes;
    struct island *next;// 你在结构中保存了一个指针，指向下一座岛。
} island;

island* create(char *name)
{
	island *i = malloc(sizeof(island));
	i->name = strdup(name);
	i->opens = "09:00";
	i->closes = "17:00";
	i->next = NULL;
	return i;
}

void display(island *start)
{
    island *i = start;
    for (; i != NULL; i = i->next) {
        printf("Name: %s\n open: %s-%s\n", i->name, i->opens, i->closes);
    }
}

void release(island *start)
{
    island *i = start;
    island *next = NULL;
    for (; i != NULL; i=next) {
        next = i->next;// 把next设为指向下一座岛指针。
        free(i->name);// 首先，需要释放用strdup()创建的name字符串。
        free(i);// 只有先释放name，才能释放island结构。如果先释放了island结构，就再也找不到name去释放了。
    }
}

void main()
{
	/*island amity = {"Amity", "09:00", "17:00", NULL};// 这段代码将为每座岛创建island
	island craggy = {"Craggy", "09:00", "17:00", NULL};
	island isla_nublar = {"Isla Nublar", "09:00", "17:00", NULL};
	island shutter = {"Shutter", "09:00", "17:00", NULL};
	amity.next = &craggy;
	craggy.next = &isla_nublar;
	isla_nublar.next = &shutter;
	island skull = {"Skull", "09:00", "17:00", NULL};
    isla_nublar.next = &skull;// 这行代码把isla Nublar岛连到skull岛。
    skull.next = &shutter;// 这行代码把skull岛连到Shutter岛
	display(&amity);*/

	island *start = NULL;
	island *i = NULL;
	island *next = NULL;
	char name[80];
	for (; fgets(name, 80, stdin) != NULL; i = next) {
	    next = create(name);
	    if (start == NULL)
	        start = next;
        if (i != NULL)
            i->next = next;
	}
	display(start);
	release(start);
}
