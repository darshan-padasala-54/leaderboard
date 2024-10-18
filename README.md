# Leaderboard
1.  Clone the repository
    ```
    git clone https://github.com/darshan-padasala-54/leaderboard.git
    ```
2.  Install dependencies
    ```
    composer install
    npm install
    ```
3.  Copy the .env.example file to .env
4.  Run the following command to generate a new secret key
    ```
    php artisan key:generate
    ```
5.  Create a database
6.  Update values of variables related to database and app in .env file
7.  Run the following command to create the database tables
    ```
    php artisan migrate
    ```
8.  Generate the dummy data
    ```
    php artisan db:seed
    ```
8.  Run the app
    ```
    npm run dev
    php artisan serve
    ```
### Credentials for login
    email: admin@admin.com
    password: password

