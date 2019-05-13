<?php
namespace FormSynergy\modules;
/**
 * Hello again module.
 */
function helloAgain_create($api, $resource, $data, $siteid, $modid)
{
    $api->Create('module')
            ->Attributes([
                'siteid' => $siteid,
                'modid' => $modid,
                'name' => 'Hello Again',
                'description' => 'This module will try to engage with visitors.',
                'headings' => [
                    [
                        'subject'   => 'Hello again',
                        'body'      => '<p>The previously displayed contact form was broken down into multiple interactions.</p>
                                        <p>In this demo we will only emphasize on the email address.</p>',
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

            ])->As('helloAgain');

    $resources
        ->Store('helloAgain')
        ->Data(
            $api->_helloAgain()
        );
}