from pymongo import MongoClient
#client = MongoClient('mongodb://192.168.0.110:27019')
client = MongoClient()
database = client.example_data_1
# database.getCollection('example_data_1').find({
#     'id': {'$lt': 10},
#     '$and':[{'age': {'$gt': 20}}, {'sex': '男'}]
# })

database.getCollection('example_data_1', {
    '$and': [
        {'$or', [{'age': {'$gt': 28}}, {'salary': {'$gt': 9900}}]},
        {'$or', [{'sex': '男'}, {'id': '$lt': 20}]}
    ]
})