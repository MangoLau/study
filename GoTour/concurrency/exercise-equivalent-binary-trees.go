package main

import "golang.org/x/tour/tree"
import "fmt"

/*
练习：等价二叉查找树
1. 实现 Walk 函数。

2. 测试 Walk 函数。

函数 tree.New(k) 用于构造一个随机结构的已排序二叉查找树，它保存了值 k, 2k, 3k, ..., 10k。

创建一个新的信道 ch 并且对其进行步进：

go Walk(tree.New(1), ch)
然后从信道中读取并打印 10 个值。应当是数字 1, 2, 3, ..., 10。

3. 用 Walk 实现 Same 函数来检测 t1 和 t2 是否存储了相同的值。

4. 测试 Same 函数。

Same(tree.New(1), tree.New(1)) 应当返回 true，而 Same(tree.New(1), tree.New(2)) 应当返回 false。

Tree 的文档可在这里找到。
*/

// Walk 步进 tree t 将所有的值从 tree 发送到 channel ch。
func Walk(t *tree.Tree, ch chan int) {
    Send(t, ch)
    close(ch)
}

func Send(t *tree.Tree, ch chan int) {
    if t.Left != nil {
        Send(t.Left, ch)
    }
    ch <- t.Value
    if t.Right != nil {
        Send(t.Right, ch)
    }
}

// Same 检测树 t1 和 t2 是否含有相同的值。
func Same(t1, t2 *tree.Tree) bool {
    c1, c2 := make(chan int), make(chan int)
    go Walk(t1, c1)
    go Walk(t2, c2)

    for v1 := range c1 {
        if v1 != <-c2 {
            return false
        }
    }
    return true
}

func main() {
    ch := make(chan int)
    go Walk(tree.New(1), ch)
    for v := range ch {
        fmt.Println(v)
    }

    if Same(tree.New(1), tree.New(1)) {
        fmt.Println("tree1 eq tree2")
    } else {
        fmt.Println("tree1 neq tree2")
    }

    if Same(tree.New(1), tree.New(2)) {
        fmt.Println("tree1 eq tree2")
    } else {
        fmt.Println("tree1 neq tree2")
    }
}
