## Url shortner project

### get started

### Get started

1- Clone the project:
```shell
git clone https://github.com/sinarajabpour1998/url_shortener.git
```

2- open the project directory in terminal:
```shell
cd url_shortener
```

3- install necessary packages:
```shell
composer install
```

4- create env file:
```shell
cp env .env
```

5- setup database in env file:
```shell
database.default.hostname = localhost
database.default.database = 'test_database_name'
database.default.username = 'test_db_username'
database.default.password = 'test_password'
database.default.DBDriver = MySQLi
```

6- create necessary tables:
```shell
php spark migrate
```

7- run the project:
```shell
php spark serve
```

And you are good to go !

### For development only

1- install npm packages:
```shell
npm i
```

2- run development each time you made changes to scss or js files:
```shell
npm run build
```
