# 数据排序
# 01
SELECT goods_id,goods_name,sales_sum
    FROM goods
    ORDER BY sales_sum DESC;

# 02 按列别名排序
SELECT goods_id '商品编号',goods_name '商品名称',sales_sum '商品销量'
    FROM goods
    ORDER BY '商品销量' DESC; # MySQL不生效

# 04 对多列排序
SELECT goods_id,goods_name,shop_price
    FROM goods
    ORDER BY shop_price,goods_name;