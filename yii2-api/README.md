RESTful API in Yii 2
====================

Yii2 Application with RESTful API configured. Take a look at http://budiirawan.com/setup-restful-api-yii2/ for more detail explanation

## Install Composer Packages
You need [Composer](http://getcomposer.org) installed first.
```
composer self-update
```
```
composer install
```

## Run Yii Init
Open terminal and go to the project folder and run

Mac/Linux
```
php ./init
```

Windows
```
init
```
Choose **development** environment and finish the steps.

## Configure Database
create your database and configure it in **common/config/main-local.php**

## Run Database Migration
This command will create new country table and populate its data

```
./yii migrate
```




