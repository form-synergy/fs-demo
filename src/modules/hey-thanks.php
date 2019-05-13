<?php
namespace FormSynergy\modules;
/**
 * Hey thanks module.
 */
function heyThanks_create($api, $resource, $data, $siteid, $modid)
{
    $api->Create('module')
        ->Attributes([
            'siteid' => $siteid,
            'modid' => $modid,
            'name' => 'Hey thanks',
            'description' => 'This module is the final interaction before displaying the email module',
            'headings' => [
                [
                    'subject' => 'Hey Thanks!',
                    'body'  => '<p> Can we have you email address?</p>
                                <p class="font-weight-bold text-center" style="font-size:1.5rem;">PLEASE</p>
                                <div style="width:100%;height:0;padding-bottom:2rem;position:relative;">
                                    <p class="font-weight-bold text-danger text-center" style="font-size:1.2rem;">Pretty please!</p>
                                </div>',
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

    $resources
        ->Store('heyThanks')
        ->Data(
            $api->_heyThanks()
        );
}