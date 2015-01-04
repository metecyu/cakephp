<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('PostsController', 'Controller');

class PostsController extends AppController {
	public $components = array('Session'); 
    public $helpers = array('Html', 'Form');

    public function index() {
        $this->set('posts', $this->Post->find('all'));
    }// end index

	public function view($id = null) {  
		$this->Post->id = $id;  
		$this->set('post', $this->Post->read());  
	}  
	public function add() {
		 $this->log('add 11111111', LOG_DEBUG); 
         if ($this->request->is('post')) {
	 		 $this->log('add 222222', LOG_DEBUG); 
             $this->Post->create();
             if ($this->Post->save($this->request->data)) {
                 $this->Session->setFlash('Your post has been saved.');
                 $this->redirect(array('action' => 'index'));
             } else {
                 $this->Session->setFlash('Unable to add your post.');
             }
         }
     }

	 function edit($id = null) {  
		$this->Post->id = $id;  
		if ($this->request->is('get')) {  
			$this->request->data = $this->Post->read();  
		} else {  
			if ($this->Post->save($this->request->data)) {  
				$this->Session->setFlash('Your post has been updated.');  
				$this->redirect(array('action' => 'index'));  
			} else {  
				$this->Session->setFlash('Unable to update your post.');  
			}  
		}  
	}  

	function delete($id) {  
		if ($this->request->is('get')) {  
			throw new MethodNotAllowedException();  
		}  
		if ($this->Post->delete($id)) {  
			$this->Session->setFlash('The post with id: ' . $id . ' has been deleted.');  
			$this->redirect(array('action' => 'index'));  
		}  
	}  


}

