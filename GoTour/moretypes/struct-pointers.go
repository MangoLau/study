package main

import "fmt"

type Vertex struct {
    X int
    Y int
}

func main() {
    v := Vertex{1, 2}
    p := &v
    p.X = 1e9
    fmt.Println((*p).X)
    // 上面 (*p).X 太罗嗦，可以用下面 p.X 方式简写
    fmt.Println(p.X)
    fmt.Println(v)
}
