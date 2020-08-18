# 使用AND运算符
# 01
SELECT goods_id,goods_name,shop_price
    FROM goods
    WHERE shop_price > 3000 AND shop_price < 6000;

# 02 多个AND
SELECT goods_name,click_count,store_count,shop_price
    FROM goods
    WHERE click_count > 20 AND store_count = 1000 AND shop_price > 2000;

# 03 使用or运算符
SELECT isbn,bookname,writer,price
    FROM bookinfo_zerobasis
    WHERE bookname='零基础学Java' OR bookname='零基础学PHP';

# 04
SELECT bookname,price,pdate
    FROM bookinfo
    WHERE bookname LIKE '%PHP%' OR bookname LIKE '%Oracle%' OR bookname LIKE '%Android%';

# 05 使用NOT运算符
SELECT goods_id,goods_name,store_count
    FROM goods
    WHERE NOT store_count=1000;

# 等效
SELECT goods_id,goods_name,store_count
    FROM goods
    WHERE store_count!=1000;

# 06 运算符优先级：NOT -> AND -> OR
SELECT cat_id,goods_name,shop_price
    FROM goods
    WHERE cat_id = 191 OR cat_id = 123 AND shop_price > 2000;

SELECT cat_id,goods_name,shop_price
    FROM goods
    WHERE (cat_id = 191 OR cat_id = 123) AND shop_price > 2000;

# 07
SELECT bookname,publisher,writer
    FROM bookinfo
    WHERE (bookname LIKE '%PHP%' OR bookname LIKE '%JSP%') AND (NOT publisher='机械工业出版社');

# 08
SELECT cat_id,goods_name,shop_price
    FROM goods
    WHERE (NOT cat_id = 191) AND (NOT cat_id = 123);