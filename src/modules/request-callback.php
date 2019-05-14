<?php
namespace FormSynergy\modules;
/**
 * Callback request module.
 */
function requestCallback_create( $api, $resource, $data, $siteid, $modid ) 
{
    $api->Create('module')
        ->Attributes([
            'siteid' => $siteid,
            'modid' => $modid,
            'name' => 'Request Callback',
            'description' => 'This module simply requests a phone number. The phone number will be validated by checking if it is in service, and that it can receive text messages.',
            'headings' => [
                [
                    'subject' => 'Request a Callback'
                ]
            ],
            'form' => [[
                'x' => 1,
                'type' => 'tel',
                'system' => 'mobile',
                'label' => 'Phone Number',
                'name' => 'mobile',
                'class' => 'form-control',
                'validation' => 'yes'
            ]],
            'success' => 'Thank you, we will be in touch shortly.',
            'dismiss' => 'Thank you for visiting.'
        ])->As('requestCallback');

    $resource
        ->Store('requestCallback')
        ->Data(
            $api->_requestCallback()
        );
}