To install this project

1) Clone this repo.
2) Run "composer update" command.
3) Run "npm install && npm run dev" command.
4) Create a DB and update the .env file with the newly created Db name.
5) Run "php artisan migrate:fresh --seed" command.
6) Open the application in browser.
7) The http://library.test/login will give the login page.
8) admin@library.com/password is the credentails for Admin login.
9) user@library.com/password is the credentails for User login.
10) http://library.test/libraries will list the libraries and is common for both admin and users.
11) http://library.test/library/1 will list the books of a particular library.This is also a common page for both admin and users.
12) http://library.test/addBook option to add a book and to assign this into libraries.It is accessible only for Admin.
