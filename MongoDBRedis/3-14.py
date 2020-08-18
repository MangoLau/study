from pymongo import MongoClient
#client = MongoClient('mongodb://192.168.0.110:27019')
client = MongoClient()
database = client.chapter_3
collection = database.example_data_2
# collection.insert_one({"name": "王小六", "age": 25, "work": "厨师"})
collection.update_many({"name": "公孙小八"}, {"$set": {"address": "美国", "age": 80}})
rows = collection.find()
for row in rows:
    print(row)