package main

import (
    "fmt"
    "time"
)

/*
switch 的执行顺序
switch 的条件从上到下的执行，当匹配成功的时候停止。

（例如，

switch i {
case 0:
case f():
}
当 i==0 时不会调用 `f`。）
*/

func main() {
    fmt.Println("When's Tuesday?")
    today := time.Now().Weekday()
    switch time.Tuesday {
    case today + 0:
        fmt.Println("Today.")
    case today + 1:
        fmt.Println("Tomorrow.")
    case today + 2:
        fmt.Println("In two days.")
    default:
        fmt.Println("Too far away")
    }
}