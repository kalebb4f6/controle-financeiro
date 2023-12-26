### List

```graphql
query bankAccounts {
  bankAccounts {
    id
  	user {
      id
    }
    description
    start_balance
    revenueCount
    expanseCount
    revenueTotal
    expanseTotal
    expanseCreditTotal
  }
}
```

### Create 

```graphql
mutation bankAccountCreate($input: BankAccountInput!) {
  bankAccountCreate(input: $input) {
    id
    description
    start_balance
  }
}
```

```json
{
  "input": {
    "description": "Conta Corrente",
    "start_balance": 1000.00
  }
}
```
### Select ONE

```graphql
query	bank {
  bankAccount(id: "4c529eb0-9484-4d1c-960f-c943ac61ce69") {
     id
  	user {
      id
    }
    description
    start_balance
    revenueCount
    expanseCount
    revenueTotal
    expanseTotal
  }
}
```
