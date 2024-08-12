# Fineman

Welcome to the **Fineman**, an open-source tool designed to help you manage your finances effortlessly. This web application allows you to organize your expenses with a user-friendly dashboard.

## Features

### 📊 Dashboard Overview

Get a comprehensive view of your financial health with our intuitive dashboard. Easily monitor your expenses.

### 📁 Collections

One of the standout features of our app is Collections. Organize your finances by creating collections tailored to your needs.

- **Create Collections**: Customize your financial organization by creating different collections, such as "Vacation Fund," "Emergency Savings," or "Gadget Upgrade."
- **Set Target Price**: Define financial goals by setting a target price for each collection. Monitor your progress and stay motivated to reach your targets.

### 📅 Transaction Management

Add transactions to keep track of your spending. Review your transaction history to identify areas for improvement.

## Run Locally

### Step 1: Download and Install XAMPP (You can use other alternatives but process may be diffrent)

- Visit the [XAMPP official website](https://www.apachefriends.org/index.html) and download the version for your operating system.

### Step 2: Clone the Repository

```bash
  git clone https://github.com/andr3j123/fineman.git
```

- Move the contents to the htdocs directory inside your XAMPP installation directory. The default path for Windows is usually:

```
C:\xampp\htdocs\fineman
```

### Step 3: Configure the Database

1. Start Apache and MySQL:

- Open the XAMPP Control Panel and start the Apache and MySQL services.

2. Create a Database:

- Open your web browser and go to http://localhost/phpmyadmin.
- Click on the "Databases" tab, enter a name for your database `fineman`, and click "Create."

3. Import the Database Structure:

- In phpMyAdmin, select your newly created database.
- Click on the "Import" tab, and choose the SQL file included in the project repository `fineman.sql`.
- Click "Go" to import the database structure.

### Step 4: Configure the `dbConn.php`

- Edit `./backend/dbConn.php` to match your XAMPP setup (By default this should work).

```php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "fineman";
```

### Step 5: Run the Application

Access the Application:

- Open your web browser and go to http://localhost/fineman.
- The application should now be running. Congrats!

## Contributing

We welcome contributions from the community! If you have a feature request, bug report, or would like to contribute code, please open an issue or submit a pull request.

## License

This project is licensed under the [GNU GENERAL PUBLIC LICENSE](https://www.gnu.org/licenses/gpl-3.0.html#license-text)
