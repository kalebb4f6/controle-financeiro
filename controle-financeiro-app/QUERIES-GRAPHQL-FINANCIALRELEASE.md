### List

```graphql
query financials($date: DateRange,
    $category: QueryFinancialsCategoryWhereHasConditions,
    $where: QueryFinancialsWhereWhereConditions) {

    financials(date: $date, category: $category, where: $where) {
        id
        date
        value
        bankAccount {
            id
            description
        }
        creditCard {
            name
        }
        description
        status
        type
        category {
            id
            name
            parentCategory {
                id
                name
            }
        }
    }
}
```

```json
{
    "date": {
        "from": "2000-01-01",
        "to": "2023-12-31"
    },
    "where": {
        "column": "BANK_ACCOUNT_ID",
        "operator": "EQ",
        "value": "d6524652-0deb-4929-ab45-404d14bbac2c"
    },
    "category": {

        "OR": [
            {
                "column": "PARENT_CATEGORY_ID",
                "operator": "EQ",
                "value": "ceeb413f-24ad-458e-9984-ef9bf822fd0b"
            },
            {
                "column": "ID",
                "operator": "EQ",
                "value": "ceeb413f-24ad-458e-9984-ef9bf822fd0b"
            }
        ]

    }
}
```

### Create 

```graphql
mutation createFinancial ($input:  FinancialReleaseInput!) {
    financialCreate(input: $input) {
        id
    }
}
```

```json
{
    "input": {
        "bankAccount": "4c529eb0-9484-4d1c-960f-c943ac61ce69",
        "description": "Dividendos de Acoes",
        "installments": 5,
        "value": 50,
        "type": "REVENUE",
        "status": "PAID",
        "date": "2023-10-05",
        "category": "c70e854c-bd6f-438b-8f83-b6be0e8f484d"
    }
}
```
