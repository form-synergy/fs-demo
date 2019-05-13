<?php
namespace FormSynergy\modules;
/**
 * It works module.
 */
function itWorks_create($api, $resource, $data, $siteid, $modid)
{
    $api->Create('module')
        ->Attributes([
            'siteid' => $siteid,
            'modid' => $modid,
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
            'buttondismiss' => ''

        ])->As('itWorks');

    $resources
        ->Store('itWorks')
        ->Data(
            $api->_itWorks()
        );
}