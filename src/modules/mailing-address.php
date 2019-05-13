<?php
namespace FormSynergy\modules;
/**
 * Mailing address module.
 */
function mailingAddress_create( $api, $resource, $data, $siteid, $modid ) 
{
    $api->Create('module')
        ->Attributes([
            'siteid' => $siteid,
            'modid' => $modid,
            'name' => 'What\'s your address?',
            'description' => 'In this module, we are requesting the address individually.',
            'headings' => [
                [
                    'subject' => 'What\'s your address?',
                    'body' => 'Can we have you address please!!!',
                ],
            ],

            // Set event to respond instantly
            'events' => [
                ['type' => 'instant'],
            ],
            'form' => [
                [
                    'x' => 0,
                    'type' => 'text',
                    'system' => 'address',
                    'label' => 'Home Address',
                    'name' => 'address',
                    'class' => 'form-control',
                    /**
                     * Address validation will is handled by the Google Autocomplete for Addresses API
                     * https://developers.google.com/maps/documentation/javascript/places-autocomplete
                     */
                    'validation' => 'yes', // Enable validation
                    'validationType' => 'address',
                ],
            ],

            // Set responses
            'success' => 'Thank you for contacting us',
            'dismiss' => 'Thanks for the visit'
        ])->As('mailingAddress');

    $resources
        ->Store('mailingAddress')
        ->Data(
            $api->_mailingAddress()
        );
}