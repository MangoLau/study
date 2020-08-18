import pymongo

handler = pymongo.MongoClient().chapter_7.example_data_3

# 查询所有size包含M的记录
rows_1 = handler.find({"size.0": "M"})

# 查询price至少有一个元素在200-300范围中的记录
rows_2 = handler.find({"price": {"$lt": 300, "$gt": 200}})

# 查询price有两个元素的记录
rows_3 = handler.find({"price": {"$size": 2}})

# 查询price索引为0的元素大于500的所有记录
rows_4 = handler.find({"price.0": {"$gt": 500}})