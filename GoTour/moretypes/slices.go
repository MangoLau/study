package main

import "fmt"

func main() {
    // 类型 []T 表示一个元素类型为 T 的切片。
    // 它会选择一个半开区间，包括第一个元素，但排除最后一个元素。
    primes := [6]int{2, 3, 5, 7, 11, 13}

    // 以下表达式创建了一个切片，它包含 primes 中下标从 1 到 3 的元素
    var s []int = primes[1:4]
    fmt.Println(s)
}
