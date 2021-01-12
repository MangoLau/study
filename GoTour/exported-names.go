package main

import (
    "fmt"
    "math"
)

func main() {
    // 在 Go 中，首字母大写的名称是被导出的。
    // Foo 和 FOO 都是被导出的名称。名称 foo 是不会被导出的。
    // fmt.Println(math.pi)
    fmt.Println(math.Pi)
}