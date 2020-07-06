from pymongo import MongoClient
#client = MongoClient('mongodb://192.168.0.110:27019')
client = MongoClient()
database = client.chapter_3
collection = database.example_data_2
collection.update_one({"name": "隐身人"}, {"$set": {"name": "隐身人", "age": 0, "address": "里世界"}}, upsert = True)
# collection.delete_many({"age": 0})
rows = collection.find()
for row in rows:
    print(row)