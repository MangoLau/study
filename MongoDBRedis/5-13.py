import redis
client = redis.Reids()
client.scard('example_set_python')
client.spop('example_set_python')
client.spop('example_set_python')
client.scard('example_set_python')

for _ in range(3):
    client.spop('example_set_python')

client.scard('example_set_python')