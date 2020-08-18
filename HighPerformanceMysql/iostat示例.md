
```
[MangoLau@iZ28bmksx9mZ ~]$ iostat -dx 5
Linux 3.10.0-862.6.3.el7.x86_64 (iZ28bmksx9mZ)  04/25/2020      _x86_64_        (1 CPU)

Device:         rrqm/s   wrqm/s     r/s     w/s    rkB/s    wkB/s avgrq-sz avgqu-sz   await r_await w_await  svctm  %util
vda               0.02     0.24    0.91    0.24    24.70     2.83    47.88     0.01    8.50    7.48   12.36   0.88   0.10
```
于vmstat一样，第一行报告显示的是子系统启动以来的平均值（通常删掉它节省空间），然后接下来的报告显示了增量的平均值，每个设备一行。

- rrqm/s 和 wrqm/s
	每秒合并的读和写请求。“合并的”意味着操作系统从队列中拿出多个逻辑请求合并为一个请求到实际磁盘。

- r/s 和 w/s
	每秒发到设备的读和写请求。

- rkB/s 和 wkB/s
	每秒读写的千字节数。有些系统也输出resc/s 和 wsec/s，意为每秒读和写的扇区数。

- avgrq-sz
	请求的扇区数。

- avgqu-sz
	在设备队列中等待的请求数。

- await
	磁盘排队上话费的毫秒数。

- r_await
- w_await