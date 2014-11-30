<?php

App::uses('AppModel', 'Model');

class User extends AppModel {

    public $name = 'User';
    public $useTable = 'user';
    var $primaryKey = 'id_user';
      public $validate = array(
        'id_user' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A Id is required'
            ),
            'That username has already been taken' => array(
                'rule' => 'isUnique',
                'message' => 'That id has already been taken.'
            )
        ),
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            ),
            'That username has already been taken' => array(
                'rule' => 'isUnique',
                'message' => 'That username has already been taken.'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
            
        ),
        
        'birth'=>array(
            'Date time' => array(
                'rule'=> 'date',
                'message' => 'That birthday not date type'
            )
        ),
        'email' => array(
            'Valid email' => array(
                'rule' => 'email',
                'message' => 'Please enter a valid email address'
            )
        ),'balance' => array(
            'Valid balance' => array(
                'rule' => 'numeric',
                'message' => 'Please enter numeric'
            )
        )
    );

   
}
