# Form Synergy Demo

This package will create and update multiple resources using the FormSynergy PHP API.

It will automatically configure the following using the API
See form-synergy/fs-demo/src/template.php 

- Site registration and verification
- Create a strategy.
- Create Multiple objectives.
- Multiple modules, including interactions
 
In order to see how everything works together, take a look at the demo page, where you will find, data-fs attributes to trigger events and manage displays.
```code 
see form-synergy/fs-demo/src/app.php 
```
- Demo page using HTML, CSS, javaScript, jQuery and SVG 

## Install using composer
```bash
composer require form-synergy/fs-demo
```

## Include the library
```php
require '/vendor/autoload.php';
```

You will need to retrieve your credentials in the Form Synergy console.

Console Access: https://formsynergy.com/console/


## To Load Package

```PHP
require_once 'vendor/autoload.php';

/**
 * Form Synergy Demo.
 * 
 * This package will load and initiate the demo package.
 */
\FormSynergy\Full_Demo([
    'packageName'       '', // Optional Eg: Form Synergy Demo
    'profileid' =>      '', // You can find the profile id under the profile tab: https://formsynergy.com/console/
    'website' => [
        'proto' =>      '', // Eg: https, or http
        'domain' =>     '', // Eg: demo.formsynergy.com
        'name' =>       '', // Eg: Form Synergy demo
        'indexpage' =>  '', // Eg: /packages/fs-demo
    ],
    'config' => [
        'apikey' =>     '', // API Key: Under the API access tab: https://formsynergy.com/console/
        'secretkey' =>  '', // API Key: Under the API access tab: https://formsynergy.com/console/
        
    ],
    'contact' => [          // Alerts and notifications contact.
        'fname' =>      '', 
        'lname' =>      '',
        'email' =>      ''
    ],
    'storage' =>        '' // A directory dedicated to store files Eg: __DIR__
]);
```