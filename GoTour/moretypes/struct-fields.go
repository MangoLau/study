package main

import "fmt"

type Vertex struct {
    X int
    Y int
}

func main() {
    v := Vertex{1, 2}
    // 字段使用点号来访
    v.X = 4
    fmt.Println(v.X)
}
