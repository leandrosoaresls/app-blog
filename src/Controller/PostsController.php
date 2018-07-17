<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Event\Event;

class PostsController extends AppController {

    public function beforeFilter(Event $event ) {
        parent::beforeFilter($event);

        $this->Auth->allow(['index']);
    }


    public function index() {

        $postsTable = TableRegistry::get('Posts');
        $posts = $postsTable->find('all');
        
        $this->set('posts', $posts);
        
    }

    public function editar($id) {
        $postsTable = TableRegistry::get('Posts');

        $post = $postsTable->get($id);

        $this->set('post', $post);
        
        $this->render('novo');
        
    }
    

    public function novo() {
        $postsTable = TableRegistry::get('Posts');

        $post = $postsTable->newEntity();

        $this->set('post', $post);
        
    }

    public function salva() {
        $postsTable = TableRegistry::get('Posts');

        $post = $postsTable->newEntity($this->request->data());

        if ($postsTable->save($post)) {
            $msg = "Post criado com sucesso";
            $this->Flash->set($msg,['element' => 'success']);
        } else {
            $msg = "Erro ao criar post";
            $this->Flash->set($msg,['element' => 'error']);
        }

        $this->redirect('Posts/index');
    }

    public function apagar($id) {
        $postsTable = TableRegistry::get('Posts');

        $post = $postsTable->get($id);

        if ($postsTable->delete($post)) {
            $msg = "Post removido com sucesso!";
            $this->Flash->set($msg, ['element'  => 'error']);
        } else {
            $msg = "Erro ao remover o post";
            $this->Flash->set($msg);
        }

        $this->redirect('Posts/index');
    }


    
}
?>