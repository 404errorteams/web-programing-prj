<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('EbookController', 'Controller');

class BookController extends EbookController {

    public $name = 'Book';
    public $uses = array('Book', 'Author', 'Wrote', 'OfCategory', 'Category');

    public function index() {
        $this->set('title_for_layout', 'Homepage');
        $book_rand = $this->Book->find('all', array(
            'limit' => 10,
            'fields' => array('Book.*', 'Author.name', 'Author.id_author'),
            'conditions' => array(
                'not' => array('Book.img' => null)
            ),
            'joins' => array(
                array(
                    'table' => 'wrote',
                    'alias' => 'Wrote',
                    'foreignKey' => false,
                    'conditions' => array('Book.id_book = Wrote.id_book')
                ),
                array(
                    'table' => 'author',
                    'alias' => 'Author',
                    'foreignKey' => false,
                    'conditions' => array('Author.id_author = Wrote.id_author')
                ),
            ),
            'order' => 'rand()'
                )
        );
        $this->set('BookRand', $book_rand);
        $new_book = $this->Book->find('all', array('limit' => 20, 'order' => array('Book.updated_datetime DESC')));
        $this->set('NewBook', $new_book);
        $save_book = $this->Book->find('all', array('limit' => 3, 'order' => array('Book.sale DESC')));
        $this->set('SaleBook', $save_book);
        $ebook = $this->Book->find('all', array('conditions' => array('Book.ebook' => 1), 'limit' => 20, 'order' => array('Book.updated_datetime DESC')));
        $this->set('Ebook', $ebook);
        $author = $this->Author->find('first', array('order' => 'rand()'));
        $book_of_author = $this->Book->find('all', array(
            'limit' => 5,
            'conditions' => array(
                "Book.id_book IN (select wrote.id_book from wrote where id_author = '" . $author['Author']['id_author'] . "')"
            )
        ));
        $this->set('Author', $author);
        if ($book_of_author) {
            $featured_book = $book_of_author[0];
            unset($book_of_author[0]);
            $this->set('FeaturedBook', $featured_book);
            $this->set('BookofAuth', $book_of_author);
        }
    }

    public function book_detail($id_book = null) {
        $book = $this->Book->find('first', array(
            'fields' => array('Book.*', 'Author.*'),
            'conditions' => array('Book.id_book' => $id_book),
            'joins' => array(
                array(
                    'table' => 'wrote',
                    'alias' => 'Wrote',
                    'foreignKey' => false,
                    'conditions' => array('Book.id_book = Wrote.id_book')
                ),
                array(
                    'table' => 'author',
                    'alias' => 'Author',
                    'foreignKey' => false,
                    'conditions' => array('Author.id_author = Wrote.id_author')
                ),
            ),
                )
        );
        if ($book) {
            $this->set('title_for_layout', $book['Book']['name']);
            $this->set('Book', $book);
            $relate_book = $this->Book->find('all', array(
                'fields' => array('Book.*'),
                'joins' => array(
                    array(
                        'table' => 'wrote',
                        'alias' => 'Wrote',
                        'foreignKey' => false,
                        'conditions' => array('Wrote.id_author' => $book['Author']['id_author'])
                    ),
                ),
                'limit' => 10
                    )
            );
            if ($relate_book) {
                $this->set('RelateBook', $relate_book);
            }
        } else {
            $this->redirect('book/index');
        }
    }

    public function by_category($id_category) {
        if ($category = $this->Category->find('first', array('conditions' => array('id_category' => $id_category)))) {
            $this->set('title_for_layout', 'Books of ' . $category['Category']['name']);
            $this->paginate = array(
                'fields' => array('Book.*'),
                'limit' => 9,
                'page' => 1,
                'joins' => array(
                    array(
                        'table' => 'ofcategory',
                        'alias' => 'OfCategory',
                        'foreignKey' => false,
                        'conditions' => array('OfCategory.id_book' => 'Book.id_book')
                    ),
                ),
                'order' => array('Book.created_datetime' => 'desc'),
            );
            $Book = $this->paginate('Book');
            $this->set('Books', $Book);
        } else {
            die('fail');
        }
    }

    public function list_view_book() {
        $this->set('title_for_layout', 'Book Store');
        $this->paginate = array(
            'limit' => 9,
            'page' => 1,
            'order' => array('Book.created_datetime' => 'desc'),
        );
        $Book = $this->paginate('Book');
        $this->set('Books', $Book);
    }

}
