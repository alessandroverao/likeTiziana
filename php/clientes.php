<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> <!--Copyright 2016 nk9mhp <nk9mhp@DESKTOP-LOGHESU> alessandroverao-->
<head>
<?php include("../php/seguridad.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Clientes</title>
<LINK rel="icon" href="../favicon.ico" />
<link href="../css/estilo.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/myjavaClientes.js"></script>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
</head>
<body>
    <header><big><strong><font color="#333333">CLIENTES</strong></big></header>
    <section>
    <table border="0" align="center">
        <tr>
            <td width="335"><input type="text" placeholder="Buscar un cliente por: Nombre o Tipo" id="bs-clien" autofocus/></td>
            <td width="100"><button id="nuevo-clien" class="btn btn-primary">Nuevo</button></td>
            <td witdh="200"><form><button id="volver" class="btn btn-primary" onclick="history.back()">Volver</button></form></td>
        </tr>
    </table>
    </section>

    <div class="registros" id="agrega-registros">
        <table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="300">Nombre</th>
                <th width="200">Tipo</th>
                <th width="300">Dirección</th>
                <th width="200">Celular</th>
                <th width="150">F. Registro</th>
                <th width="200">CUIL</th>
                <th width="300">Email</th>
                <th width="50">Opciones</th>
            </tr>
        <?php
            include('../php/conexion.php');
            $registro = mysql_query("SELECT * FROM clientes, tipoclientes WHERE tipo_clien = id_tipo_client ORDER BY nomb_clien ASC"); 
            while($registro2 = mysql_fetch_array($registro)){
                echo '<tr>
                        <td>'.$registro2['nomb_clien'].'</td>
                        <td>'.$registro2['tipo_cliente_tipo'].'</td>
                        <td>'.$registro2['direccion_clien'].'</td>
                        <td>'.$registro2['celular_clien'].'</td>
                        <td>'.fechaNormal($registro2['fecha_reg_clien']).'</td>
                        <td>'.$registro2['cuil_clien'].'</td>
                        <td>'.$registro2['email_clien'].'</td>
                        <td><a href="javascript:editarCliente('.$registro2['id_clien'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarCliente('.$registro2['id_clien'].');" class="glyphicon glyphicon-remove-circle"></a></td>
                    </tr>';       
            }
        ?>
        </table>
    </div>
    <!-- MODAL PARA EL REGISTRO DE CLIENTES-->
    <div class="modal fade" id="registra-cliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registrar o editar un cliente</b></h4>
            </div>
            <form id="formulario" class="formulario" onsubmit="return agregaRegistro();">
            <div class="modal-body">
                <table border="0" width="100%">
                     <tr>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-clien" name="id-clien" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
                    </tr>
                     <tr>
                        <td width="150">Proceso: </td>
                        <td><input type="text" required="required" readonly="readonly" id="pro" name="pro"/></td>
                    </tr>
                    <tr>
                        <td>Nombre: </td>
                        <td><input type="text" required="required" name="nombre" id="nombre" pattern="[A-Za-z  ]{5,35}" placeholder="5-35" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/></td>
                    </tr>
                    <tr>
                        <td>Tipo: </td>
                    <?php  
                    include('../php/conexion2.php');
                    $registro = mysql_query("SELECT tipo_cliente_tipo FROM tipoclientes ORDER BY tipo_cliente_tipo ASC");    
                    ?>
                        <td><select required="required" name="tipo" id="tipo">
                    <?php 
                    while($registro2 = mysql_fetch_array($registro)){ 
                    ?>
                    <option value="<?php echo $registro2['tipo_cliente_tipo']?>"> <?php echo $registro2['tipo_cliente_tipo'] ?></option>
                    <?php } 
                    ?> 
                            </select></td>
                    </tr>
                    <tr>
                        <td>Dirección: </td>
                        <td><input type="text" required="required" name="direccion" id="direccion" pattern="[A-Za-z 0-9._%+-]{5,50}" placeholder="Av. San Martin 2555" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/></td>
                    </tr>
                    <tr>
                        <td>Celular: </td>
                        <td><input type="tel"  required="required" name="celular" id="celular" pattern="[0-9]{8,13}" placeholder="NO 0-15"/></td>
                    </tr>
                    <tr>
                        <td>CUIL: </td>
                        <td><input type="text"  required="required" name="cuil" id="cuil" pattern="[0-9]{10,11}" placeholder="00-00000000-0"/></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><input type="email"  required="required" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="cliente@gmail.com"/></td>
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
