

Get all tasks
localhost:8000/getall

[
    {
        "id": 2,
        "title": "Task 0",
        "types": "common_ops",
        "prerequisites": null,
        "amount": null,
        "country": null,
        "completed": null,
        "created_at": "2021-11-10T19:17:18.000000Z",
        "updated_at": "2021-11-10T19:17:18.000000Z"
    },
    {
        "id": 3,
        "title": "Task 1",
        "types": "common_ops",
        "prerequisites": [
            "Task 0"
        ],
        "amount": null,
        "country": null,
        "completed": null,
        "created_at": "2021-11-10T19:17:44.000000Z",
        "updated_at": "2021-11-10T19:19:25.000000Z"
    },
    {
        "id": 4,
        "title": "Task 2",
        "types": "invoice_ops",
        "prerequisites": [
            "Task 0"
        ],
        "amount": {
            "currency": "€",
            "quantity": "1000"
        },
        "country": null,
        "completed": null,
        "created_at": "2021-11-10T19:18:08.000000Z",
        "updated_at": "2021-11-10T19:19:49.000000Z"
    },
    {
        "id": 5,
        "title": "Task 3",
        "types": "custom_ops",
        "prerequisites": [
            "Task 1",
            "Task 2"
        ],
        "amount": null,
        "country": "TR",
        "completed": null,
        "created_at": "2021-11-10T19:18:43.000000Z",
        "updated_at": "2021-11-10T19:20:02.000000Z"
    }
]

Create task 

![add](https://user-images.githubusercontent.com/43776639/141187506-3b23ab25-9a8c-4865-a27e-9316240f5445.png)


![add2](https://user-images.githubusercontent.com/43776639/141188011-c1a6b2c0-72be-4950-86d4-d88808384ea9.png)


![addpre](https://user-images.githubusercontent.com/43776639/141188044-3c102732-1a66-4b31-b508-dc7b29195c0e.png)
