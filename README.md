# Fullcalendar integration using JQUERY, MySQL & PHP with repeating events support

This solution is implemented using Laravel 5.4.* framework.


Fullcalendar has a `dow` function that allows to repeat on specific days of the week. The problem is when the event  is set on a date range, when you use `dow`, then the event repeats forever in both past and future. Fullcalendar's end date is now exclusive and therefore I had to add 1 to the `for` loop through the date range.

## Setup

- Clone this repository

- Run `composer install`

- Make a copy of .env-example to .env and edit your database connection parameters

- Run `php artisan migrate`


## License
GNU GENERAL PUBLIC LICENSE
Version 3, 29 June 2007
