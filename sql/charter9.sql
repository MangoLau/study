# 01 %通配符的使用
SELECT goods_id,goods_name,shop_price
    FROM goods
    WHERE goods_name LIKE '%华为%';

# 02 "_"通配符的使用
SELECT address_id,LTRIM(consignee) AS consignee,address
    FROM user_address
    WHERE LTRIM(consignee) LIKE '___';

# 03 "[]"通配符的使用,MySQL不支持
SELECT id,name,cat_name
    FROM brand
    WHERE name LIKE '[A-Z]%' LIMIT 6;# MySQL不支持

# 04
SELECT order_id,order_sn,total_amount
    FROM orderform
    WHERE order_sn LIKE '%[6-9]';

# 05 [^]通配符的使用 MySQL不支持
SELECT id,name,cat_name
    FROM brand
    WHERE name LIKE '[^A-Z]%';

# 06 使用ESCAPE定义转义字符
SELECT user_id,email,birthday
    FROM users
    WHERE email LIKE '%/_%' ESCAPE '/';