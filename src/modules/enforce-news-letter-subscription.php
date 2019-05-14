<?php
namespace FormSynergy\modules;
/**
 * Enforce news letter subscription module.
 */
function enforceNewsLetterSubscription_create($api, $resource, $data, $siteid, $modid)
{
    $api->Create('module')
        ->Attributes([
            'siteid' => $siteid,
            'modid' => $modid,
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
            'onsubmit' => $api->_newsLetterSubscription('moduleid'),

            'buttondismiss' => 'No thank',

            // Set dismiss response
            'dismiss' => 'Thanks for the visit',

        ])->As('enforceNewsLetterSubscription');

    $resource
        ->Store('enforceNewsLetterSubscription')
        ->Data(
            $api->_enforceNewsLetterSubscription()
        );
}