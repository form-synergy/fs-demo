<?php
namespace FormSynergy;

/**
 * FormSynergy PHP Api strategy: Fs Demo.
 *
 * This package will create and update multiple resources using the FormSynergy PHP API.
 *
 * It will automatically configure the following using the API
 *  @see form-synergy/fs-demo/src/strategy.php
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
 * @version     1.5.1.0
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
         *  5) Creating modules
         *  6) Creating objectives
         *  7) Update resource storage
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
            // Store website resource
            $website = $resources->Store('website')->Data($api->_website());
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
                    'siteid' => $website['siteid'],
                ])
                ->Verify()
                ->As('verify');
            // Update website resource
            $website = $resources->Update('website')->Data($api->_verify());
        }

        // 4) Creating the initial strategy.
        $api->Create('strategy')
            ->Attributes([
                'siteid' => $website['siteid'],
                'name' => isset($data['packageName']) ? $data['packageName'] : 'Form Synergy Demo',
            ])
            ->As('strategy');

        // Site id
        $siteid = $website['siteid'];

        // Strategy id.
        $modid = $api->_strategy('modid');


        /**
         * 5) Creating modules.
         *
         * We are going to create our modules in the following order,
         * to prevent unnecessary updates.
         *
         *  - 1 yourEmailAddress_create
         *  - 2 heyThanks_create
         *  - 3 dontWantToShareMyEmail_create
         *  - 4 whatsYourEmail_create
         *  - 5 helloAgain_create
         *  - 6 itWorks_create
         *  - 7 contactForm_create
         *  - 8 newsLetterSubscription_create
         *  - 9 enforceNewsLetterSubscription_create
         *  - 10 newsLetterSubscription_update
         *  - 11 requestCallback_create
         */
        \modules\yourEmailAddress_create($api, $resource, $data, $siteid, $modid);
        \modules\heyThanks_create($api, $resource, $data, $siteid, $modid);
        \modules\dontWantToShareMyEmail_create($api, $resource, $data, $siteid, $modid);
        \modules\helloAgain_create($api, $resource, $data, $siteid, $modid);
        \modules\itWorks_create($api, $resource, $data, $siteid, $modid);
        \modules\contactForm_create($api, $resource, $data, $siteid, $modid);
        \modules\newsLetterSubscription_create($api, $resource, $data, $siteid, $modid);
        \modules\enforceNewsLetterSubscription_create($api, $resource, $data, $siteid, $modid);
        \modules\newsLetterSubscription_update($api, $resource, $data, $siteid, $modid);
        \modules\requestCallback_create($api, $resource, $data, $siteid, $modid);

        /**
         * 6) Creating objectives.
         *
         *  - 1 contactRequests_create
         *  - 2 callbackRequests_create
         *  - 3 newsLetterSubscription_create
         */
        \objectives\obs_contactRequests_create($api, $resource, $data, $siteid, $modid);
        \objectives\obs_callbackRequests_create($api, $resource, $data, $siteid, $modid);
        \objectives\obs_newsLetterSubscription_create($api, $resource, $data, $siteid, $modid);
        
        // 7) Update resource.
        $resources->Store('all')->Data($api->_all());
    }
}
