<link rel="stylesheet" href="css/check.css">
<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Foto de perfil</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Correo electronico</th>
                <th>Telefono</th>
                <th>Acceso al sistema</th>
                <th>Habilitar / deshabilitar acceso</th>
                <th>Fecha de creación</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empleados as $empleado): ?>
            <tr>
                <td>
                    <input type="hidden" value="<?=$empleado['id']?>" class="id-usuario">
                    <?php $img = $empleado['foto_perfil'] ? $empleado['foto_perfil'] : 'No tiene foto'?>
                    <img src="<?=$img?>" height="50" alt="" class="imagen">
                </td>
                <td><?=$empleado['nombre']?></td>
                <td><?=$empleado['usuario']?></td>
                <td><?=$empleado['correo'] ? $empleado['correo'] : 'No tiene correo'?></td>
                <td><?=$empleado['telefono'] ? $empleado['telefono'] : 'No tiene telefono'?></td>
                <td>
                    <?php if ($empleado['habilitado'] == 1): ?>
                    <label class="text-success habilitar"><i class="fa fa-check-circle" aria-hidden="true"></i>
                        Habilitado</label>

                    <label class="text-danger deshabilitar" style="display:none"><i class="fas fa-user-lock"></i>
                        Deshabilitado</label>
                    <?php endif;?>
                    <?php if ($empleado['habilitado'] != 1): ?>
                    <label class="text-danger deshabilitar"><i class="fas fa-user-lock"></i>
                        Deshabilitado</label>
                    <label class="text-success habilitar" style="display:none"><i class="fa fa-check-circle"
                            aria-hidden="true"></i>
                        Habilitado</label>
                    <?php endif;?>
                </td>
                <td>
                    <?php if ($empleado['habilitado'] == 1): ?>
                    <input type="checkbox" name="" id="" checked class="habilitar">
                    <?php endif;?>
                    <?php if ($empleado['habilitado'] != 1): ?>
                    <input type="checkbox" name="" id="" class="habilitar">
                    <?php endif;?>
                </td>
                <td><?=$empleado['fecha_creacion']?></td>
                <td>
                    <form action="editar-empleado" method="post">
                        <input type="hidden" name="id" value="<?=$empleado['id']?>">
                        <button type="submit" class="btn btn-warning"><i class="fas fa-user-edit"></i></button>
                    </form>
                </td>
                <td>
                    <button type="button" class="btn btn-danger eliminar"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<script src="js/listaEmpleados.js"></script>
<script src="js/zoom.js"></script>