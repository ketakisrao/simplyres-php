Simply Res!
===========
SimplyRes allows you to make reservations at restaurants, SimplyReserve!


This application is built on Laravel -- A php based web framework. The backend used is MySQL and the site has been deployed on Openshift (Red Hat Cloud) at [SimplyRes](https://simplyresphp-ketakisrao.rhcloud.com "SimplyRes!").


If you want a copy of this application up and running on your local machines, do the following:

+ Install Laravel at [Laravel](http://laravel.com/docs/5.0 "Laravel 5 Docs")
+ Make a folder and cd into it.
+ Clone the repository using git clone https://github.com/ketakisrao/simplyres-php.git
+ cd to simplyresphp/
+ Install dependencies using : `composer install`
+ To run this application use `php artisan serve`
+ Simplyres! should now be running on http://localhost:8080/
+ To configure the database : copy the config/database.php in config/local and edit it to match your local database settings


##### If you wish to access features like Login Twitter please use the Openshift site as the features will not work on your local machines. Please use a HTML5 compatible browser for the application since it contains a few elements from HTML5.


After Installation
==================


+ Visit the homepage and click on GetStarted
+ Login/Register/Login with Twitter to be able to see your dashboard and make bookings.
+ Search for a restaurant on the google maps input provided. (Maps has been integrated for user convenience and interactivity)
+ Choose number of people (cannot be greater than 16).
+ Choose a date and timing for the booking.
+ Hit Book! to confirm the booking
+ Navigate to the bookings tab to be able to view your bookings.
+ You can now cancel bookings by clicking on the delete button next to it.


REST API
========

SimplyRes has REST API for the following
+ To view the bookings made by people.

To View Bookings, navigate to domain_name/api/bookings

######Make sure to be signed in while accessing the api
