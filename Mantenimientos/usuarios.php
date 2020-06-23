<?php
//include '../Template/menu.php';

include '../Template/header.php';

?>


<div class="container " style="padding-top:5%;">
    <div class="row"> 
        <div class="col-lg-12 text-center">
            <h1>Usuarios</h1>
        </div>
    </div>
</div>
<br>

<?php
$sql = "select * from usuario u 
        Inner join rol r
        on u.id_rol=r.id_rol
        where u.estado='A'";

$sqlQuery = $pdo->prepare($sql);
$sqlQuery->execute();
$resultado1 = $sqlQuery->fetchAll();
?>
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="<?php echo $baseUrl?>/Template/js/bootstrap-table-pagination.js"></script>
<script src="<?php echo $baseUrl?>/Template/js/pagination.js"></script>
-->
<div class="container">
    <div class="row"> 
        <div class="table-responsive col-lg-12 text-centre">
            <a href="agregarUsuario.php" class="btn btn-primary">Agregar</a>
            <table class="table table-bordered">

                <tr><th>Imagen</ta>

                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Dirección</th>

                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th class="text-center">Estado</th>
                    <td class="text-center"> Acciones</td>
                </tr> 

                <?php
                $num = 1;
                foreach ($resultado1 as $res1) {
                    ?>
                    <tr>

                        <td class="text-center"><img src='mostrar_imagen.php?id=<?php echo $res1['id_usuario']; ?> ' width="70"/></td>

                        <td><?php echo $res1['id_usuario']; ?></td>
                        <td><?php echo $res1['nombres']; ?></td>
                        <td><?php echo $res1['dni']; ?></td>
                        <td><?php echo $res1['direccion']; ?></td>

                        <td><?php echo $res1['telefono']; ?></td>
                        <td><?php echo $res1['email']; ?></td>
                        <td><?php echo $res1['descripcion']; ?></td>
                        <td class="text-center"><?php
                if ($res1['estado'] == 'A') {

                    echo "<span class='badge badge-primary'>Activo</span>";
                } else {
                    echo "<span class='badge badge-primary'>Inactivo</span>";
                }
                    ?></td>
                        <td class="text-center" colspan="1">
                            <a href="agregarUsuario.php?codigo=<?php echo $res1['id_usuario']; ?>"> <i id="edit" title="Editar" class="fa fa-edit text-center" ></i></a>
                            <a href="Controlador/Usuarios.php?codigo=<?php echo $res1['is_usuario']; ?>"><i id="borrar" title="Eliminar" class="fa fa-trash"></i></a>
                        </td>

                    </tr>
                    <?php
                    $num++;
                }
                ?>
            </table>
        </div>
    </div>
    <?php if (@$_SESSION['MensajeEliminar'] == 'OK') { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Registro Eliminado
            <button type="button" class="close"  data-dismiss="alert" aria-label="Close"><span aria-hidden="true" >&times;</span></button>
        </div>

        <?php
        $_SESSION['MensajeEliminar'] = '';
    } else {

        $_SESSION['MensajeEliminar'] = '';
    }
    ?>
    <?php if (@$_SESSION['MensajeAgregar'] == 'OK') { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Registro Guardado
            <button type="button" class="close"  data-dismiss="alert" aria-label="Close"><span aria-hidden="true" >&times;</span></button>
        </div>

        <?php
        $_SESSION['MensajeAgregar'] = '';
    } else {

        $_SESSION['MensajeAgregar'] = '';
    }
    ?>

    <?php if (@$_SESSION['MensajeModificar'] == 'OK') { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Registro Modificado
            <button type="button" class="close"  data-dismiss="alert" aria-label="Close"><span aria-hidden="true" >&times;</span></button>
        </div>

        <?php
        $_SESSION['MensajeModificar'] = '';
    } else {

        $_SESSION['MensajeModificar'] = '';
    }
    ?>


    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
   -->

</div>
<?php
include '../Template/footer.php';
?>