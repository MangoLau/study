import redis
import json
import pymongo

client = redis.Redis()
handler = pymongo.MongoClient().chapter_8.people_info

people_info_list = []
while True:
    people_info_json = client.lpop('people_info')
    if people_info_json:
        people_info = json.loads(people_info_json.decode())
        people_info_list.append(people_info)
        if len(people_info_list) >= 1000: # 如果列表中的数据超过1000条就先插入数据库
            handler.insert_many(people_info_list)
            people_info_list = []
        else:
            break

if people_info_list: # 最后一轮可能凑不够1000条数据，所以还需要看看是否需要再次插入
    handler.insert_many(people_info_list)