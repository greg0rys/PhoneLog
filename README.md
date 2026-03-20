# Grandstream Phone Log Tool
  *A client uses a Grandstream phone system which does not come with a robust logging tool on its own. So we made one!*
## 🛠️ Tech Stack

| Tool | Category | Primary Purpose |
| :--- | :--- | :--- |
| **Laravel** | Framework | PHP web framework for elegant, full-stack development. |
| **MySQL** | Data Store | In-memory data structure store used for caching and queues. |
| **Laragon** | Environment | Local development server for managing PHP, Apache/Nginx, and MySQL. |


# Usage 

# Relationships

```mermaid
erDiagram
    CONTACT ||--o{ CDR_RECORD : "has many"
    CONTACT {
        int id PK
        string first_name
        string last_name
        string phone_number
    }
    CDR_RECORD {
        int id PK
        int contact_id FK
        string direction
        int duration
        datetime call_at
    }
```

# Logic Flow
```mermaid
graph LR
    A[Incoming Call] --> B(Laravel Webhook)
    B --> C{Find Contact?}
    C -->|Yes| D[Link to Contact ID]
    C -->|No| E[Create New Contact]
    D --> F[Store CdrRecord in MySQL]
    E --> F
    F --> G[Cache Latest Call in Redis]
```


