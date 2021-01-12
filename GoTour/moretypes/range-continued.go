package main

import "fmt"

func main() {
    pow := make([]int, 10)
    // 若你只需要索引，忽略第二个变量即可
    for i := range pow {
        pow[i] = 1 << uint(i) // == 2**i
    }

    // 以将下标或值赋予 _ 来忽略它。
    for _, value := range pow {
        fmt.Printf("%d\n", value)
    }
}
