## Nodokter Backend

This repository contains the backend REST API code for the Health Product Order System.

### Installation

1. Clone this repository: `git clone https://github.com/exampleuser/nodokter-backend.git`
2. Navigate to the project directory: `cd nodokter-backend`
3. Install dependencies: `composer install`
4. Copy the example environment file: `cp .env.example .env`
5. Update the database connection settings in the `.env` file to match your local setup:

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nodokter_backend
DB_USERNAME=sail
DB_PASSWORD=password
```

6. Update the SMTP server settings in the `.env` file to match your local setup:

```
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```

7. Generate an application key: `php artisan key:generate`
8. Run the database migrations and seed the database: `php artisan migrate --seed`
9. Start the local development server: `php artisan serve`

### Usage

After completing the installation steps, you can make requests to the REST API.

The following endpoints are available:

-   `POST /api/register` - Register a new user
-   `POST /api/login` - Login with an existing user
-   `POST /api/ordes` - Place a new order
-   `POST /api/products/{product_id}/ratings` - Give rating & comment
-   `PUT /api/orders/{order_id}/cancel` - Cancel an existing order
-   `GET /api/orders/export/excel` - Export an existing order to Excel
-   `GET /api/orders/export/csv` - Export an existing order to CSV

You can check the .

Or you can find the full API documentation [here](https://documenter.getpostman.com/view/9427357/2s93eX1Cvf)
