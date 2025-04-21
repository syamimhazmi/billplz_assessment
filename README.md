# Billplz Assessment

## Password generator application

To generate a password, run this command

```bash
php artisan app:password-generator
```

Available options are:

```bash
--length=8 // Length of password; default value is 8
--small=true // Include small letters; default value is true
--capital=true // Include capital letters; default value is true
--numbers=true // Include numbers; default value is true
--symbols=true // Include symbols; default value is true
```

Shows command information. Run this command

`php artisan app:password-generator --help`

## Pizza order ordering program

Serve application:

```php
php artisan serve
```

Go to pizza order page:

```php
http://127.0.0.1:8000/pizza
```

Then create order from that page
