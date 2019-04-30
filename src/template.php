<?php
namespace FormSynergy;

/**
 * FormSynergy PHP Api template: Fs Demo.
 *
 * This package will create and update multiple resources using the FormSynergy PHP API.
 *
 * It will automatically configure the following using the API
 *  @see form-synergy/fs-demo/src/template.php
 *  - Site registration and verification
 *  - Create a strategy.
 *  - Create Multiple objectives.
 *  - Multiple modules, including interactions
 *
 *  @see form-synergy/fs-demo/src/app.php
 *  - Demo page using HTML, CSS, javaScript, jQuery and SVG
 *
 * Package repository: https://github.com/form-synergy/fs-demo
 *
 * @author      Joseph G. Chamoun <formsynergy@gmail.com>
 * @copyright   2019 FormSynergy.com
 * @licence     https://github.com/form-synergy/template-essentials/blob/dev-master/LICENSE MIT
 * @package     fs-demo
 * @version     1.4.1.0
 */

require_once 'vendor/autoload.php';

/**
 * Enable session manager
 */
\FormSynergy\Session::enable();

/**
 * Import the FormSynergy class
 */
use \FormSynergy\Fs as FS;

/**
 *
 * Fs Demo class
 *
 */
class Fs_Demo
{
    public static function Run($data)
    {
        /**
         * Load account, this action requires the profile id
         */
        $api = FS::Api()->Load($data['profileid']);

        /**
         *  This script will create and update resources
         *
         *
         *  1) Register the website with FormSynergy
         *  2) Include meta tag
         *  3) Verify the site
         *  4) Creating a strategy
         *  5) Create a module using API for the address
         *  6) Create a module using API to request the phone number
         *  7) Create a module using API to request the name
         *  8) Create a module using API to request the email address
         *  9) This module is the final interaction before displaying the email module
         *  10) This module will try to engage with visitors
         *  11) Another module to engage with visitors
         *  12) Another module to engage with visitors
         *  13) This module will provide details on what's next
         *  14) Creating modules from pre-packaged modules
         *  15) Create a module using API to enforce news letter subscription
         *  16) Update the contact form module created from packages
         *  17) Update the request call back form module created from packages
         *  18) Update the news letter subscription form module created from packages
         *  19) Create an objective: Contact request with email
         *  20) Create an objective: Contact request: Email, name and phone number
         *  21) Create an objective: Request call back
         *  22) Create an objective: News letter subscription
         *  23) Update resource storage
         */

        // 1) Register the website with FormSynergy first
        $resources = FS::Resource('fs-demo');
        $website = $resources->Get('website');
        if (!$website) {
            $api->Create('website')
                ->Attributes([
                    'proto' => $data['website']['proto'],
                    'domain' => $data['website']['domain'],
                    'name' => $data['website']['name'],
                    'indexpage' => $data['website']['indexpage'],
                ])
                ->As('website');
            $resources->Store('website')->Data($api->_website());
        }

        // 2) If we have a site id include meta tag.
        /**
         * If the site id is missing exit.
         */
        if ($website && !isset($website['siteid'])) {
            exit('Something went wrong! Unable to load site id!');
        }

        /**
         * Display the FormSynergy meta.
         */
        echo '<meta name="fs:siteid" content="' . $website['siteid'] . '">';

        // 3) If the site has yet been verified, verify the site.
        if ($website && !isset($website['verified'])) {
            $api->Get('website')
                ->Where([
                    'siteid' => $api->_website('siteid'),
                ])
                ->Verify()
                ->As('verify');
            $resources->Update('website')->Data($api->_verify());
        }

        // 4) Creating the strategy.
        $api->Create('strategy')
            ->Attributes([
                'siteid' => $api->_website('siteid'),
                'name' => isset($data['packageName']) ? $data['packageName'] : 'Form Synergy Demo',
            ])
            ->As('strategy');

        // 5) Create a module for the address.
        $api->Create('module')
            ->Attributes([
                'siteid' => $api->_website('siteid'),
                'modid' => $api->_strategy('modid'),
                'name' => 'What\'s your address?',
                'description' => 'In this module, we are requesting the address individually.',
                'headings' => [
                    [
                        'subject' => 'What\'s your address?',
                        'body' => 'Can we have you address please!!!',
                    ],
                ],

                // Set event to respond instantly
                'events' => [
                    ['type' => 'instant'],
                ],
                'form' => [
                    [
                        'x' => 0,
                        'type' => 'text',
                        'system' => 'address',
                        'label' => 'Home Address',
                        'name' => 'address',
                        'class' => 'form-control',
                        // Email validation will check for patterns
                        'validation' => 'yes', // Enable validation
                        'validationType' => 'address',
                    ],
                ],

                // Set responses
                'success' => 'Thank you for contacting us',
                'dismiss' => 'Thanks for the visit',
            ])
            ->As('address');

        // 6) Create a module to request the phone number.
        $api->Create('module')
            ->Attributes([
                'siteid' => $api->_website('siteid'),
                'modid' => $api->_strategy('modid'),
                'name' => 'What\'s your phone number?',
                'description' => 'In this module, we are requesting the phone number individually. We will also create a connection between onsubmit to trigger the address module.',
                'headings' => [
                    [
                        'subject' => 'What\'s your phone number?',
                        'body' => 'Can we have you phone number? No long distance calls promise.',
                    ],
                ],
                // Set event to respond instantly
                'events' => [
                    ['type' => 'instant'],
                ],
                'form' => [
                    [
                        'x' => 0,
                        'type' => 'tel',
                        'system' => 'mobile',
                        'label' => 'Phone Number',
                        'name' => 'mobile',
                        'class' => 'form-control',
                        // Email validation will check for patterns
                        'validation' => 'yes', // Enable validation
                        'validationType' => 'mobile',
                    ],
                ],
                // Connect onsubmit to the address module
                'onsubmit' => $api->_address('moduleid'),

                // Set dismiss response
                'dismiss' => 'Thanks for the visit',
            ])
            ->As('phone');

        // 7) Create a module to request the name.
        $api->Create('module')
            ->Attributes([
                'siteid' => $api->_website('siteid'),
                'modid' => $api->_strategy('modid'),
                'name' => 'What\'s your name?',
                'description' => 'In this module, we are requesting the first and last name individually. We will also create a connection between onsubmit to trigger the phone module.',
                'headings' => [
                    [
                        'subject' => 'Thank You!',
                        'body' => 'We prefer to welcome and greet visitor by name! Can we have your name?',
                    ],
                ],
                // Set event to respond instantly
                'events' => [
                    ['type' => 'instant'],
                ],
                'form' => [
                    [
                        // x represents the index of a field.
                        'x' => 0,
                        'type' => 'text',

                        // system name will tell the processor how to handle the data.
                        'system' => 'fname',
                        'label' => 'First Name',
                        'name' => 'fname',
                        'class' => 'form-control',
                        'validation' => 'yes',
                        'validationType' => 'fname',
                    ],
                    [
                        'x' => 1,
                        'type' => 'text',
                        'system' => 'lname',
                        'label' => 'Last Name',
                        'name' => 'lname',
                        'class' => 'form-control',
                        'validation' => 'yes',
                        'validationType' => 'lname',
                    ],
                ],
                // Connect onsubmit to the phone module
                'onsubmit' => $api->_phone('moduleid'),

                // Set dismiss response
                'dismiss' => 'Thanks for the visit',
            ])
            ->As('name');

        // 8) Create a module to request the email address.
        $api->Create('module')
            ->Attributes([
                'siteid' => $api->_website('siteid'),
                'modid' => $api->_strategy('modid'),
                'name' => 'What\'s your email?',
                'description' => 'In this module, we are requesting the email address individually. We will also create a connection between onsubmit to trigger the name module.',
                'headings' => [
                    [
                        'subject' => 'Your Email Address',
                        'body' => 'You can send us your email address if you\'d like, or you can test the callback.',
                    ],
                ],

                // Set event to respond instantly
                'events' => [
                    ['type' => 'instant'],
                ],
                'form' => [
                    [
                        'x' => 0,
                        'type' => 'email',
                        'system' => 'email',
                        'label' => 'Email Address',
                        'name' => 'email',
                        'class' => 'form-control',

                        // Email validation will check for patterns
                        'validation' => 'yes', // Enable validation
                    ],
                ],

                // Connect onsubmit to the name module
                'onsubmit' => $api->_name('moduleid'),
                'ondismiss' => 'callback:testCallback',
                'buttonsubmit' => 'Send',
                'buttondismiss' => 'Callback',
            ])
            ->As('email');

        // 9) This module is the final interaction before displaying the email module
        $api->Create('module')
            ->Attributes([
                'siteid' => $api->_website('siteid'),
                'modid' => $api->_strategy('modid'),
                'name' => 'Hey thanks',
                'description' => 'This module is the final interaction before displaying the email module',
                'headings' => [
                    [
                        'subject' => 'Hey Thanks!',
                        'body' => ' Can we have you email address? PLEASE, Pretty please?',
                    ],
                ],

                // Set event to respond instantly
                'events' => [
                    ['type' => 'instant'],
                ],

                // Connect onsubmit to the name module
                'onsubmit' => $api->_email('moduleid'),
                'buttonsubmit' => 'Ok',
                'buttondismiss' => 'No',
            ])
            ->As('heyThanks');

        // 10) This module will try to engage with visitors.
        $api->Create('module')
            ->Attributes([
                'siteid' => $api->_website('siteid'),
                'modid' => $api->_strategy('modid'),
                'name' => 'Dont want to share',
                'description' => 'This module will try to engage with visitors.',
                'headings' => [
                    [
                        'subject' => 'Don\'t what to share your email!',
                        'body' => 'We can understand, what is your were asked nicely? Click on the <span class="strong">Maybe button</span>',
                    ],
                ],

                // Set event to respond instantly
                'events' => [
                    ['type' => 'instant'],
                ],

                // Connect onsubmit to the name module
                'onsubmit' => $api->_heyThanks('moduleid'),
                'buttonsubmit' => 'Maybe',
                'buttondismiss' => '',
            ])
            ->As('dontWantToShareMyEmail');

        // 11) Another module to engage with visitors.
        $api->Create('module')
            ->Attributes([
                'siteid' => $api->_website('siteid'),
                'modid' => $api->_strategy('modid'),
                'name' => 'What\'s your email',
                'description' => 'This module will try to engage with visitors.',
                'headings' => [
                    [
                        'subject' => 'What\'s your email',
                        'body' => 'Let\'s assume that you don\'t what to share your email address! Click on the <span class="strong">Dismiss button</span>',
                    ],
                ],
                'form' => [
                    [
                        'x' => 0,
                        'type' => 'email',
                        'system' => 'email',
                        'label' => 'Email Address',
                        'name' => 'email',
                        'class' => 'form-control',

                        // Email validation will check for patterns
                        'validation' => 'yes', // Enable validation
                    ],
                ],

                // Set event to respond instantly
                'events' => [
                    ['type' => 'instant'],
                ],

                // Connect onsubmit to the name module
                'ondismiss' => $api->_dontWantToShareMyEmail('moduleid'),
                'buttonsubmit' => 'Submit',
                'buttondismiss' => 'Dismiss',
            ])
            ->As('whatsYourEmail');

        // 12) Another module to engage with visitors.
        $api->Create('module')
            ->Attributes([
                'siteid' => $api->_website('siteid'),
                'modid' => $api->_strategy('modid'),
                'name' => 'Hello Again',
                'description' => 'This module will try to engage with visitors.',
                'headings' => [
                    [
                        'subject' => 'Hello again',
                        'body' => 'The contact form is broken down into a sequence of interactions. We will start with the email address.',
                    ],
                ],

                // Set event to respond instantly
                'events' => [
                    ['type' => 'instant'],
                ],
                // Connect onsubmit to the name module
                'onsubmit' => $api->_whatsYourEmail('moduleid'),
                'buttonsubmit' => 'Ok',
                'buttondismiss' => '',
            ])
            ->As('helloAgain');

        // 13) This module will provide details on what's next.
        $api->Create('module')
            ->Attributes([
                'siteid' => $api->_website('siteid'),
                'modid' => $api->_strategy('modid'),
                'name' => 'It Works',
                'description' => 'This module will provide details on what\'s next.',
                'headings' => [
                    [
                        'subject' => 'It Works!',
                        'body' => 'The dismiss button is connect to this module. For demo purposes, we have connected a bunch of modules, to form a convincing sequence of interactions',
                    ],
                ],

                // Set event to respond instantly
                'events' => [
                    ['type' => 'instant'],
                ],
                // Connect onsubmit to the name module
                'onsubmit' => $api->_helloAgain('moduleid'),
                'buttonsubmit' => 'Get Started',
                'buttondismiss' => '',
            ])
            ->As('itWorks');

        // 14) Create modules from pre-packaged modules.
        $api->Create('modules')
            ->Attributes([
                'siteid' => $api->_website('siteid'),
                'modid' => $api->_strategy('modid'),
                'using' => [
                    'contact-form',
                    'request-call-back',
                    'news-letter-subscription',
                ],
            ])
            ->As('packages');

        // 15) Create an individual module using API to enforce news letter subscription.
        $api->Create('module')
            ->Attributes([
                'siteid' => $api->_website('siteid'),
                'modid' => $api->_strategy('modid'),
                'name' => 'Enforce news letter subscription',
                'description' => 'This module will be triggered if the user dismisses the new letter subscription module.',
                'headings' => [
                    [
                        'subject' => 'Are you sure!',
                        'body' => 'Did you know that we are sending out coupon codes that will save you tons of money! This offer is only available to news letter subscribers! We hope that you change your mind.',
                    ],
                ],

                // Set event to respond instantly
                'events' => [
                    ['type' => 'instant'],
                ],
                'buttonsubmit' => 'Ok Subscribe me',

                // Connect onsubmit to the address module
                'onsubmit' => $api->_packages('news-letter-subscription')['moduleid'],

                'buttondismiss' => 'No thank',

                // Set dismiss response
                'dismiss' => 'Thanks for the visit',
            ])
            ->As('enforceNewsLetterSubscription');

        /**
         * So far we have created 3 modules from pre-packaged modules,
         * and 4 modules using the API.
         *
         * In this example we are creating an alternative contact form,
         * by chain linking 4 modules into a single sequence.
         *
         * This can be achieved by creating connections in between  modules.
         */

        // 16) Update the contact form module created from packages
        $api->Get('module')
            ->Where([
                'moduleid' => $api->_packages('contact-form')['moduleid'],
            ])
            ->Update([
                'description' => 'This contact form will request an email address, first and last name, phone number, and a message. If this form is submitted, it will display a successful response. On the other hand if it\'s dismissed it will trigger a sequence of modules.',
                'headings' => [
                    [
                        'subject' => 'Contact Us',
                    ],
                ],

                // Set event to respond instantly
                'events' => [
                    ['type' => 'instant'],
                ],

                // Connect ondismiss to the email module
                'ondismiss' => $api->_itWorks('moduleid'),

                // If submitted, display success message.
                'success' => 'Thank you for contacting us',
            ])

            // Now we can access the contact form directly.
            ->As('contactForm');

        // 17) Update the request call back form module created from packages.
        $api->Get('module')
            ->Where([
                'moduleid' => $api->_packages('request-call-back')['moduleid'],
            ])
            ->Update([
                'description' => 'This module simply requests a phone number. The phone number will be validated by checking if it is in service, and that it can receive text messages.',
                'headings' => [
                    [
                        'subject' => 'Request Callback',
                    ],
                ],

                // Set event to respond instantly
                'events' => [
                    ['type' => 'instant'],
                ],

                // If submitted, display success message
                'success' => 'Thank you for the request. We shall be in contact very soon.',

                // If dismissed, display dismiss message
                'success' => 'Ok! Thank you for visiting',
            ])

            // Now we can access the request callback form directly.
            ->As('requestCallback');

        // 18) Update the news letter subscription form module created from packages
        $api->Get('module')
            ->Where([
                'moduleid' => $api->_packages('news-letter-subscription')['moduleid'],
            ])
            ->Update([
                'description' => 'This module will request an email address for news letter purposes',

                'headings' => [
                    [
                        'subject' => 'News Letter',
                    ],
                ],

                // Set event to respond instantly
                'events' => [
                    ['type' => 'instant'],
                ],

                // If submitted, display success message
                'success' => 'Thank you subscribing.',

                // If dismissed, connect to Enforce news letter subscription
                'ondismiss' => $api->_enforceNewsLetterSubscription('moduleid'),
            ])

            // Now we can access the contact form directly.
            ->As('newsLetterSubscription');

        // 19) Create an objective: Contact request with email.
        $api->Create('objective')
            ->Attributes([
                'siteid' => $api->_website('siteid'),
                'modid' => $api->_strategy('modid'),
                'label' => 'Contact request with email',

                // This objective will trigger a notification if the email value exists and validated.
                'properties' => [
                    'email' => [
                        'value' => 'yes',

                        // validated, isvalid and confirmed will produce the same results.
                        'isvalid' => 'yes',
                    ],
                ],
                'notificationmethod' => 'email',
                'recipient' => [
                    'fname' => $data['contact']['fname'],
                    'lname' => $data['contact']['lname'],
                    'email' => $data['contact']['email'],
                ],
            ])
            ->As('objective1');

        // 20) Create an objective: Contact request: Email, name and phone number.
        // Note: This objective is not limited to a certain module. When an incoming request is intercepted, if all properties have values, a notification will be triggered.
        $api->Create('objective')
            ->Attributes([
                'siteid' => $api->_website('siteid'),
                'modid' => $api->_strategy('modid'),
                'label' => 'Contact request: Email, name and phone number',

                // This objective will trigger a notification if email, fname, lname and phone number exists.
                'properties' => [
                    'email' => [
                        'value' => 'yes',
                    ],
                    'phone' => [
                        'value' => 'yes',
                    ],
                    'fname' => [
                        'value' => 'yes',
                    ],
                    'lname' => [
                        'value' => 'yes',
                    ],
                ],
                'notificationmethod' => 'email',
                'recipient' => [
                    'fname' => $data['contact']['fname'],
                    'lname' => $data['contact']['lname'],
                    'email' => $data['contact']['email'],
                ],
            ])
            ->As('objective2');

        // 21) Create an objective: Request call back.
        $api->Create('objective')
            ->Attributes([
                'siteid' => $api->_website('siteid'),
                'modid' => $api->_strategy('modid'),
                'label' => 'Request call back',

                // This objective will trigger a notification only if the mobile value exists and submitted by the request-call-back module.
                'properties' => [
                    'mobile' => [
                        'value' => 'yes',
                    ],
                ],
                'limittomodule' => $api->_packages('request-call-back')['moduleid'],
                'notificationmethod' => 'email',
                'recipient' => [
                    'fname' => $data['contact']['fname'],
                    'lname' => $data['contact']['lname'],
                    'email' => $data['contact']['email'],
                ],
            ])
            ->As('objective3');

        // 22) Create an objective: News letter subscription.
        $api->Create('objective')
            ->Attributes([
                'siteid' => $api->_website('siteid'),
                'modid' => $api->_strategy('modid'),
                'label' => 'News letter subscription',
                
                // This objective will trigger a notification only if an email value exists and submitted by the news-letter-subscription module.
                'properties' => [
                    'email' => [
                        'value' => 'yes',
                    ],
                ],

                'limittomodule' => $api->_packages('news-letter-subscription')['moduleid'],
                'notificationmethod' => 'email',
                'recipient' => [
                    'fname' => $data['contact']['fname'],
                    'lname' => $data['contact']['lname'],
                    'email' => $data['contact']['email'],
                ],
            ])
            ->As('objective4');

        // 23) Update resource.
        $resources->Store('all')->Data($api->_all());
    }
}
