<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

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
        $userTable = TableRegistry::get('Users');

        $user = $userTable->newEntity();

        $this->set('user', $user);

    }

}


?>