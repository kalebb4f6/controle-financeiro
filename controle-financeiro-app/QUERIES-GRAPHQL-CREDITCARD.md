### List

```graphql
query creditCards {
  creditCards {
    id
    bankAccount {
      description
    }
    customer {
      name
    }
    dayOfClose
    flag
    name
    preferential
  }
}
```

### Create 

```graphql
mutation creditCardsUpsert($input: CreditCardInput!) {
    creditCardUpsert(input: $input) {
        id
        bankAccount {
            description
        }
        customer {
            name
        }
        dayOfClose
        flag
        name
        preferential
    }
}
```

```json
{
    "input": {
        "bankAccountId": "9f846c66-ec4d-43c8-adea-6833ca4edb47",
        "customerId": "6af86c57-8c42-4837-9158-6e7beeceac30",
        "name": "Latam milhas",
        "flag": "VISA",
        "dayOfClose": 5,
        "preferential": true
    }
}
```
