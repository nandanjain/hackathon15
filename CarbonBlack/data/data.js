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

var sales = {
    "53bf044fb232078d4b07aa23": {
        "_id": {"$id": "53bf044fb232078d4b07aa23"},
        "state": "paid",
        "date": "2014-07-10T21:21:24.239Z",
        "tires": [],
        "cash": "10",
        "services": [{"name": "Mounting", "price": 8, "quantity": 1, "checked": true}, {
            "name": "Balancing",
            "price": 10,
            "quantity": 1,
            "checked": false
        }, {"name": "Repair", "price": 10, "quantity": 1, "checked": false}, {
            "name": "Rotation",
            "price": 10,
            "quantity": 1,
            "checked": false
        }],
        "discount": {"amount": 0, "checked": true},
        "tax": {"rate": 6, "amount": 0.48, "checked": true},
        "total": 8.48,
        "synced": false,
        "shop_id": 7
    },
    "53bf19feb23207736807aa15": {
        "_id": {"$id": "53bf19feb23207736807aa15"},
        "state": "final",
        "date": "2014-07-10T22:53:53.471Z",
        "tires": [],
        "cash": "10",
        "services": [{"name": "Mounting", "price": 8, "quantity": 1, "checked": true}, {
            "name": "Balancing",
            "price": 10,
            "quantity": 1,
            "checked": false
        }, {"name": "Repair", "price": 10, "quantity": 1, "checked": false}, {
            "name": "Rotation",
            "price": 10,
            "quantity": 1,
            "checked": false
        }],
        "discount": {"amount": 0, "checked": true},
        "tax": {"rate": 6, "amount": 0.48, "checked": true},
        "total": 8.48,
        "synced": false,
        "shop_id": 7
    },
    "53bf1a60b23207746807aa15": {
        "_id": {"$id": "53bf1a60b23207746807aa15"},
        "state": "cancel",
        "date": "2014-07-11T01:35:21.029Z",
        "tires": [{"tire": "175\/65-14", "quality": "new", "quantity": 1, "price": 40, "checked": true}],
        "cash": 0,
        "services": [{"name": "Mounting", "price": 8, "quantity": 1, "checked": true}, {
            "name": "Balancing",
            "price": 10,
            "quantity": 1,
            "checked": true
        }, {"name": "Repair", "price": 10, "quantity": 1, "checked": true}, {
            "name": "Rotation",
            "price": 10,
            "quantity": 1,
            "checked": true
        }],
        "discount": {"amount": 0, "checked": true},
        "tax": {"rate": 6, "amount": 4.68, "checked": true},
        "total": 82.68,
        "shop_id": 7
    },
    "53bf2f76b23207904b07aa1c": {
        "_id": {"$id": "53bf2f76b23207904b07aa1c"},
        "state": "cancel",
        "date": "2014-07-11T01:35:10.727Z",
        "tires": [{"tire": "175\/65-14", "quality": "new", "quantity": 1, "price": 40, "checked": true}],
        "cash": 0,
        "services": [{"name": "Mounting", "price": 8, "quantity": 1, "checked": true}, {
            "name": "Balancing",
            "price": 10,
            "quantity": 1,
            "checked": false
        }, {"name": "Repair", "price": 10, "quantity": 1, "checked": false}, {
            "name": "Rotation",
            "price": 10,
            "quantity": 1,
            "checked": false
        }],
        "discount": {"amount": 0, "checked": true},
        "tax": {"rate": 6, "amount": 2.88, "checked": false},
        "total": 48,
        "shop_id": 7
    },
    "53bf3fb0b23207746807aa16": {
        "_id": {"$id": "53bf3fb0b23207746807aa16"},
        "state": "paid",
        "date": "2014-07-11T01:34:45.826Z",
        "tires": [{"tire": "175\/65-14", "quality": "new", "quantity": 1, "price": 40, "checked": true}],
        "cash": "80",
        "services": [{"name": "Mounting", "price": 8, "quantity": 1, "checked": true}, {
            "name": "Balancing",
            "price": 10,
            "quantity": 1,
            "checked": false
        }, {"name": "Repair", "price": 10, "quantity": 1, "checked": true}, {
            "name": "Rotation",
            "price": 10,
            "quantity": 1,
            "checked": true
        }],
        "discount": {"amount": 0, "checked": true},
        "tax": {"rate": 6, "amount": 4.08, "checked": true},
        "total": 72.08,
        "synced": false,
        "shop_id": 7
    },
    "53bf400fb232078e4b07aa26": {
        "_id": {"$id": "53bf400fb232078e4b07aa26"},
        "state": "cancel",
        "date": "2014-07-11T01:38:01.650Z",
        "tires": [{"tire": "175\/65-14", "quality": "new", "quantity": 1, "price": 40, "checked": true}],
        "cash": 0,
        "services": [{"name": "Mounting", "price": 8, "quantity": 1, "checked": true}, {
            "name": "Balancing",
            "price": 10,
            "quantity": 1,
            "checked": false
        }, {"name": "Repair", "price": 10, "quantity": 1, "checked": false}, {
            "name": "Rotation",
            "price": 10,
            "quantity": 1,
            "checked": false
        }],
        "discount": {"amount": 0, "checked": true},
        "tax": {"rate": 6, "amount": 2.88, "checked": true},
        "total": 50.88,
        "synced": true,
        "shop_id": 7
    },
    "53bf4198b23207746807aa17": {
        "_id": {"$id": "53bf4198b23207746807aa17"},
        "state": "paid",
        "date": "2014-07-11T01:43:32.684Z",
        "tires": [],
        "cash": "10.50",
        "services": [{"name": "Mounting", "price": 8, "quantity": 1, "checked": true}, {
            "name": "Balancing",
            "price": 10,
            "quantity": 1,
            "checked": false
        }, {"name": "Repair", "price": 10, "quantity": 1, "checked": false}, {
            "name": "Rotation",
            "price": 10,
            "quantity": 1,
            "checked": false
        }],
        "discount": {"amount": 0, "checked": true},
        "tax": {"rate": 6, "amount": 0.48, "checked": true},
        "total": 8.48,
        "synced": false,
        "shop_id": 7
    },
    "53bf486ab232078c4b07aa1d": {
        "_id": {"$id": "53bf486ab232078c4b07aa1d"},
        "state": "paid",
        "date": "2014-07-11T02:12:02.122Z",
        "tires": [],
        "cash": "50",
        "services": [{"name": "Mounting", "price": 8, "quantity": 2, "checked": true}, {
            "name": "Balancing",
            "price": 10,
            "quantity": 1,
            "checked": true
        }, {"name": "Repair", "price": 10, "quantity": 1, "checked": true}, {
            "name": "Rotation",
            "price": 10,
            "quantity": 1,
            "checked": true
        }],
        "discount": {"amount": 0, "checked": true},
        "tax": {"rate": 6, "amount": 2.76, "checked": true},
        "total": 48.76,
        "synced": false,
        "shop_id": 7
    },
    "53bf5a27b23207845607aa1f": {
        "_id": {"$id": "53bf5a27b23207845607aa1f"},
        "state": "paid",
        "date": "2014-07-11T03:27:43.256Z",
        "tires": [],
        "cash": "38",
        "services": [{"name": "Mounting", "price": 8, "quantity": 1, "checked": true}, {
            "name": "Balancing",
            "price": 10,
            "quantity": 1,
            "checked": true
        }, {"name": "Repair", "price": 10, "quantity": 1, "checked": true}, {
            "name": "Rotation",
            "price": 10,
            "quantity": 1,
            "checked": true
        }],
        "discount": {"amount": 0, "checked": false},
        "tax": {"rate": 6, "amount": 2.28, "checked": false},
        "total": 38,
        "synced": false,
        "shop_id": 7
    },
    "53bf5a65b23207746807aa18": {
        "_id": {"$id": "53bf5a65b23207746807aa18"},
        "state": "paid",
        "date": "2014-07-11T03:28:44.706Z",
        "tires": [],
        "cash": "15",
        "services": [{"name": "Mounting", "price": 8, "quantity": 1, "checked": false}, {
            "name": "Balancing",
            "price": 10,
            "quantity": 1,
            "checked": true
        }, {"name": "Repair", "price": 10, "quantity": 1, "checked": false}, {
            "name": "Rotation",
            "price": 10,
            "quantity": 1,
            "checked": true
        }],
        "discount": {"amount": 5, "checked": true},
        "tax": {"rate": 6, "amount": 0.9, "checked": false},
        "total": 15,
        "synced": false,
        "shop_id": 7
    },
    "53bfe709b232078f4b07aa26": {
        "_id": {"$id": "53bfe709b232078f4b07aa26"},
        "state": "paid",
        "date": "2014-07-11T13:28:42.922Z",
        "tires": [{"tire": "175\/65-14", "quality": "used", "quantity": 1, "price": 100, "checked": true}],
        "cash": "114.60",
        "services": [{"name": "Mounting", "price": 8, "quantity": 1, "checked": true}, {
            "name": "Balancing",
            "price": 10,
            "quantity": 1,
            "checked": false
        }, {"name": "Repair", "price": 10, "quantity": 1, "checked": false}, {
            "name": "Rotation",
            "price": 10,
            "quantity": 1,
            "checked": false
        }],
        "discount": {"amount": 0, "checked": true},
        "tax": {"rate": 6, "amount": 6.48, "checked": true},
        "total": 114.48,
        "synced": false,
        "shop_id": 7
    },
    "53bfe7d7b23207904b07aa1e": {
        "_id": {
            "$id": "53bfe7d7b23207904b07aa1e"
        },
        "state": "paid",
        "date": "2014-07-11T13:32:14.758Z",
        "tires": [],
        "cash": "10",
        "services": [
            {
                "name": "Mounting", "price": 8, "quantity": 1, "checked": true
            },
            {
                "name": "Balancing",
                "price": 10,
                "quantity": 1,
                "checked": false
            },
            {
                "name": "Repair", "price": 10, "quantity": 1, "checked": false
            }, {
                "name": "Rotation",
                "price": 10,
                "quantity": 1,
                "checked": false
            }],
        "discount": {"amount": 0, "checked": true},
        "tax": {"rate": 6, "amount": 0.48, "checked": true},
        "total": 8.48,
        "synced": false,
        "shop_id": 7
    },
    "53bfe80db23207766807aa14": {
        "_id": {"$id": "53bfe80db23207766807aa14"},
        "state": "paid",
        "date": "2014-07-11T13:33:03.539Z",
        "tires": [{"tire": "175\/65-14", "quality": "used", "quantity": 1, "price": 100, "checked": true}],
        "cash": "150.90",
        "services": [{"name": "Mounting", "price": 8, "quantity": 1, "checked": true}, {
            "name": "Balancing",
            "price": 10,
            "quantity": 1,
            "checked": false
        }, {"name": "Repair", "price": 10, "quantity": 1, "checked": false}, {
            "name": "Rotation",
            "price": 10,
            "quantity": 1,
            "checked": false
        }],
        "discount": {"amount": 0, "checked": true},
        "tax": {"rate": 6, "amount": 6.48, "checked": true},
        "total": 114.48,
        "synced": false,
        "shop_id": 7
    },
    "53bfe853b232078d4b07aa24": {
        "_id": {"$id": "53bfe853b232078d4b07aa24"},
        "state": "paid",
        "date": "2014-07-11T15:29:31.715Z",
        "tires": [{"tire": "175\/65-14", "quality": "used", "quantity": 2, "price": 100, "checked": true}],
        "cash": "220.50",
        "services": [{"name": "Mounting", "price": 8, "quantity": 1, "checked": true}, {
            "name": "Balancing",
            "price": 10,
            "quantity": 1,
            "checked": false
        }, {"name": "Repair", "price": 10, "quantity": 1, "checked": false}, {
            "name": "Rotation",
            "price": 10,
            "quantity": 1,
            "checked": false
        }],
        "discount": {"amount": 0, "checked": true},
        "tax": {"rate": 6, "amount": 12.48, "checked": true},
        "total": 220.48,
        "shop_id": 7,
        "synced": false
    },
    "53bfe957b232078c4b07aa1e": {
        "_id": {"$id": "53bfe957b232078c4b07aa1e"},
        "state": "paid",
        "date": "2014-07-11T13:38:33.321Z",
        "tires": [],
        "cash": "30.00",
        "services": [{"name": "Mounting", "price": 8, "quantity": 3, "checked": true}, {
            "name": "Balancing",
            "price": 10,
            "quantity": 1,
            "checked": false
        }, {"name": "Repair", "price": 10, "quantity": 1, "checked": false}, {
            "name": "Rotation",
            "price": 10,
            "quantity": 1,
            "checked": false
        }],
        "discount": {"amount": 0, "checked": true},
        "tax": {"rate": 6, "amount": 1.44, "checked": true},
        "total": 25.44,
        "synced": false,
        "shop_id": 7
    },
    "53c002cab23207736807aa16": {
        "_id": {"$id": "53c002cab23207736807aa16"},
        "state": "paid",
        "date": "2014-07-11T15:27:14.781Z",
        "tires": [],
        "cash": "30",
        "services": [{"name": "Mounting", "price": 8, "quantity": 1, "checked": true}, {
            "name": "Balancing",
            "price": 10,
            "quantity": 1,
            "checked": true
        }, {"name": "Repair", "price": 10, "quantity": 1, "checked": false}, {
            "name": "Rotation",
            "price": 10,
            "quantity": 1,
            "checked": true
        }],
        "discount": {"amount": 0, "checked": true},
        "tax": {"rate": 6, "amount": 1.68, "checked": true},
        "total": 29.68,
        "synced": false,
        "shop_id": 7
    },
    "53c002ebb23207845607aa20": {
        "_id": {"$id": "53c002ebb23207845607aa20"},
        "state": "paid",
        "date": "2014-07-11T15:27:48.030Z",
        "tires": [],
        "cash": "20",
        "services": [{"name": "Mounting", "price": 8, "quantity": 1, "checked": true}, {
            "name": "Balancing",
            "price": 10,
            "quantity": 1,
            "checked": false
        }, {"name": "Repair", "price": 10, "quantity": 1, "checked": false}, {
            "name": "Rotation",
            "price": 10,
            "quantity": 1,
            "checked": false
        }],
        "discount": {"amount": 0, "checked": true},
        "tax": {"rate": 6, "amount": 0.48, "checked": true},
        "total": 8.48,
        "synced": false,
        "shop_id": 7
    },
    "53c003d6b23207766807aa15": {
        "_id": {"$id": "53c003d6b23207766807aa15"},
        "state": "paid",
        "date": "2014-07-11T15:31:42.863Z",
        "tires": [{"tire": "175\/65-14", "quality": "used", "quantity": 1, "price": 10, "checked": true}],
        "cash": "20",
        "services": [{"name": "Mounting", "price": 8, "quantity": 1, "checked": true}, {
            "name": "Balancing",
            "price": 10,
            "quantity": 1,
            "checked": false
        }, {"name": "Repair", "price": 10, "quantity": 1, "checked": false}, {
            "name": "Rotation",
            "price": 10,
            "quantity": 1,
            "checked": false
        }],
        "discount": {"amount": 0, "checked": true},
        "tax": {"rate": 6, "amount": 1.08, "checked": true},
        "total": 19.08,
        "synced": false,
        "shop_id": 7
    }
}