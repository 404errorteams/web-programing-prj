<?php

App::uses('AppModel', 'Model');

class User extends AppModel {

    public $name = 'User';
    public $useTable = 'user';
    public $primaryKey = 'id_user';
}
