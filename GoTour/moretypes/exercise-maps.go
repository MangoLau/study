package main

import (
	//"golang.org/x/tour/wc"
    "strings"
    "fmt"
)

func WordCount(s string) map[string]int {
    result := make(map[string]int)
    for _,v := range strings.Fields(s) {
        value := result[v]
        result[v] = value + 1
    }
    return result//map[string]int{"x": 1}
}

func main() {
    fmt.Println(WordCount("Hello World!"))
	//wc.Test(WordCount)
}
