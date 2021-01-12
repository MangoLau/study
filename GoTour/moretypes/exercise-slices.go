package main

import "fmt"

func Pic(dx, dy int) [][]uint8 {
	ret := make([][]uint8, dy)
	for i := 0; i < dy; i++ {
		ret[i] = make([]uint8, dx)
		for j := 0; j < dx; j++ {
			ret[i][j] = uint8((j + i) / 2)
		}
	}
	
	return ret
}

func main() {
	fmt.Println(Pic(3, 20))
}