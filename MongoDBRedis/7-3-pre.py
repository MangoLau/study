import pymongo

handler = pymongo.MongoClient().chapter_7.example_data_2 # 连接MongoDB
datas = [
    {
        "content": "这道菜真好吃",
        "create_time": "2018-06-01",
        "user": {
            "name": "青南",
            "user_id": 101,
            "following": 1,
            "followed": 9999,
        },
        "comments": 100
    },
    {
        "content": "儿童节快乐",
        "create_time": "2018-06-01",
        "user": {
            "name": "小盆友",
            "user_id": 102,
            "following": 99,
            "followed": 3,
        },
        "comments": 1
    },
    {
        "content": "我的礼物在哪里",
        "create_time": "2018-06-01",
        "user": {
            "name": "学习鸡",
            "user_id": 103,
            "following": 45,
            "followed": 20,
        },
        "comments": 20
    },
    {
        "content": "求勾搭",
        "create_time": "2018-06-01",
        "user": {
            "name": "单身的小X",
            "user_id": 104,
            "following": 8888,
            "followed": 0,
        },
        "comments": 0
    },
]

r = handler.insert_many([
    {
        "content": "这道菜真好吃",
        "create_time": "2018-06-01",
        "user": {
            "name": "青南",
            "user_id": 101,
            "following": 1,
            "followed": 9999,
        },
        "comments": 100
    },
    {
        "content": "儿童节快乐",
        "create_time": "2018-06-01",
        "user": {
            "name": "小盆友",
            "user_id": 102,
            "following": 99,
            "followed": 3,
        },
        "comments": 1
    },
    {
        "content": "我的礼物在哪里",
        "create_time": "2018-06-01",
        "user": {
            "name": "学习鸡",
            "user_id": 103,
            "following": 45,
            "followed": 20,
        },
        "comments": 20
    },
    {
        "content": "求勾搭",
        "create_time": "2018-06-01",
        "user": {
            "name": "单身的小X",
            "user_id": 104,
            "following": 8888,
            "followed": 0,
        },
        "comments": 0
    },
])
print(r)