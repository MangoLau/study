package main

import "fmt"

func main() {
    m := make(map[string]int)

    // 在映射 m 中插入或修改元素： m[key] = elem
    m["Answer"] = 42
    // 获取元素： m[key]
    fmt.Println("The value:", m["Answer"])

    // 删除元素： delete(m, key)
    delete(m, "Answer")
    fmt.Println("The value:", m["Answer"])

    // 通过双赋值检测某个键是否存在：
    // 若 key 在 m 中，ok 为 true ；否则，ok 为 false。
    // 若 key 不在映射中，那么 elem 是该映射元素类型的零值。
    // 同样的，当从映射中读取某个不存在的键时，结果是映射的元素类型的零值。
    v, ok := m["Answer"]
    fmt.Println("The value:", v, "Present?", ok)
}
