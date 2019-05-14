<?php
namespace FormSynergy\modules;
/**
 * News letter subscription module.
 */
function newsLetterSubscription_create( $api, $resource, $data, $siteid, $modid ) 
{
    $api->Create('module')
        ->Attributes([
            'siteid' => $siteid,
            'modid' => $modid,
            'name' => 'News Letter Subscription',
            'description' => 'This module will request an email address for news letter purposes.',
            'headings' => [
                [
                    'subject' => 'News Letter Subscription'
                ]
            ],
            'events' => [
                ['type' => 'instant'],
            ],
            'form' => [[
                'x' => 1,
                'type' => 'email',
                'system' => 'email',
                'label' => 'Email Address',
                'name' => 'email',
                'class' => 'form-control'
            ]],
            // If submitted, display success message
            'success' => 'Thank you subscribing.',
        ])->As('newsLetterSubscription');

    $resource
        ->Store('newsLetterSubscription')
        ->Data(
            $api->_newsLetterSubscription()
        );
}

function newsLetterSubscription_update( $api, $resource, $data, $siteid, $modid ) 
{
    $api->Get('module')
            ->Where([
                'moduleid' => $resource->Find('moduleid')->In('newsLetterSubscription'),
            ])
            ->Update([
                // If dismissed, connect to Enforce news letter subscription
                'ondismiss' => $api->_enforceNewsLetterSubscription('moduleid'),
            ])
            ->As('newsLetterSubscription');

    $resource
        ->Update('newsLetterSubscription')
        ->Data(
            $api->_newsLetterSubscription()
        );
}