<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> <!--Copyright 2016 nk9mhp <nk9mhp@DESKTOP-LOGHESU> alessandroverao-->
<head>
<?php include("../php/seguridad.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Usuarios</title>
<LINK rel="icon" href="../favicon.ico" />
<link href="../css/estilo.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/myjavaUsuarios.js"></script>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
</head>
<body>
    <header><big><strong><font color="#333333">USUARIOS</strong></big></header>
    <section>
    <table border="0" align="center">
        <tr>
            <td width="100"><button id="nuevo-usu" class="btn btn-primary">Nuevo</button></td>
            <td witdh="200"><form><button id="volver" class="btn btn-primary"  onclick="history.back()">Volver</button></form></td>
        </tr>
    </table>
    </section>

    <div class="registros" id="agrega-registros">
        <table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="300">Usuario</th>
                <th width="300">Estado</th>
                <th width="300">Privilegio</th>
                <th width="50">Opciones</th>
            </tr>
        <?php
            include('../php/conexion.php');
            $registro = mysql_query("SELECT * FROM usuarios, estados, privilegios WHERE estado = idestado AND privilegio = idprivilegios AND iduso > 1 ORDER BY privilegio ASC"); 
            while($registro2 = mysql_fetch_array($registro)){
                echo '<tr>
                        <td>'.$registro2['idusuario'].'</td>
                        <td>'.$registro2['nombestado'].'</td>
                        <td>'.$registro2['nombprivi'].'</td>
                        <td><a href="javascript:editarUsu('.$registro2['iduso'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarUsu('.$registro2['iduso'].');" class="glyphicon glyphicon-remove-circle"></a></td>
                    </tr>';       
            }
        ?>
        </table>
    </div>
    <!-- MODAL PARA EL REGISTRO DE PROVEEDORES-->
    <div class="modal fade" id="registra-usu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registrar o editar un Usuario</b></h4>
            </div>
            <form id="formulario" class="formulario" onsubmit="return agregaRegistro();">
            <div class="modal-body">
                <table border="0" width="100%">
                     <tr>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-usu" name="id-usu" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
                    </tr>
                     <tr>
                        <td width="150">Proceso: </td>
                        <td><input type="text" required="required" readonly="readonly" id="pro" name="pro"/></td>
                    </tr>
                    <tr>
                        <td>Usuario: </td>
                        <td><input type="text" required="required" name="usuario" id="usuario" pattern="[A-Za-z0-9]{5,35}" placeholder="5-35 Ej.: martin"/></td>
                    </tr>
                    <tr>
                        <td>Contraseña: </td>
                        <td><input type="password" required="required" name="clave" id="clave" placeholder="5-35 Ej.: 12345"/></td>
                    </tr>
                    <tr>
                        <td>Estado: </td>
                    <?php  
                    include('../php/conexion2.php');
                    $registro = mysql_query("SELECT nombestado FROM estados ORDER BY nombestado ASC");    
                    ?>
                        <td><select required="required" name="estado" id="estado">
                    <?php 
                    while($registro2 = mysql_fetch_array($registro)){ 
                    ?>
                    <option value="<?php echo $registro2['nombestado']?>"> <?php echo $registro2['nombestado'] ?></option>
                    <?php } 
                    ?> 
                            </select></td>
                    </tr>
                    <tr>
                        <td>Privilegios: </td>
                    <?php  
                    include('../php/conexion2.php');
                    $registro = mysql_query("SELECT nombprivi FROM privilegios ORDER BY nombprivi ASC");    
                    ?>
                        <td><select required="required" name="pri" id="pri">
                    <?php 
                    while($registro2 = mysql_fetch_array($registro)){ 
                    ?>
                    <option value="<?php echo $registro2['nombprivi']?>"> <?php echo $registro2['nombprivi'] ?></option>
                    <?php } 
                    ?> 
                            </select></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="mensaje"></div>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="modal-footer">
                <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
            </div>
            </form>
          </div>
        </div>
      </div>
      <br></br>
</body>
</html>
