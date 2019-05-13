<?php
namespace FormSynergy\modules;
/**
 * Contact form module.
 */
function contactForm_create( $api, $resource, $data, $siteid, $modid ) 
{
    $api->Create('module')
        ->Attributes([
            'siteid' => $siteid,
            'modid' => $modid,
            'name' => 'Contact Form',
            'headings' => [
                [
                    'subject' => 'Contact Us'
                ]
            ],
            'form' => [[
                'x' => 1,
                'type' => 'text',
                'system' => 'fname',
                'label' => 'First Name',
                'name' => 'fname',
                'class' => 'form-control',
                'validation' => 'yes',
                'validationType' => 'fname'
            ],
            [
                'x' => 2,
                'type' => 'text',
                'system' => 'lname',
                'label' => 'Last Name',
                'name' => 'lname',
                'class' => 'form-control',
                'validation' => 'yes',
                'validationType' => 'lname'
            ],
            [
                'x' => 3,
                'type' => 'email',
                'system' => 'email',
                'label' => 'Email Address',
                'name' => 'email',
                'class' => 'form-control',
                'validation' => 'yes',
                'validationType' => 'email'
            ],
            [
                'x' => 4,
                'type' => 'tel',
                'system' => 'mobile',
                'label' => 'Phone Number',
                'name' => 'mobile',
                'class' => 'form-control',
                'validation' => 'yes',
                'validationType' => 'mobile'
            ],
            [
                'x' => 5,
                'type' => 'textarea',
                'system' => 'custom',
                'label' => 'Message',
                'name' => 'message',
                'class' => 'form-control h-3',
                'validation' => 'yes',
                'validationType' => 'paragraph'
            ]],
            'ondismiss' => $api->_itWorks('moduleid'),
            // Set responses
            'success' => 'Thank you for contacting us',
            'dismiss' => 'Thanks for the visit',
        ])->As('contactForm');

    $resource
        ->Store('contactForm')
        ->Data(
            $api->_contactForm()
        );
}