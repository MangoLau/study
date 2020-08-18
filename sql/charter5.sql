# 范围查询
# 01 查询两个值之间的数据
SELECT goods_id AS '商品ID',goods_name AS '商品名称',market_price AS '市场价'
    FROM goods
    WHERE market_price BETWEEN 1000 AND 3000;

# 02 查询两个日期之间的数据
SELECT isbn,bookname,intime AS '数据录入时间'
    FROM bookinfo_zerobasis
    WHERE intime
    BETWEEN '2017-12-1' AND '2018-12-1';

# 03 在BETWEEN中使用日期函数
SELECT isbn,bookname,intime '数据录入时间'
    FROM bookinfo_zerobasis
    WHERE intime BETWEEN DATE_SUB(CURDATE(),INTERVAL 1 DAY)  AND CURDATE();

# 04 查询不再两个数之间的数据
SELECT goods_id,goods_name,market_price
    FROM goods
    WHERE market_price NOT BETWEEN 2000 AND 3000;