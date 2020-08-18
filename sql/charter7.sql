# 01
SELECT cat_id,goods_name,shop_price
    FROM goods
    WHERE cat_id IN (191,123,131);

SELECT cat_id,goods_name,shop_price
    FROM goods
    WHERE cat_id=191 OR cat_id=123 OR cat_id=131;

# 02 在IN操作符后的值列表中不但可以使用数值类型数据，还可以使用字符类型数据
SELECT name,cat_name FROM brand
    WHERE name IN ('OPPO', '维维', '湾仔码头', '华硕/ASUS');

# 在IN中使用算术表达式
# 03 
SELECT goods_name,shop_price FROM goods
    WHERE shop_price IN (3799-100, 3799, 3799+100);

# 在IN中使用列进行查询
# 04
SELECT goods_name,market_price,shop_price FROM goods
    WHERE 3799 IN (market_price,shop_price);

# 使用NOT IN查询数据
# 05
SELECT bookname,writer,pdate
    FROM bookinfo_zerobasis
    WHERE pdate NOT IN('2017年8月', '2017年9月');

# 06 使用NOT IN查询后两行数据。前提条件是需要知道表中共有多少行数据。
# MYSQL不支持
SELECT order_id,order_sn,total_amount
    FROM orderform
    WHERE order_id NOT IN (SELECT TOP 8 order_id FROM orderform);