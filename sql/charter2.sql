SELECT goods_name AS '商品名称', market_price AS '市场价', shop_price AS '本店价', click_count
	FROM goods;
	
	
SELECT user_address.mobile AS '订单表中的电话号码',
	users.mobile AS '用户信息表中的电话号码',
	user_address.address
	FROM user_address,users
	WHERE user_address.user_id = users.user_id;
	
SELECT * FROM users;

SHOW CREATE TABLE goods;

DESC TABLE goods;

SELECT goods_name,market_price AS '市场价',cost_price AS '成本价',
	(market_price - cost_price) AS '商品盈利'
	FROM goods;
	
# 07
SELECT MAX(market_price) AS '市场最高价',MIN(market_price) AS '市场最低价' FROM goods;

# 08
# 在 SELECT列表中只能使用一次 DISTINCT 关键字，而且 DISTINCT 关键字必须放在第一位，不要在其后添加逗号。
SELECT consignee,address,mobile FROM orderform;
SELECT DISTINCT consignee,address,mobile FROM orderform;

# 10 限制查询前n条数据
SELECT goods_name,market_price FROM goods LIMIT 5;

# 11
SELECT goods_name,market_price FROM goods LIMIT 2,5;

# 12 查看从第4条开始的2条数据的信息。
SELECT goods_name,market_price FROM shop.goods LIMIT 2 OFFSET 3;