# 格式化结果集
SELECT user_id,email,DATE_FORMAT(reg_time, '%Y/%m/%d') AS reg_time
    FROM shop.users LIMIT 6;