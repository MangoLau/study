import random
from pymongo import MongoClient

db = MongoClient().chapter_7
rows = db.example_post.aggregate([
    {"$lookup": {
        "from": "example_user",
        "localField": "user_id",
        "foreignField": "id",
        "as": "user_info"
    }},
    {"$unwind": "$user_info"},
    {"$project": {
        "content": 1,
        "post_time": 1,
        "name": "$user_info.name",
        "work": "$user_info.work"}}
])

for row in rows:
    print(row)