# Northstar POS

IT0049 Technical Formative Assessment 2: **From Arrays to a Real Database**.

This CodeIgniter 4 point-of-sale project replaces temporary PHP arrays with persistent MySQL records. The Customer Accounts and User Accounts pages retrieve their data through dedicated Models and CodeIgniter Query Builder.

## Requirements completed

- MySQL `customers` and `users` tables match the activity schema.
- Six sample records are included in each table (the requirement is at least five).
- `CustomerModel` and `UserModel` provide the data layer.
- Separate controllers retrieve records with Model/Query Builder methods.
- Responsive views display database records safely with escaped output.
- Migrations, seeders, a MySQL export, environment template, and automated model tests are included.

## Stack

- PHP 8.2+
- CodeIgniter 4.7
- MySQL or MariaDB
- Composer 2

## Quick setup with migrations

1. Install dependencies:

   ```bash
   composer install
   ```

2. Copy the environment template:

   ```bat
   copy .env.example .env
   ```

   On macOS or Linux, use `cp .env.example .env`. Update the database username and password in `.env` if your MySQL installation does not use XAMPP's default `root` account with a blank password.

3. Create the database:

   ```bash
   mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS it0049_pos CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"
   ```

4. Create the tables and sample records:

   ```bash
   php spark migrate
   php spark db:seed DatabaseSeeder
   ```

5. Start the application:

   ```bash
   php spark serve
   ```

6. Open `http://localhost:8080`.

## Alternative setup using the database export

The required raw database export is located at `database/it0049_pos.sql`. Importing it recreates the two assignment tables and inserts all sample records:

```bash
mysql -u root -p < database/it0049_pos.sql
```

Because the export contains `DROP TABLE IF EXISTS`, use it only with the dedicated `it0049_pos` database. Do not run migrations after importing the export unless the tables are removed first.

## Application routes

| Page | Route | Data source |
| --- | --- | --- |
| Overview | `/` | Counts from both Models |
| Customer Accounts | `/customer-accounts` | `CustomerModel` -> `customers` |
| User Accounts | `/user-accounts` | `UserModel` -> `users` |

Development aliases `/customers` and `/users` are also available.

## Project structure

```text
app/
|-- Controllers/          # Page flow and Model queries
|-- Database/
|   |-- Migrations/       # Reproducible table schema
|   `-- Seeds/            # Six records per table
|-- Models/               # CustomerModel and UserModel
`-- Views/                # Shared layout and account pages
database/
`-- it0049_pos.sql        # Submission-ready MySQL export
public/assets/css/
`-- app.css               # Responsive POS interface
```

## Tests and checks

Run the complete test suite:

```bash
mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS it0049_pos_test CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"
vendor/bin/phpunit --no-coverage
```

On Windows PowerShell or Command Prompt:

```powershell
mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS it0049_pos_test CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"
vendor\bin\phpunit --no-coverage
```

The database tests use the isolated `it0049_pos_test` MySQL database, apply the same app migrations, run the same seeders, and verify both Models return the expected records. Change the `database.tests.*` values in `.env` when your local MySQL credentials differ. The test suite never uses the development `it0049_pos` database.

## Deployment notes

- Point the web server document root to the `public/` directory.
- Set `CI_ENVIRONMENT = production` on the host.
- Configure the host's MySQL credentials through environment variables or a private `.env` file.
- Run `composer install --no-dev --optimize-autoloader` during deployment.
- Import `database/it0049_pos.sql`, or create the database and run the migrations and seeder.
- Update `app.baseURL` to the final HTTPS URL.

## Submission checklist

- Push all tracked project files to a GitHub repository; `vendor/` and `.env` stay excluded by `.gitignore`.
- Confirm `database/it0049_pos.sql` is present in the repository.
- Deploy the same commit used for the repository submission.
- Add the GitHub repository URL and hosted application URL to the course submission form.

## References

- [CodeIgniter Models](https://codeigniter4.github.io/userguide/models/model.html)
- [Database migrations](https://codeigniter4.github.io/userguide/dbmgmt/migration.html)
- [Database seeding](https://codeigniter4.github.io/userguide/dbmgmt/seeds.html)
