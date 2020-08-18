package main

import "fmt"

/*
Go 只有一种循环结构——`for` 循环。

基本的 for 循环除了没有了 `( )` 之外（甚至强制不能使用它们），
\看起来跟 C 或者 Java 中做的一样，而 `{ }` 是必须的。
*/

func main() {
	sum := 0
	for i := 0; i < 10; i++ {
		sum += 1
	}
	fmt.Println(sum)
}