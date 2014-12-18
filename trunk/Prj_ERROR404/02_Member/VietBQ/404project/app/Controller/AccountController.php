<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('EbookController','Controller');

class AccountController extends EbookController{
    public $name = 'Account';
    public function index(){
        $this->redirect('login');
    }
    public function login(){
        
    }
    public function cart(){
        
    }
}
        