package main

import (
    "fmt"
    "sync"
)

type SafeRequest struct {
    urls   map[string]bool
    mux sync.Mutex // 访问互斥锁
    wg  sync.WaitGroup // 等待组
}

type Fetcher interface {
    // Fetch 返回 URL 的 body 内容，并且将在这个页面上找到的 URL 放到一个 slice 中。
    Fetch(url string) (body string, urls []string, err error)
}

func (s *SafeRequest) exists(url string) bool {
    s.mux.Lock()
    defer s.mux.Unlock()
    if s.urls[url] {
        return true
    } else {
        s.urls[url] = true
        s.wg.Add(1)
        return false
    }
}

var s = SafeRequest{urls: make(map[string]bool)}

// Crawl 使用 fetcher 从某个 URL 开始递归的爬取页面，直到达到最大深度。
func Crawl(url string, depth int, fetcher Fetcher) {
    defer s.wg.Done() // 一个 Crawl 调用对应一个 WaitGroup
    if depth <= 0 {
        return
    }
    body, urls, err := fetcher.Fetch(url)
    if err != nil {
        fmt.Println(err)
        return
    }
    fmt.Printf("found: %s %q\n", url, body)
    for _, u := range urls {
        if !s.exists(u) {
            go Crawl(u, depth-1, fetcher)
        }
    }
    return
}

func main() {
    url := "https://golang.org/"
    s.exists(url)
    go Crawl(url, 4, fetcher)
    s.wg.Wait()
}

// fakeFetcher 是返回若干结果的 Fetcher。
type fakeFetcher map[string]*fakeResult

type fakeResult struct {
    body string
    urls []string
}

func (f fakeFetcher) Fetch(url string) (string, []string, error) {
    if res, ok := f[url]; ok {
        return res.body, res.urls, nil
    }
    return "", nil, fmt.Errorf("not found: %s", url)
}

// fetcher 是填充后的 fakeFetcher。
var fetcher = fakeFetcher{
    "https://golang.org/": &fakeResult{
        "The Go Programming Language",
        []string{
            "https://golang.org/pkg/",
            "https://golang.org/cmd/",
        },
    },
    "https://golang.org/pkg/": &fakeResult{
        "Packages",
        []string{
            "https://golang.org/",
            "https://golang.org/cmd/",
            "https://golang.org/pkg/fmt/",
            "https://golang.org/pkg/os/",
        },
    },
    "https://golang.org/pkg/fmt/": &fakeResult{
        "Package fmt",
        []string{
            "https://golang.org/",
            "https://golang.org/pkg/",
        },
    },
    "https://golang.org/pkg/os/": &fakeResult{
        "Package os",
        []string{
            "https://golang.org/",
            "https://golang.org/pkg/",
        },
    },
}
