import redis
client = redis.Reids()
client.sadd('example_set_python', 'hello')
cleint.sadd('example_set_python', 1, 2.0, 'three')
datas = [9, 8.0, 'sever', 'VI']
client.sadd('example_set_python', *datas)