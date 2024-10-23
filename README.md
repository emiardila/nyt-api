## NYT Best Sellers API

### Overview

This API provides access to a list of the New York Times best-selling books.

### Dependencies

-   Laravel 9 or later

### Installation

1.  Clone this repository or download the code.
2.  Install the required dependencies using Composer:
    ```
    composer install
    ```

### Usage

**Base URL:** `/api/1/nyt/best-sellers`

**Endpoints:**

-   **GET /api/1/nyt/best-sellers:** Returns a list of best-selling books.
-   **GET /api/1/nyt/best-sellers/bad-request:** Returns a bad request response.

### Example Usage

**Request:**

```
GET /api/1/nyt/best-sellers
```

**Params:**

```
author: string
isbn[]: string
title: string
offset: integer
```

**Response:**

JSON

```
{
    "data": [
        {
            "rank": 1,
            "title": "Book Title 1",
            "author": "Author 1",
            "description": "Description of Book 1",
        },
        // ... more books
    ]
}
```
