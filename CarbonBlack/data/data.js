/**
 * Created by Nandy on 7/11/15.
 */
var x = [
    {
        "_id": ObjectId("53cf6ecfb23207855ea7d7fc"),
        "shop_id": 7,
        "state": "cancel",
        "date": "2014-07-23T08:36:37.165Z",
        "tires": [],
        "cash": NumberLong(0),
        "services": [
            {
                "name": "Mounting",
                "price": NumberLong(8),
                "quantity": NumberLong(1),
                "checked": true
            },
            {
                "name": "Balancing",
                "price": NumberLong(10),
                "quantity": NumberLong(1),
                "checked": false
            }, {
                "name": "Repair",
                "price": NumberLong(10),
                "quantity": NumberLong(1),
                "checked": true
            }, {
                "name": "Rotation",
                "price": NumberLong(10),
                "quantity": NumberLong(1),
                "checked": false
            }
        ],
        "discount": {
            "amount": NumberLong(0),
            "checked": false
        }
        ,
        "tax": {
            "rate": NumberLong(6),
            "amount": 1.08,
            "checked": true
        }
        ,
        "total": 19.08
    },
    {
        "_id": ObjectId("54658c51b23207487b08fce7"),
        "shop_id": 3,
        "state": "paid",
        "received": "$250.00",
        "type": "cash",
        "date": "2014-11-14T04:54:35.458Z",
        "tires": [
            {
                "quality": "new",
                "quantity": NumberLong(4),
                "tire": "175/65-14",
                "price": NumberLong(50)
            }
        ],
        "services": [
            {
                "quantity": NumberLong(1),
                "price": NumberLong(10),
                "name": "Mounting"
            },
            {
                "quantity": NumberLong(1),
                "price": NumberLong(10),
                "name": "Repair"
            },
            {
                "quantity": NumberLong(1),
                "price": NumberLong(10),
                "name": "Rotation"
            },
            {
                "quantity": NumberLong(1),
                "price": NumberLong(10),
                "name": "Balancing"
            }
        ]
    }
];