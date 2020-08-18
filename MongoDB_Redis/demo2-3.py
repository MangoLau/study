import time
import json
import redis
import random
from threading import Thread

class Comsumer(Thread):
	def __init__(self):
		super().__init__()
		self.queue = redis.Redis()

	def run(self):
		while True:
			num_tuple = self.queue.blpop('producer')
			a, b = json.loads(num_tuple[1].decode())
			print(f'消费者消费一组数：{a} + {b} = {a + b}')
			time.sleep(random.randint(0, 10))

comsumer = Comsumer()
comsumer.start()
while True:
	time.sleep(1)