<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

class PostsController extends AppController {

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
        } else {
            $msg = "Erro ao criar post";
        }

        $this->set('msg', $msg);
    }


    
}
?>