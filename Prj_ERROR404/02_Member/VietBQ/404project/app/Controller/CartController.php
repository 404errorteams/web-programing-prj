<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('EbookController', 'COntroller');

class CartController extends EbookController {

    public $name = 'Cart';
    public $uses = array('Book', 'User', 'Bought');

    public function cart($id_user) {
        if ($user = $this->User->find('first', array('conditions' => array('id_user' => $id_user)))) {

            $user_session = $this->Session->read(SESSION_USER);
            if ($user_session) {
                $this->paginate = array(
                    'limit' => 5,
                    'fields' => array('Book.*', 'Bought.*'),
                    'conditions' => array(
                        'Bought.id_user' => $id_user
                    ),
                    'joins' => array(
                        array(
                            'table' => 'book',
                            'alias' => 'Book',
                            'foreignKey' => false,
                            'conditions' => array('Book.id_book = Bought.id_book')
                        ),
                    ),
                    'order' => array('Bought.updated_datetime' => 'desc')
                        )
                ;
                 $your_cart = $this->paginate('Bought');
                $this->set('YourCart',$your_cart);
            } else {
                $this->redirect(ROOT_URL . 'user/register?returnurl=' . urlencode(RETURN_URL));
            }
        }
    }

    public function sent_code_pay($id_user, $id_book) {
        
    }

    public function add_cart($id_user, $id_book) {
        $this->autoRender = FALSE;
        if ($user = $this->User->find('first', array('conditions' => array('id_user' => $id_user)))) {
            if ($book = $this->Book->find('first', array('conditions' => array('id_book' => $id_book)))) {
                $user_session = $this->Session->read(SESSION_USER);
                if ($user_session) {
                    $this->Bought->save(array(
                        'id_user' => $id_user,
                        'id_book' => $id_book
                    ));
                    $this->redirect(ROOT_URL . 'cart/cart/' . $id_user);
                } else {
                    $this->redirect(ROOT_URL . 'user/register?returnurl=' . urlencode(RETURN_URL));
                }
            }
        }
    }

}
