# Design
* I used the PHP Luman framework for this test as have the most experience using Laravel and didn't need all 
  features of Laravel for this task, however it does allow room for upgrading to the full Laravel if the project requires expanding.
* MySQL used for storing Order details.
* I used Laravels Homestead via Vagrant/Virtual box to set up the local MySQL server for simplicity (.env file uses 
  the default Homestead credentials).
* If this was a production project I would use Auth0 to secure the Orders API and set the necessary user permissions 
  via an access token.
* I have created a house_keeping.php file which would run via a Cron to automatically delete orders older than 3 
  days from the database.

I have included a getting_started.md file that goes through setup requirements in order to get the API working 
through Postman (postman collection file: GForces Orders.postman_collection.json) and to get the unit tests to pass.

# Infrastructure 
* MySQL database for storage (However if going Serverless I would look into AWS RDS for long term storage).
* I would also look into splitting the API up into smaller functions and potentially run it on AWS Lambda (However it would depend on resources available)

# Improvements 
* Would use something like CI or Jenkins to deploy.
* Add additional/more advanced unit tests to increase code coverage and use cases.
* Would further improve the housekeeping delete code based on the requirements i.e. does it need to delete bang on 3 
  days old or can there be some orders that may be nearly 4 days old depending on when the cron runs etc.
