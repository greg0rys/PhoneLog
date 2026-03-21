[App Tests](tests/Feature)

# Grandstream Phone Log Tool
  *A client uses a Grandstream phone system which does not come with a robust logging tool on its own. So we made one!*
  ![Log](/resources/app-images/intro.gif)
## Built with ❤️ Stacked With

| Tool | Category | Primary Purpose |
| :--- | :--- | :--- |
| **Laravel** | Framework | PHP web framework for elegant, full-stack development. |
| **MySQL** | Data Store | In-memory data structure store used for caching and queues. |
| **Laragon** | Environment | Local development server for managing PHP, Apache/Nginx, and MySQL. |


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
    A[CDR File Parse Starts] --> B(Creates Record Model for each call)
    B --> C{Find Contact?}
    C -->|Yes| D[Link to Contact ID]
    C -->|No| E[Create New Contact]
    D --> F[Store CdrRecord in MySQL]
```

# Usage
```bash
# clone the repo
git clone https://github.com/greg0rys/PhoneLog

```
### Commands
```bash
php artisan parser:parse
```
| Command | Schedule | Primary Purpose |
| :--- | :--- | :--- |
| **parser:parse** | Daily @ 04:00am | Parses the CSV file inside of /storage/public/records. |
| **MySQL** | Data Store | In-memory data structure store used for caching and queues. |
| **Laragon** | Environment | Local development server for managing PHP, Apache/Nginx, and MySQL. |


