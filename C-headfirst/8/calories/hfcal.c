#include <stdio.h>
#include <hfcal.h>

/* hfcal.h头文件中只有display_calories()函数的声明。 */
void display_calories(float weight, float distance, float coeff)
{
    printf("Weight: %3.2f lbs \n", weight);// 体重的单位是磅。
    printf("Distance: %3.2f miles\n", distance);// 距离的单位是英里。
    printf("Calories burned: %4.2f cal\n", coeff * weight * distance);
}