<ul>
    <?php foreach ($usuario as $user): ?>
    <li><?=$user['nombre']?></li>
    <li><?=$user['usuario']?></li>
    <li><?=$user['genero']?></li>
    <?php endforeach;?>
</ul>