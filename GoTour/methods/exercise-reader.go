package main

/*
练习：Reader
实现一个 Reader 类型，它产生一个 ASCII 字符 'A' 的无限流。
*/

import ("golang.org/x/tour/reader")

type MyReader struct {}

// TODO: 给 MyReader 添加一个 Read([]byte) (int, error) 方法
func (r MyReader) Read(b []byte) (int, error) {
    // byte用''单引号包括字符 不然报错cannot use "c" (type string) as type byte in assignment
    b[0] = 'A'
    // 返回 1 个字符
    return 1 nil
}

func main() {
    reader.Validate(MyReader{})
}
