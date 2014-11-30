<?php

App::uses('AppModel', 'Model');

class Book extends AppModel{
    
    public $name = 'Book';
    public $useTable = 'book';
    public $primaryKey = 'id_book';
}