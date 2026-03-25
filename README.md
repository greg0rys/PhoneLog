[App Tests](tests/Feature)

# Grandstream Phone Log Tool
  ![Log](/resources/app-images/intro.gif)
## Built with ❤️ Stacked With

| Tool | Category | Primary Purpose |
| :--- | :--- | :--- |
| **Laravel** | Framework | PHP web framework for elegant, full-stack development. |
| **SQLite** | Data Store | In-memory data structure store used for caching and queues. |
| **Laragon** | Environment | Local development server for managing PHP, Apache/Nginx, and MySQL. |


# Relationships

```mermaid
erDiagram
    CONTACT ||--o{ CDR_RECORD : "has many"
    CONTACT {
        int id PK
        string name
        string phone_number
    }
    CDR_RECORD {
        int id PK
        int contact_id FK
        string caller_id
        string call_status
        datetime start_time
        datetime end_time
    }
```

# Logic Flow
```mermaid
graph LR
    A[CDR File Parse Starts] --> B(Creates Record Model for each call)
    B --> C{Find Contact?}
    
    %% The "Yes" path
    C -->|Yes| D[Link to Contact ID]
    
    %% The "No" path you wanted added
    C -->|No| E[Find Contact Data]
    E --> F[Associate Contact]
    F --> G[(Save to SQLite DB)]
    G --> D
    
    %% Final step
    D --> H[(Store CdrRecord in MySQL)]
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
| [**parser:parse**](app\Console\Commands\ParserCommand.php) | Daily @ 04:00am | Parses the CSV file inside of /storage/public/records. |
| [**app:record_search**](app\Console\Commands\RecordSearchCommand.php) | N/A | Searches for records in the console. |
| **Laragon** | Environment | Local development server |


