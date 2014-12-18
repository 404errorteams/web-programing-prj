<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('EbookController', 'Controller');

class AuthorController extends EbookController {

    public $name = 'Author';
    public $uses = array('Author', 'Book', 'Wrote');

    public function author_detail($id_author) {
        if ($author = $this->Author->find('first', array('conditions'=>array('id_author' => $id_author)))) {
            $this->set('title_for_layout', $author['Author']['name']);
            $this->set('Author', $author);
            $relate_book = $this->Book->find('all', array(
                'fields' => array('Book.*'),
                'joins' => array(
                    array(
                        'table' => 'wrote',
                        'alias' => 'Wrote',
                        'foreignKey' => false,
                        'conditions' => array('Wrote.id_author' => $id_author)
                    ),
                ),
                'limit' => 10
                    )
            );
            if ($relate_book) {
                $this->set('RelateBook', $relate_book);
            }
        } else {
            $this->redirect(ROOT_URL . 'book/index');
        }
    }

    public function list_view_author() {
        $this->set('title_for_layout', 'Author Listing');
        $this->paginate = array(
            'limit' => 9,
            'page' => 1,
            'order' => array('Author.created_datetime' => 'desc'),
        );
        $Authors = $this->paginate('Author');
        $this->set('Authors', $Authors);
    }

}
