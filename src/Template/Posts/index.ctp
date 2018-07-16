<h1>Posts do Blog</h1>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Post</th>
            <th>Ações</th>
        </tr>
    </thead>
    
    <tbody>
        <?php foreach ($posts as $post): ?>
        <tr>
            <td><?=$post['id'];?></td>
            <td><?=$post['titulo'];?></td>
            <td><?=$post['body'];?>
            
            
            </td>
            <td>
                <?php
                echo $this->Html->Link('Editar', ['controller' => 'posts', 'action' => 'editar', $post['id']]);
                ?>
            </td>
        </tr>
        <?php endforeach; ?>        
    </tbody>   

</table>

<?php
    echo $this->Html->Link('Novo Post', ['controller' => 'posts', 'action' => 'novo']);

?>
