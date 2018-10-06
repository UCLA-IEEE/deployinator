# PHP-MVC Boilerplate

A boilerplate for creating an MVC structured web application in PHP.

I used panique's [MINI](https://github.com/panique/mini) as a reference
and tutorial for building this boilerplate, while also adding my own
personal flavor to it based off of my experiences of building
express/mongoose applications.

## Setting up a Development Environment
1. Download the project or clone this repo.

2. Create `/app/config/config.php` with your database configuration.

3. Download [MAMP](https://www.mamp.info/en/)

4. Point MAMP's web server to this project and start the Apache, PHP, and MySQL server.

5. Visit `localhost:8888` to view this project (`localhost` on Windows)

**Sample config.php file (works with MAMP)**
```
<?php

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'test');
define('DB_CHARSET', 'utf8');

```
