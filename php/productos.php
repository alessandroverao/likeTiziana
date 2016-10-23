<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> <!--Copyright 2016 nk9mhp <nk9mhp@DESKTOP-LOGHESU> alessandroverao-->
<head>
<?php include("../php/seguridad.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Productos</title>
<LINK rel="icon" href="../favicon.ico" />
<link href="../css/estilo.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/myjavaProductos.js"></script>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script>
function porcentajePrecio() {
    var pc = parseFloat(document.getElementById("precio-cost").value);
    var p = parseFloat(document.getElementById("porcentaje").value);
    pu = pc * p;
    pu /= 100;
    pu += pc;
    document.getElementById("precio-uni").value = pu;
} 
function porcentajeAplicado(){
    //{ ( pu - pc ) / pc } * 100 = p
    var pc = parseFloat(document.getElementById("precio-cost").value);
    var pu = parseFloat(document.getElementById("precio-uni").value);
    p = pu - pc;
    p /=  pc;
    p *= 100;
    document.getElementById("porcentaje").value = p;
}
</script>
</head>
<body>
    <header><big><strong><font color="#333333">PRODUCTOS</strong></big></header>
    <section>
    <table border="0" align="center">
        <tr>
            <td width="335"><input type="text" placeholder="Buscar por: Nombre, Cod. Barra o Tipo" id="bs-prod" autofocus/></td>
            <td width="100"><button id="nuevo-producto" class="btn btn-primary">Nuevo</button></td>
            <td witdh="200"><form><button id="volver" class="btn btn-primary"  onclick="history.back()">Volver</button></form></td>
        </tr>
    </table>
    </section>

    <div class="registros" id="agrega-registros">
        <table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="210">Nombre</th>
                <th width="190">Código de Barras</th>
                <th width="150">Tipo</th>
                <th width="100">Precio Costo</th>
                <th width="100">Porcentaje</th>
                <th width="100">Precio Unitario</th>
                <th width="70">Existencia</th>
                <th width="50">Opciones</th>
            </tr>
        <?php
            include('../php/conexion.php');
            $registro = mysql_query("SELECT * FROM productos, tipoproductos WHERE tipo_prod = id_tipo_pro AND nomb_prod != 'VARIOS' ORDER BY nomb_prod ASC"); 
            while($registro2 = mysql_fetch_array($registro)){
                echo '<tr>
                        <td>'.$registro2['nomb_prod'].'</td>
                        <td>'.$registro2['cod_barra'].'</td>
                        <td>'.$registro2['tipo_pro'].'</td>
                        <td>$ '.$registro2['precio_cost'].'</td>
                        <td>'.$registro2['porcentaje_prod'].' %</td>
                        <td>$ '.$registro2['precio_unit'].'</td>
                        <td>'.$registro2['existencia_prod'].'</td>
                        <td><a href="javascript:editarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-remove-circle"></a></td>
                    </tr>';      
            }
        ?>
        </table>
    </div>
   <!-- <center>
        <ul class="pagination" id="pagination"></ul>
    </center>
    MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registrar o editar un producto</b></h4>
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
                    <tr>
                        <td>Nombre: </td>
                        <td><input type="text" required="required" name="nombre" id="nombre" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/></td>
                    </tr>
                    <tr>
                        <td>Código de barras: </td>
                        <td><input type="text"  name="cod-barra" id="cod-barra" maxlength="100"/></td>
                    </tr>
                    <?php  /*h----------------------acer el select desde la otra tabla opciones de la otra tabla-------------------*/
                        include('../php/conexion2.php');
                        $registro = mysql_query("SELECT tipo_pro FROM tipoproductos ORDER BY tipo_pro ASC");    
                    ?>
                    <tr>
                        <td>Tipo: </td>
                        <td><select required="required" name="tipo" id="tipo">
                            <?php 
                            while($registro2 = mysql_fetch_array($registro)){ ?>

                            <option value="<?php echo $registro2['tipo_pro']?>"> <?php echo $registro2['tipo_pro'] ?>  </option>
                            <?php }    ?>        
                        </select></td>
                    </tr>  <!--******************************************************************-->
                   <tr>
                        <td>Precio Costo: </td>
                        <td><input type="number"  required="required" name="precio-cost" id="precio-cost" pattern="[0-9]{1,10}+\,[0-9]{1,2}$" placeholder="$0.00" step="any"  onChange="porcentajePrecio();" onChange="porcentajeAplicado();"/></td>
                    </tr>
                    <tr>
                        <td>Porcentaje: </td>
                        <td><input type="number"  required="required" name="porcentaje" id="porcentaje" pattern="[0-9]{1,5}+\,[0-9]{1,2}$" placeholder="0.00%" step="any" onChange="porcentajePrecio();"/></td>
                    </tr>

                    <tr>
                        <td>Precio Unitario: </td>
                        <td><input type="number" required="required" name="precio-uni" id="precio-uni" pattern="[0-9]{1,10}+\,[0-9]{1,2}$" placeholder="$0.00" step="any" onChange="porcentajeAplicado();"/></td>
                    </tr>
                    <tr>
                        <td>Existencia: </td>
                        <td><input type="number"  required="required" min="0" max="9999999999" name="existencia" id="existencia"/></td>
                        <td><input type="number"  required="required" min="1" max="999999999" name="existenciaedt" id="existenciaedt"/></td>
                    </tr>
                        <td>IVA:</td>
                        <td><input type="number" name="iva" id="iva" pattern="[0-9]{1,3}+\,[0-9]{1,2}$" placeholder="21.00" step="any"/></td>
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
</body>
</html>
