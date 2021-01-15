package main

import (
    "io"
    "os"
    "strings"
)

/*
练习：rot13Reader
有种常见的模式是一个 io.Reader 包装另一个 io.Reader，然后通过某种方式修改其数据流。

例如，gzip.NewReader 函数接受一个 io.Reader（已压缩的数据流）并返回一个同样实现了 io.Reader 的 *gzip.Reader（解压后的数据流）。

编写一个实现了 io.Reader 并从另一个 io.Reader 中读取数据的 rot13Reader，通过应用 rot13 代换密码对数据流进行修改。

rot13Reader 类型已经提供。实现 Read 方法以满足 io.Reader。
*/


type rot13Reader struct {
    r io.Reader
}

func rot13(out byte) byte {
    switch {
        case (out >= 'A' && out <= 'M') || (out >= 'a' && out <= 'm'):
            out += 13
        case (out > 'M' && out <= 'Z') || (out > 'm' && out < 'z'):
            out -= 13
    }
    return out
}

func (s rot13Reader) Read(b []byte) (int, error) {
    n, e := s.r.Read(b)
    for i := 0; i < n; i++ {
        b[i] = rot13(b[i])
    }
    return n, e
}

func main() {
    s := strings.NewReader("Lbh Penpxrq gur pbqr!")
    r := rot13Reader{s}
    io.Copy(os.Stdout, &r)
}
