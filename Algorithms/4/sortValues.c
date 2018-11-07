/* 基于值的插入排序 */
void sortValues(void *base, int n, int s, int (*cmp)(const void *, const void *))
{
	int j;
	void *saved = malloc(s);
	for (j = 1; j < n; j++) {
		int i = j - 1;
		void *value = base + j * s;
		while (i >= 0 && cmp(base + i * s, value) > 0) {
			i--;
		}
		/*
		* 如果已经在正确位置上，就不需要进行移动；否则，保存待插入的值，
		* 并将中间段的值作为一个大块进行移动
		* 接着将该值插入正确的位置
		*/
		if (++i == j) continue;
		memmove(saved, value, s);
		memmove(base+(i+1)*s, base + i*s, s*(j-1));
		memmove(base+i*s, saved, s);
	}
	free(saved);
}