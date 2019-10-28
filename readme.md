# Turkish Faker
Turkish faker package for laravel . This package is created for testing your project with fake data.  please do not use it to create spam. New options are comming soon. Enjoy it, thanks.


## Installation

### Step 1

get install package with composer

```bash
composer require ybazli/tr-faker
```

### Step 2

Next add this line in your 'config/app.php' in the providers array:

```php
Ybazli\Faker\FakerServiceProvider::class,
```
### Step 3

Next add this line in your 'config/app.php' in the aliases array:

```php
'Faker' => Ybazli\Faker\Facades\Faker::class,
```
Done :)

| Code | Description |
| --- | --- |
| ``` Faker::firstName() ``` | Return a random firstname |
| ``` Faker::lastName() ``` | Return a random lastname |
| ``` Faker::fullName() ``` | Return a random fullname |
| ``` Faker::company() ``` | Return a random company name |
| ``` Faker::mobile() ``` | Return a random mobile number |
| ``` Faker::email() ``` | Return a random email address |
| ``` Faker::domain() ``` | Return a random domain like: https://www.blablabla.com.tr |
| ``` Faker::age($min,$max) ``` | Return a random you can use $min and $max but thery are nullable |
| ``` Faker::birthday($sign) ``` | Return a random birthday date use $sign for replace '-' between year/mounth/day |
| ``` Faker::address() ``` | Return a random postal address |
| ``` Faker::identify() ``` | Return a random identify number(random digit with 11 length) |
| ``` Faker::city() ``` | Return a random city of Turkey with state in Array( sehir:String , ilce:String )|
| ``` Faker::melliCode() ``` | Return a random 10 integer |
| ``` Faker::word() ``` | Return a random word |
| ``` Faker::sentence() ``` | Return a random sentence |
| ``` Faker::paragraph() ``` | Return a random paragraph |

## License
The MIT License (MIT). Please see [License File](LICENSE) for more information.
