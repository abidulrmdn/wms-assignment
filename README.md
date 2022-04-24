# wms
warehouse management system

## What does this Project contains / demonstrates:
- Feature of loading data into DB
- Migrations of DB with proper shemas
- Simple use of MVC
- Proper many-to-many relationship
- Dealing with Json files
- Ability to make server infrastructure (DB, Web) containers using docker
- Linux administration skillset
- Testing knowledge including different type of testings
- Easy setup for developers to use big applications
- Simple UI and FE skills
- System design (architectural and logical design) skills

-----

## Setup 
### Requirements
- Install docker and docker-compose and run docker daemon
- JSON Data must be added in `wms/app/database/jsonData/` to be loaded
	- Otherwise no data will be loaded
- Run the command
 docker-compose up -d
- Go to your browser and visit:
 http://localhost:8080


## What does the container do on startup
- Runs composer install
- Create the right db schema for the application
- Load json data into db
- Runs the laravel start up script

### How to run tests

- Go inside the container and run
`php vendor/bin/codecept run --steps`



### Commands that can be run
- Test:
`php vendor/bin/codecept run --steps `
- Load JSON Data manually
`php artisan data:load`
- Run migration to create tables that are needed for the application
`php artisan migrate`

-----

## Main files to look at
or the ones I remember :
- app/Console/Commands/LoadData.php
- database/migrations/2020_10_10_123012_products.php

- app/Http/Kernel.php

- app/Http/Controllers/WareHouseMainController.php
- app/Models/Product.php
- app/Observers/ProductObserver.php
- app/Providers/AppServiceProvider.php
- resources/views/main.blade.php
- routes/web.php

- tests/acceptance.suite.yml
- tests/acceptance/StoreCest.php

- startup.sh
- ../docker-compose.yml
- ../Dockerfile

- ....
-----

## Things to Improve

- FE
	- Use webpack
	- Use sass
	- Use proper FE framework like react
	- Responsive API Call for deleting/selling
- BE
	- Read exact part from DB instead of all json file
	- read partials from files for huge files
	- read all json files and store them based on their table naming
	- Constraint on pivot table to avoid rep
	- Authentication
	- Pass products using resource in future to avoid sending all the data
	- Proper CSRF for all posts like sell
	- Pass proper request to Controller
	- Make the routes more RESTFUL
- Setup & Devops
	- Proper data container instead of jamming everything in 1 container
	- Proper data seeding with undefined jsons table namings
- Testing
	- Functional Testing
	- Unit Testing
	- Snapshot testing
	- API Testing
	- Use of seeders
	- Proper classes to test
