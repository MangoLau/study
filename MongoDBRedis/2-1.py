import time
import random
from queue import Queue
from threading import Thread

class Producer(Thread):                 # 生产者
    def __init__(self, queue):
        super().__init__()              # 显示调用父类的初始化方法
        self.queue = queue

    def run(self):
        while True:
            a = random.randint(0, 10)   # 在0-10之间生成一个随机整数
            b = random.randint(90, 100)
            print(f'生产者生产了两个数字：{a}, {b}')
            self.queue.put((a, b))      # 把两个数字用元数组的方式放入队列中
            time.sleep(2)


class Comsumer(Thread):                 # 消费者
    def __init__(self, queue):
        super().__init__()
        self.queue = queue

    def run(self):
        while True:
            num_tuple = self.queue.get(block=True)  # block=True表示，如果队列为空则阻塞在这里，直到队列有数据为止
            sum_a_b = sum(num_tuple)
            print(f'消费者消费了一组数，{num_tuple[0]} + {num_tuple[1]} = {sum_a_b}')    
            time.sleep(random.randint(0,10))        # 随机暂停一段时间，这个时间是0-10之间的随机值

queue = Queue()
producer = Producer(queue)
comsumer = Comsumer(queue)

producer.start()                                        # 启动子线程
comsumer.start()
while True:
    time.sleep(1)