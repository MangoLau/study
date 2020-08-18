from pymongo import MongoClient
#client = MongoClient('mongodb://192.168.0.110:27019')
client = MongoClient()
database = client.chapter_3
collection = database.example_data_2
rows = collection.find({"age": {"$gt": 21, "$lt": 25}, "name": {"$ne": "夏侯小七"}})
# rows = collection.find()
for row in rows:
    print(row)