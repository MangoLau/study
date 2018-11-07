/* 基于指针的插入排序 */
void sortPointers(void **ar, int n, int(*cmp)(const void *,const void *))
{
	int j;
	for (j = 1; j < n; j++) {
		int i = j - 1;
		void *value = ar[j];
		while (i >= 0 && cmp(ar[i], value) > 0) {
			ar[i + 1] = ar[i];
			i--;
		}
		ar[i + 1] = value;
	}
}