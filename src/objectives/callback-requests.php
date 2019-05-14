<?php
namespace FormSynergy\objectives;
/**
 * Callback requests objective.
 */
function obs_callbackRequests_create( $api, $resource, $data, $siteid, $modid, $moduleid ) 
{
    $api->Create('objective')
        ->Attributes([
            'siteid' => $siteid,
            'modid' => $modid,
            'label' => 'Callback Requests',
            'notificationmethod' => 'email',
            'limittomodule' => $moduleid,
            'recipient' => $data['contact'],
        ])->As('obsCallbackRequests');

    $resource
        ->Update('obsCallbackRequests')
        ->Data($api->_obsCallbackRequests()
    );
}