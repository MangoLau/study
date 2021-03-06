import random
from pymongo import MongoClient

db = MongoClient().chapter_7
rows = db.example_user.aggregate([
    {"$lookup": {
        "from": "example_post",
        "localField": "id",
        "foreignField": "user_id",
        "as": "weibo_info"
    }},
    {"$unwind": "$weibo_info"},
    {"$project": {
        "name": 1,
        "work": 1,
        "content": "$weibo_info.content",
        "post_time": "$weibo_info.post_time"}}
])

for row in rows:
    print(row)