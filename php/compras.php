<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> <!--Copyright 2016 nk9mhp <nk9mhp@DESKTOP-LOGHESU> alessandroverao-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Compras</title>
<LINK rel="icon" href="../favicon.ico" />
<link href="../css/estilo.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/myjavaCompras.js"></script>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script>
</script>
</head>
<body>
    <header><big><strong><font color="#333333">COMPRAS</strong></big></header>
    <section>
    <table border="0" align="center">
        <tr>
            <td width="100"><button id="nuevo-comp" class="btn btn-primary">Nuevo</button></td>
            <td witdh="200"><form><button id="volver" class="btn btn-primary"  onclick="history.back()">Volver</button></form></td>
        </tr>
    </table>
    </section>

    <div class="registros" id="agrega-registros">
        <table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="200">Proveedor</th>
                <th width="200">Importe</th>
                <th width="200">Fecha</th>
                <th width="50">Opciones</th>
            </tr>
        <?php
            include('../php/conexion.php');
            $registro = mysql_query("SELECT * FROM compras, proveedores WHERE id_prove = id_provee_compra ORDER BY id_compra DESC"); 
            while($registro2 = mysql_fetch_array($registro)){
                echo '<tr>
                        <td>'.$registro2['nomb_prove'].'</td>
                        <td>$ '.$registro2['importe_compra'].'</td>
                        <td>'.fechaNormal($registro2['fecha_compra']).'</td>
                        <td><a href="javascript:editarCompra('.$registro2['id_compra'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarCompra('.$registro2['id_compra'].');" class="glyphicon glyphicon-remove-circle"></a></td>
                    </tr>';      
            }
        ?>
        </table>
    </div>
   <!-- <center>
        <ul class="pagination" id="pagination"></ul>
    </center>
    MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-comp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registrar o editar una compra</b></h4>
            </div>
            <form id="formulario" name="form1" class="formulario" onsubmit="return agregaRegistro();">
            <div class="modal-body">
                <table border="0" width="100%">
                     <tr>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-prod" name="id-prod" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
                    </tr>
                     <tr>
                        <td width="150">Proceso: </td>
                        <td><input type="text" required="required" readonly="readonly" id="pro" name="pro"/></td>
                    </tr>
                    <?php 
                        include('../php/conexion2.php');
                        $registro = mysql_query("SELECT nomb_prove FROM proveedores ORDER BY nomb_prove ASC");    
                    ?>
                    <tr>
                        <td>Proveedor: </td>
                        <td><select required="required" name="proveedor" id="proveedor">
                            <?php 
                            while($registro2 = mysql_fetch_array($registro)){ ?>

                            <option value="<?php echo $registro2['nomb_prove']?>"> <?php echo $registro2['nomb_prove'] ?>  </option>
                            <?php }    ?>        
                        </select></td>
                    </tr>  <!--******************************************************************-->
                   <tr>
                        <td>Importe: </td>
                        <td><input type="number"  required="required" name="importe_compra" id="importe_compra" pattern="[0-9]{1,10}+\,[0-9]{1,2}$" placeholder="$0.00" step="any" /></td>
                    </tr>
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
</body>
</html>
