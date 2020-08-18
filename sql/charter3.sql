SELECT `name` , `cat_name` AS '品牌信息' FROM brand;

SELECT * FROM brand LIMIT 10;

# 02 减法运算符
SELECT goods_id AS '商品ID',goods_name AS '商品名称',(shop_price - cost_price) AS '销售利润' FROM goods;

# 03 乘法运算符
SELECT goods_id as '商品ID',goods_name AS '商品名称',(shop_price * sales_sum) AS '销售额' FROM goods;

# 04 算术运算符的综合应用
SELECT goods_id as '商品ID',goods_name AS '商品名称',
    (sales_sum * shop_price - sales_sum * cost_price)/sales_sum AS '销售利润'
    FROM goods
    WHERE sales_sum <> 0;

# 05 数值表达式。在goods商品信息表中，使用表达式将进价增加50元。
SELECT goods_id as '商品ID',goods_name AS '商品名称',
    cost_price + 50 AS '进价加50'
    FROM goods;

# 06 字符表达式
SELECT goods_id AS '商品ID',goods_name AS '商品名称',
    CONCAT(sales_sum, '个') AS '销售数量',
    CONCAT(shop_price,'元') AS '商场价格' FROM goods;

# 07 使用表达式创建新列
SELECT goods_id AS '商品ID',goods_name AS '商品名称',1+1, CONCAT('字符','串列') FROM goods;