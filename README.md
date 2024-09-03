
# Simple Bank App with Laravel

This is a simple bank application built with Laravel that provides basic banking functionalities such as user signup, login, dashboard, deposit, withdrawal, fund transfer, statement viewing, and logout. 


## Features

- Signup: Users can create a new account.
- Login: Users can log in with their credentials.
- Dashboard: Overview of account information and actions.
- Deposit: Users can deposit funds into their account.
- Withdraw: Users can withdraw funds from their account.
- Transfer: Users can transfer funds to other accounts.
- Statement: Users can view their transaction history.
- Logout: Users can securely log out of the application. 


## Requirements

- PHP >= 8.0
- Laravel >= 10.x
- MySQL or other supported databases
- Composer
- Node.js and npm (for frontend assets)


## Installation

#### Clone the repository:

```bash
git clone https://github.com/yourusername/simple-bank-app.git
cd simple-bank-app
```

#### Install dependencies:

```bash
composer install
npm install
npm run dev
```

#### Setup environment:

- Copy `.env.example` to `.env`:

```bash
    cp .env.example .env
```

- Update your `.env` file with your database credentials and other settings. 

#### Generate application key:

```bash
php artisan key:generate
```

#### Run migrations:

```bash
php artisan migrate
```

#### Serve the application:

```bash
php artisan serve
```

## Usage

#### Signup
- Go to `/signup` to create a new account.
- Provide a valid email, password, and other required details.

#### Login
- Go to `/login` to access your account.
- Enter your email and password.

#### Dashboard
- After login, you will be redirected to the dashboard where you can view your account balance, recent transactions, and available actions.

#### Deposit Funds
- Navigate to the Deposit section on the dashboard.
- Enter the amount to deposit and submit.

#### Withdraw Funds
- Navigate to the Withdraw section on the dashboard.
- Enter the amount to withdraw and submit.

#### Transfer Funds
- Navigate to the Transfer section on the dashboard.
- Enter the recipient’s account details and amount to transfer.
- Submit the transfer request.

#### View Statement
- Go to the Statement section to view your transaction history, including deposits, withdrawals, and transfers.

#### Logout
- Click the Logout button in the navigation menu to securely end your session.


## Database Schema

The application uses two primary tables to manage user accounts and transaction records: 

#### Users Table
- Purpose: Stores user information and account credentials.
- Key Fields: Includes fields for storing user details such as username, password, email, and other profile information.
- Operations: Handles user signup, login, and account management.

#### Statements Table
- Purpose: Records all financial transactions including deposits, withdrawals, and transfers.
- Key Fields: Contains fields for transaction type (deposit, withdrawal, transfer), amount, date, details, and balance updates.
- Operations: Used for generating user statements and maintaining transaction history for each account.


These tables form the core of the banking application, allowing for secure and efficient handling of user accounts and transaction tracking.

## Contributing

Feel free to submit issues or pull requests. Contributions are welcome!
## License

This project is open-sourced software licensed under the [MIT license](https://choosealicense.com/licenses/mit/). 

