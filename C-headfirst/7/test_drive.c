#include <stdio.h>
#include <string.h>
#include <stdlib.h>

/* 升序排列整型得分 */
int compare_scores(const void* score_a, const void* score_b)
{
    int a = *(int*)score_a;
    int b = *(int*)score_b;
    return a - b;
}

/* 降序排列整型得分 */
int compare_scores_desc(const void* score_a, const void* score_b)
{
    // void指针(void*)可以保存任何类型的指针。
    // 值以指针的形式传给函数，因此要做的第一件事就是从指针中提取整型值。
    int a = *(int*)score_a;// 需要把void指针转换为整型指针。
    int b = *(int*)score_b;// 第一个*就能得到保存在地址score_b中的整型值了。
    return b - a;
}

typedef struct {
    int width;
    int height;
} rectangle;

/* 按面积从小到大排列整型 */
int compare_areas(const void* a, const void*b)
{
    rectangle* ra = (rectangle*)a;
    rectangle* rb = (rectangle*)b;
    int area_a = (ra->width * ra->height);
    int area_b = (rb->width * rb->height);
    return area_a - area_b;
}

/* 按字母序排列名字，区分大小写 */
int compare_names (const void* a, const void* b)
{
    char** sa = (char**)a;// 字符串是字符指针，所以得到的是指针的指针。
    char** sb = (char**)b;
    return strcmp(*sa, *sb);// 我们要用*运算符取得字符串。
}

/* 按面积从大到小排列整型 */
int compare_areas_desc(const void* a, const void*b)
{
    return compare_names(b, a);// 或者也可以写成-compare_areas(a, b).
}

/* 按逆字母序排列名字，区分大小写 */
int compare_names_desc(const void* a, const void* b)
{
    return compare_names(b, a);// 或者也可以写成-compare_names(a, b)
}

int main()
{
    int scores[] = {543, 434, 43, 554, 11, 3, 112};
    int i;
    qsort(scores, 7, sizeof(int), compare_scores_desc);// 对得分进行排序。
    puts("These are the scores in order:");
    for (i = 0; i < 7; i++) {// 输出排序后的数组。
        printf("Score = %i\n", scores[i]);
    }
    char *names[] = {"Karen", "Mark", "Brett", "Molly"};
    qsort(names, 4, sizeof(char*), compare_names);// 名字数组是一个字符指针数组，因此每一项的大小是sizeof(char*)。
    puts("These are the names in order:");
    for(i = 0; i < 4; i++) {
        printf("%s\n", names[i]);// 打印排序以后的名字。
    }
    return 0;
}
