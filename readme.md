
<p align="center">
  <img src="https://avatars0.githubusercontent.com/u/1316274?v=3&s=200">
</p>

Laravel Sample Application
==================

This sample application demonstrates some of Tml's capabilities within a Laravel application


Installation
==================

To install the app, use:

```ssh
$ git clone https://github.com/translationexchange/tml-laravel-samples-foody.git
$ cd tml-laravel-samples-foody
$ composer install
$ touch storage/database.sqlite
$ php artisan migrate
$ php artisan db:seed
$ php artisan serve
```

Open your browser and point to:

http://localhost:8000


To be able to translate any elements in the application, you must be a registered user on Translation Exchange.

Once you register as a new user, add a new application and copy the token to the configuration file.

Open "app/Http/Middleware/Tml.php" and change the following line:

```php
tml_init([
    "key" => "YOUR_KEY"
]);
```

This will allow you to add more languages, become app translator, and much more...


Links
==================

* Register on TranslationExchange.com: http://translationexchange.com

* Follow TranslationExchange on Twitter: https://twitter.com/translationx

* Connect with TranslationExchange on Facebook: https://www.facebook.com/translationexchange

* If you have any questions or suggestions, contact us: info@translationexchange.com


Copyright and license
==================

Copyright (c) 2016 TranslationExchange.com

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.