package main

import (
  "fmt"
)

type Fetcher interface {
        // Fetch 返回 URL 的 body 内容，并且将在这个页面上找到的 URL 放到一个 slice 中。
  Fetch(url string) (body string, urls []string, err error)
}

var lockx = make(chan int,1)

// 同步通信使用
func LockFun(f func()) {
  lockx<-1
  f()
  <-lockx
}

var visited map[string]bool = make(map[string]bool)

// Crawl 使用 fetcher 从某个 URL 开始递归的爬取页面，直到达到最大深度。
func Crawl(url string, depth int, fetcher Fetcher, banner chan int) {
 
  if depth < 1 || visited[url] {
    banner<-1
    return
  }
  body, urls, err := fetcher.Fetch(url)
  LockFun(func(){
    visited[url] = true
  })
  fmt.Printf("found: %s %q\n", url, body)
  if err != nil {
    fmt.Println(err)
    banner<-1
    return
  }
  subBanner := make(chan int, len(urls))
  for _, u := range urls {
     // 并行吧～～ 
      go Crawl(u, depth-1, fetcher, subBanner);
  }
  for i:=0; i < len(urls); i++ {
    // subBanner用来防止退出
    <-subBanner
  }
  // banner用于让父节点退出
  banner<-1
  return
}

func main() {
  mainBanner := make(chan int,1)
  Crawl("http://golang.org/", 4, fetcher, mainBanner)
  <-mainBanner
}


// fakeFetcher 是返回若干结果的 Fetcher。
type fakeFetcher map[string]*fakeResult

type fakeResult struct {
  body string
  urls     []string
}

func (f *fakeFetcher) Fetch(url string) (string, []string, error) {
  if res, ok := (*f)[url]; ok {
    return res.body, res.urls, nil
  }
  return "", nil, fmt.Errorf("not found: %s", url)
}

// fetcher 是填充后的 fakeFetcher。
var fetcher = &fakeFetcher{
  "http://golang.org/": &fakeResult{
    "The Go Programming Language",
    []string{
      "http://golang.org/pkg/",
      "http://golang.org/cmd/",
    },
  },
  "http://golang.org/pkg/": &fakeResult{
    "Packages",
    []string{
      "http://golang.org/",
      "http://golang.org/cmd/",
      "http://golang.org/pkg/fmt/",
      "http://golang.org/pkg/os/",
    },
  },
  "http://golang.org/pkg/fmt/": &fakeResult{
    "Package fmt",
    []string{
      "http://golang.org/",
      "http://golang.org/pkg/",
    },
  },
  "http://golang.org/pkg/os/": &fakeResult{
    "Package os",
    []string{
      "http://golang.org/",
      "http://golang.org/pkg/",
    },
  },
}