# Form Synergy Demo

This package will automatically configure the following using the API

* Site registration and verification
* Create a strategy.
* Create Multiple objectives.
* Multiple modules, including interactions
* Demo page using HTML, CSS, javaScript, jQuery and SVG

## Install using composer
``` bash
composer require form-synergy/fs-demo
```

## Include the library
``` php
require '/vendor/autoload.php';
```

## To Load Package
You will need to retrieve your credentials in the Form Synergy console: https://formsynergy.com/console/
``` PHP
\FormSynergy\Fs_Demo([
    'strategy'      => '', // Eg: Form Synergy Demo
    'profileid'     => '', // You can find the profile id under the profile tab: https://formsynergy.com/console/
    'website' => [
        'proto'     => '', // Eg: https, or http
        'domain'    => '', // Eg: demo.formsynergy.com
        'name'      => '', // Eg: Form Synergy demo
        'indexpage' => '', // Eg: /packages/fs-demo
    ],
    'config' => [
        'apikey'    => '', // API Key: Under the API access tab: https://formsynergy.com/console/
        'secretkey' => '', // API Key: Under the API access tab: https://formsynergy.com/console/

    ],
    'contact' => [          // Alerts and notifications contact.
        'fname'     => '', 
        'lname'     => '',
        'email'     => '',
        /**
         * Format:
         *  - default for HTML & Text,
         *  - text, 
         *  - markdown
         */
        'format'    => ''  
    ],
    'storage' =>       [__DIR__, 'form-synergy-demo'] 
]);
```