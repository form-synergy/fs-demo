<?php
namespace FormSynergy\modules;
/**
 * Whats your email module.
 */
function whatsYourEmail_create($api, $resource, $data, $siteid, $modid)
{
    $api->Create('module')
        ->Attributes([
            'siteid' => $siteid,
            'modid' => $modid,
            'name' => 'What\'s your email',
            'description' => 'This module will try to engage with visitors.',
            'headings' => [
                [
                    'subject'   => 'What\'s your email',
                    'body'      => '<p>Let\'s assume that you don\'t what to share your email address!</p>
                                    <p class="text-primary">Click on the <span class="font-weight-bold text-secondary">Dismiss button</span></p>',
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
            'ondismiss'     => $api->_dontWantToShareMyEmail('moduleid'),
            'buttonsubmit'  => 'Submit',
            'buttondismiss' => 'Dismiss',
        ])
        ->As('whatsYourEmail');

    $resources
        ->Store('whatsYourEmail')
        ->Data(
            $api->_whatsYourEmail()
        );
}