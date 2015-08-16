/**
 * Created by Nandy on 7/11/15.
 */
var sales = [
    {
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
    {
        "_id": {"$id": "53bf1a60b23207746807aa15"},
        "state": "cancel",
        "date": "2015-07-11T01:35:21.029Z",
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
];
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
var test = {
    "_id": ObjectId("53cf6ecfb23207855ea7d7fc"),
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
        },
        {
            "name": "Repair",
            "price": NumberLong(10),
            "quantity": NumberLong(1),
            "checked": true
        },
        {
            "name": "Rotation",
            "price": NumberLong(10),
            "quantity": NumberLong(1),
            "checked": false
        }
    ],
    "discount": {
        "amount": NumberLong(0),
        "checked": false
    },
    "tax": {
        "rate": NumberLong(6),
        "amount": 1.08,
        "checked": true
    },
    "total": 19.08,
    "shop_id": 7
};

var d = {
    "55930609b23207db1714d410": {
        "_id": {"$id": "55930609b23207db1714d410"},
        "state": "paid",
        "services": [{"quantity": 1, "price": 10, "name": "Repair"}],
        "received": "$10.00",
        "type": "other",
        "date": "2015-06-30T21:00:04.365Z",
        "tires": [],
        "shop_id": 7
    },
    "559305b1b23207491714d40e": {
        "_id": {"$id": "559305b1b23207491714d40e"},
        "state": "paid",
        "services": [{"quantity": 1, "price": 10, "name": "Mounting"}, {
            "quantity": 1,
            "price": 10,
            "name": "Repair"
        }, {"quantity": 1, "price": 10, "name": "Rotation"}],
        "received": "$250.00",
        "type": "cash",
        "date": "2015-06-30T20:58:36.418Z",
        "tires": [{"quality": "used", "quantity": 4, "tire": "165\\/65-14", "price": 50}],
        "shop_id": 7
    },
    "55905dbdb23207481714d40e": {
        "_id": {"$id": "55905dbdb23207481714d40e"},
        "state": "paid",
        "date": "2015-06-28T20:37:31.640Z",
        "tires": [{
            "tire": "175\\/65-14",
            "quality": "used",
            "quantity": 1,
            "price": 100,
            "checked": true
        }, {"tire": "175\\/65-14", "quality": "new", "quantity": 2, "price": 100, "checked": true}],
        "cash": "400",
        "services": [{"name": "Mounting", "price": 8, "quantity": 1, "checked": true}, {
            "name": "Balancing",
            "price": 10,
            "quantity": 1,
            "checked": false
        }, {"name": "Repair", "price": 10, "quantity": 1, "checked": true}, {
            "name": "Rotation",
            "price": 10,
            "quantity": 1,
            "checked": false
        }],
        "discount": {"amount": 0, "checked": true},
        "tax": {"rate": 6, "amount": 19.08, "checked": true},
        "total": 337.08,
        "synced": false,
        "shop_id": 7
    }
};