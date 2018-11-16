# 第6章 使用PHP5访问数据库   Databases with PHP 5
## 6.1 介绍
## 6.2 MySQL
### 6.2.1 MySQL的优势与不足 MySQL Strength and Weakness
优势：

    巨大的市场使用率。
    轻松入门。
    向大部分用户提供开源许可证。
    快速。
    合理的量级分布。
    
不足：

    商业化重新发布需要商业许可证。
    
### 6.2.2 PHP接口 PHP Interface
### 6.2.3 事例数据  Example Data
### 6.2.4 连接 Connections
### 6.2.5 缓冲与无缓冲的查询的对比  Buffered Versus Unbuffered Queries
### 6.2.6 查询 Queries
### 6.2.7 多重语句 Multi Statements
### 6.2.8 获取模式  Fetching Modes
### 6.2.9 预备语句  Prepared Statements
预备语句有两种：一种是执行数据处理的语句，而另一种是执行数据取回的语句。

**绑定变量**

变量的绑定也分为两种类型：绑定到查询语句的输入变量和绑定到结果集的输出变量。
对于输入变量，你需要设定一个问号作为SQL语句中的占位符，如这个例子：
```sql
SELECT id,country FROM city WHERE  city=?
INSERT INTO city (id, name) VALUES (?,?)
```
输出变量是直接绑定到结果集列当中的。绑定输入和输出变量的程序由一些不同。
输入变量的绑定必须在执行预备语句之前，而输出变量必须在执行预备语句后绑定。

输入变量的过程如下：
    
    1. 预备（解析）语句
    2. 绑定输入变量
    3. 赋值到绑定的变量
    4. 执行预备语句

输出变量的过程如下：

    1. 预备（解析）语句
    2. 执行预备语句
    3. 绑定输出变量
    4. 把数据提取到输出变量中

### 6.2.10 BLOB处理   BLOB Handling
**插入BLOB数据**

**获取BLOB数据**

## 6.3 SQLite
## 6.4 PEAR DB
## 6.5 总结
