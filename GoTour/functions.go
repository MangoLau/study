package main

import "fmt"

// 注意类型在变量名 _之后_。
func add(x int, y int) int {
    return x + y
}

func main() {
    fmt.Println(add(100, 10))
}