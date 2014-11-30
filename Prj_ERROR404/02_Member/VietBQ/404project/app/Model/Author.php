<?php

App::uses('AppMoldel', 'Model');

class Author extends AppModel {

    public $name = 'Author';
    public $useTable = 'author';
    var $primaryKey = 'id_author';
    public $validate = array(
        'id_author' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Id is required'
            ),
            'That username has already been taken' => array(
                'rule' => 'isUnique',
                'message' => 'That Id has already been taken.'
            )
        ),
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'name is required'
            )
        ),
         'biography' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Biography is required'
            )
        )
    );

}

;
