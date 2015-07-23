/**
 * Created by Nandy on 7/11/15.
 */
var sales = {
    "53bf19feb23207736807aa15": {
        "_id": {"$id": "53bf19feb23207736807aa15"},
        "state": "final",
        "date": "2014-07-10T22:53:53.471Z",
        "tires": [],
        "cash": "10",
        "services": [
            {
                "name": "Mounting",
                "price": 8,
                "quantity": 1,
                "checked": true
            },
            {
                "name": "Balancing",
                "price": 10,
                "quantity": 1,
                "checked": false
            },
            {
                "name": "Repair",
                "price": 10,
                "quantity": 1,
                "checked": false
            },
            {
                "name": "Rotation",
                "price": 10,
                "quantity": 1,
                "checked": false
            }
        ],
        "discount": {
            "amount": 0,
            "checked": true
        },
        "tax": {
            "rate": 6,
            "amount": 0.48,
            "checked": true
        },
        "total": 8.48,
        "synced": false,
        "shop_id": 7
    },
    "53bf1a60b23207746807aa15": {
        "_id": {"$id": "53bf1a60b23207746807aa15"},
        "state": "cancel",
        "date": "2014-07-11T01:35:21.029Z",
        "tires": [
            {
                "tire": "175\/65-14",
                "quality": "new",
                "quantity": 1,
                "price": 40,
                "checked": true
            }
        ],
        "cash": 0,
        "services": [
            {
                "name": "Mounting",
                "price": 8,
                "quantity": 1,
                "checked": true
            },
            {
                "name": "Balancing",
                "price": 10,
                "quantity": 1,
                "checked": true
            }, {
                "name": "Repair",
                "price": 10,
                "quantity": 1,
                "checked": true
            },
            {
                "name": "Rotation",
                "price": 10,
                "quantity": 1,
                "checked": true
            }
        ],
        "discount": {
            "amount": 0,
            "checked": true
        },
        "tax": {
            "rate": 6,
            "amount": 4.68,
            "checked": true
        },
        "total": 82.68,
        "shop_id": 7
    }
};
var inventory = {
    "_id": ObjectId("539261abb23207697a6f86cb"),
    "tire": "255/25-13",
    "quality": "new",
    "quantity": NumberLong(10),
    "shop_id": 7
};
var history = {
    "_id": ObjectId("544bf94cb23207e967fe4fe9"),
    "quality": "used",
    "quantity": NumberLong(4),
    "date": "2014-10-25T19:21:02.826Z",
    "tire": "225/60-16",
    "shop_id": 7
};