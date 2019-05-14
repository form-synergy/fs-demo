<?php
namespace FormSynergy\objectives;
/**
 * Contact Requests objective.
 */
function obs_contactRequests_create( $api, $resource, $data, $siteid, $modid, $moduleid ) 
{
    $api->Create('objective')
        ->Attributes([
            'siteid' => $siteid,
            'modid' => $modid,
            'label' => 'Contact Requests',
            'notificationmethod' => 'email',
            'limittomodule' => $moduleid,
            'recipient' => $data['contact'],
        ])->As('obsContactRequests');

    $resource
        ->Update('obsContactRequests')
        ->Data($api->_obsContactRequests()
    );
}