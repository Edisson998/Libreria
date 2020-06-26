<?php
include './Template/template.php';
?>

<?php
?>

<div class="container " style="padding-top:5%;">
    <div class="row"> 
        <div class="col-lg-12 text-center">
            <h1>Listar Autores</h1>
        </div>
    </div>
</div>
<br>

<?php
$sql = "select * from usuario u 
        Inner join rol r
        on u.rol=r.cod
        where u.estado='A'";

$sqlQuery = $pdo->prepare($sql);
$sqlQuery->execute();
$resultado1 = $sqlQuery->fetchAll();
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/bootstrap-table-pagination.js"></script>
<script src="js/pagination.js"></script>
<div class="container">
    <div class="row"> 
        <div class="table-responsive col-lg-12 text-centre">
            <a href="agregarUsuario.php" class="btn btn-primary">Agregar</a>
            <table class="table table-bordered">

                <tr><th>Imagen</ta>
                    <th>Nº</th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th class="text-center">Estado</th>
                    <td class="text-center"> Acciones</td>
                </tr> 

                <?php
                $num = 1;
                foreach ($resultado1 as $res1) {
                    ?>
                    <tr>
                        
                        <td class="text-center"><img src='mostrar_imagen.php?id=<?php echo $res1['CODIGO'];?> ' width="70"/></td>
                        <td><?php echo $num; ?></td>
                        <td><?php echo $res1['CODIGO']; ?></td>
                        <td><?php echo $res1['NOMBRE']; ?></td>
                        <td><?php echo $res1['USUARIO']; ?></td>
                        <td><?php echo $res1['DESCRIPCION']; ?></td>
                        <td class="text-center"><?php
                            if ($res1['ESTADO'] == 'A') {

                                echo "<span class='badge badge-primary'>Activo</span>";
                            } else {
                                echo "<span class='badge badge-primary'>Inactivo</span>";
                            }
                            ?></td>
                        <td class="text-center" colspan="1">
                            <a href="agregarUsuario.php?codigo=<?php echo $res1['CODIGO']; ?>"> <i id="edit" title="Editar" class="fa fa-edit text-center" ></i></a>
                            <a href="Controlador/Usuarios.php?codigo=<?php echo $res1['CODIGO']; ?>"><i id="borrar" title="Eliminar" class="fa fa-trash"></i></a>
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


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


</div>