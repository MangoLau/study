from pymongo import MongoClient
#client = MongoClient('mongodb://192.168.0.110:27019')
client = MongoClient()
database = client.chapter_3
collection = database.example_data_2
collection.insert_many([
    {"name": "朱小三", "age": 20, "address": "北京"},
    {"name": "刘小四", "age": 21, "address": "上海"},
    {"name": "马小五", "age": 22, "address": "山东"},
    {"name": "夏侯小七", "age": 23, "address": "河北"},
    {"name": "公孙小八", "age": 24, "address": "广州"},
    {"name": "慕容小九", "age": 25, "address": "杭州"},
    {"name": "欧阳小十", "age": 26, "address": "深圳"}
])