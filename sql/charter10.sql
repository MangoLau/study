# 03 随机查询一行数据
SELECT goods_id,cat_id,goods_name
    FROM goods
    ORDER BY RAND() LIMIT 1;

SELECT (SELECT COUNT(order_id) FROM orderform A
    WHERE A.order_id>=B.order_id) '编号',order_id,order_sn,total_amount
    FROM orderform B ORDER BY 1;

# 08 查询空值(IS NULL)
SELECT user_id,email,nickname
    FROM users
    WHERE nickname IS NULL;

# 09 查询非空值(IS NOT NULL)
SELECT user_id,email,nickname
    FROM users
    WHERE nickname IS NOT NULL;

# 11 判断null值
SELECT user_id,email,ISNULL(nickname) AS nickname
    FROM users;