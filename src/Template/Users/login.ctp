<h1>Acesso ao sistema</h1>
<?php
    echo $this->Form->create($user);
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->button('Acessar');
    echo $this->Form->end();
?>