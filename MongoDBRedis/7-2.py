import pymongo

handler = pymongo.MongoClient().chapter_7.example_data_1 # 连接MongoDB

rows = handler.find(
    {
        '$and': [
            {'$or': [
                {'age': {'$gt': 28}},
                {'salary': {'$gt': 9900}}
            ]},
            {'$or': [
                {'sex': '男'},
                {'id': {'$lt': 20}}
            ]}
        ]
    }
)

for row in rows:
    print(row)