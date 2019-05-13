<?php
namespace FormSynergy\modules;
/**
 * Don't want to share my email module.
 */
function dontWantToShareMyEmail_create($api, $resource, $data, $siteid, $modid)
{
    $api->Create('module')
            ->Attributes([
                'siteid' => $siteid,
                'modid' => $modid,
                'name' => 'Dont want to share',
                'description' => 'This module will try to engage with visitors.',
                'headings' => [
                    [
                        'subject'   => 'Don\'t what to share your email!',
                        'body'      => '<p>We can understand!</p>
                                        <p class="strong">What if your were asked nicely?</p>
                                        <p class="font-weight-bold text-secondary">Click on the <span class="font-weight-bold text-primary">Maybe button</span></p>',
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

    $resources
        ->Store('dontWantToShareMyEmail')
        ->Data(
            $api->_dontWantToShareMyEmail()
        );
}