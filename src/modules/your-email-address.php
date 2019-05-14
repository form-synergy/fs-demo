<?php
namespace FormSynergy\modules;
/**
 * Your email address module.
 */
function yourEmailAddress_create($api, $resource, $data, $siteid, $modid)
{
    $api->Create('module')
        ->Attributes([
            'siteid' => $siteid,
            'modid' => $modid,
            'name' => 'What\'s your email?',
            'description' => 'In this module, we are requesting the email address individually.',
            'headings' => [
                [
                    'subject' => 'Your Email Address',
                    'body' => '<p>You can send us your email address if you\'d like, or you can test the <span class="font-weight-bold">callback</span></p>.',
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
            'ondismiss' => 'callback:testCallback',
            'buttonsubmit' => 'Send',
            'buttondismiss' => 'Callback',
        ])
        ->As('yourEmailAddress');

    $resource
        ->Store('yourEmailAddress')
        ->Data(
            $api->_yourEmailAddress()
        );
}