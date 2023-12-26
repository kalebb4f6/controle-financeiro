### List

```graphql
query categories{
    categories {
        id
        name
    }
}
```

### Create 

```graphql
mutation categoryCreate($input: CategoryInput!) {
    categoryUpsert(input: $input) {
        id
        name
        parentCategory {
            name
        }
    }
}
```

```json
{
    "input": {
        "name": "Netflix Entretenimento",
        "parentCategory": "82663b81-34cf-4323-87e7-a668b1d89076"
    }
}
```
