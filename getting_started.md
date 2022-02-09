# Getting Started
* PHP version 7.3 or better.
* A local MySQL server (Homestead via Vagrant/Virtual box)

#### Run Local Server:

     php -S localhost:8000 -t public

Then run migrations to create DB tables via:
    
    php artisan migrate

If you want to re test the API using Postman after running unit tests you will need to re run the above migration 
cmd (As the unit test file is using Lumans DatabaseMigrations trait to ensure the DB is empty before tests run).
