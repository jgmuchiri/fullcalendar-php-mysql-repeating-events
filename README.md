## Fullcalendar integration using JQUERY, MySQL & PHP with repeating events support

This solution is implemented using Laravel 5.4.* framework.

Fullcalendar has a `dow` function that allows to repeat on specific days of the week. The problem is when the event  is set on a date range, when you use `dow`, then the event repeats forever in both past and future. Fullcalendar's end date is now exclusive and therefore I had to add 1 to the `for` loop through the date range.
<img src="https://snag.gy/nQGlvr.jpg" style="max-height:500px">
<img src="https://snag.gy/5w4CRr.jpg" style="width:300px">
<img src="https://snag.gy/hatQxD.jpg" style="max-height:500px;">

## Requirements
- Composer (https://composer.org)
- PHP >5.6
- MySQL >5.4

## Features
- Create repeating events for (n) days/weeks/months/years
- Drag and drop to update

## Setup
- Clone this repository
- Run `composer install`
- Make a copy of .env-example to .env and edit your database connection parameters
- Run `php artisan migrate`

## To do
- Click to edit events
-
## License
GNU GENERAL PUBLIC LICENSE
Version 3, 29 June 2007
