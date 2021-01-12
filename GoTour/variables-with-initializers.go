package main

import "fmt"

// 变量定义可以包含初始值，每个变量对应一个。
var i, j int = 1, 2

func main() {
    // 如果初始化是使用表达式，则可以省略类型；变量从初始值中获得类型。
    var c, python, java = true, false, "no!"
    fmt.Println(i, j , c, python, java)
}