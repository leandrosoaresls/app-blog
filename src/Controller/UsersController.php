<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Event\Event;

class UsersController extends AppController {

    public function adicionar() {

        $userTable = TableRegistry::get('Users');

        $user = $userTable->newEntity();
        
        $this->set('user', $user);
    }

    public function salvar() {
        $userTable = TableRegistry::get('Users');

        $user = $userTable->newEntity($this->request->data());

        if ($userTable->save($user)) {
            $this->Flash->set('Usuario cadastrado com sucesso');
        } else {
            $this->Flash->set('Erro ao cadastrar o usuario');
        }

        $this->redirect('Users/Adicionar');

    }

    public function login() {
        if($this->request->is('post')) {
            $user = $this->Auth->identify();

            if($user) {
                $this ->Auth->setUser($user);
                return $this->reditect($this->Auth->redirectUrl());
            } else {
                $this->Flash->set('Usuario ou senha invalidos', ['element' => 'error']);
            }

        }

    }

}


?>