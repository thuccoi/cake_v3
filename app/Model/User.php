<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
    
    function getListGroup()
    {
        $group = array
        (
            GROUP_ADMIN => __('GroupAdmin',true),
            GROUP_USER => __('GroupUser',true),
            GROUP_MEMBER => __('GroupMember',true)
        );
        return $group;
    }

}
