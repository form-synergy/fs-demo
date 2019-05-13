<?php
namespace FormSynergy\objectives;
/**
 * News letter subscription objective.
 */
function obs_newsLetterSubscription_create( $api, $resource, $data, $siteid, $modid, $moduleid ) 
{
    $api->Create('objective')
        ->Attributes([
            'siteid' => $siteid,
            'modid' => $modid,
            'label' => 'News Letter Subscription Requests',
            'notificationmethod' => 'email',
            'limittomodule' => $moduleid,
            'recipient' => $data['contact'],
        ])->As('obsNewsLetterSubscription');

    $resources
        ->Store('obsNewsLetterSubscription')
        ->Data($api->_obsNewsLetterSubscription()
    );
}