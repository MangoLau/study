import redis
client = redis.Redis()
# client.lpush('example_list_python', 'python')
# client.rpush('example_list_python', 'life is short')

# 5-5
# r = client.lpush('example_list_python', 'first', '2', 3.0, '第四条')
# print(r)
# r = client.rpush('example_list_python', 9, 8.0, 'seven', '六')
# print(r)

# 5-6
# datas = ['one', 'two', 'three', 'four']
# r = client.lpush('example_list_python_2', *datas)
# print(r)
# datas = ['ten', 'nine', 'eight']
# r = client.rpush('example_list_python_2', *datas)
# print(r)

# 5-8
for data in client.lrange('example_list_python', 0, -1):
    print(data.decode())