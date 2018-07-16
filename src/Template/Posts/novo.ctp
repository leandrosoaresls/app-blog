<?php
    echo $this->Form->create($post, ['url' =>['controller' => 'posts', 'action' => 'salva']]);
    echo $this->Form->input('id');
    echo $this->Form->input('titulo');
    echo $this->Form->input('body');
    echo $this->Form->button('Postar');
    echo $this->Form->end();

?>