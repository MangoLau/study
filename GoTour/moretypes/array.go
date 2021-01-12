package main

import "fmt"

func main() {
    // 类型 [n]T 表示拥有 n 个 T 类型的值的数组。
    // 以下会将变量 a 声明为拥有 2 个字符串的数组
    var a [2]string
    a[0] = "Hello"
    a[1] = "World"
    fmt.Println(a[0], a[1])
    fmt.Println(a)

    primes := [6]int{2, 3, 5, 7, 11, 13}
    fmt.Println(primes)
}
