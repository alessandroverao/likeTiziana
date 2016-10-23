<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> <!--Copyright 2016 nk9mhp <nk9mhp@DESKTOP-LOGHESU> alessandroverao-->
<head>
<?php include("../php/seguridad.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ventas</title>
<LINK rel="icon" href="../favicon.ico" />
<link href="../css/estiloVenta.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/myjavaVentas.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>

</head>
<body>
    <header><big><strong><font color="#333333">PRODUCTOS</strong></big></header>
    <section>
    <table>
        <tr>
            <td width="335"><input type="text" placeholder="Buscar por: Nombre o Cod. Barra" id="bs-prod" autofocus/></td>
            <td width="100"><button id="nuevo-producto" style="margin-left: 30px" class="btn btn-primary">Nuevo</button></td>
            <td witdh="200"><button id="emitir" style="margin-left: 20px" class="btn btn-danger" onclick="javascript:emitir();">Emitir</button></td>
            <td witdh="200"><form><button id="volver" class="btn btn-primary"  onclick="history.back()">Volver</button></form></td>
        </tr>
    </table>
    </section>

    <div class="registros" id="agrega-registros">
        <table id="tablaprod" class="table table-striped table-condensed table-hover">
            <tr>
                <th width="210">PRODUCTO</th>
                <th width="190">C. BARRAS</th>
                <th width="100">PRECIO</th>
                <th width="70">STOCK</th>
                <th width="50"></th>
            </tr>
        <?php
            include('../php/conexion.php');
            $registro = mysql_query("SELECT * FROM productos where existencia_prod > 0 ORDER BY nomb_prod ASC"); 
            while($registro2 = mysql_fetch_array($registro)){
                echo '<tr>
                        <td>'.$registro2['nomb_prod'].'</td>
                        <td>'.$registro2['cod_barra'].'</td>
                        <td>$ '.$registro2['precio_unit'].'</td>
                        <td>'.$registro2['existencia_prod'].'</td>
                        <td><a onclick="javascript:agregaVenta('.$registro2['id_prod'].');" class="glyphicon glyphicon-chevron-right"></a> </td>
                    </tr>';      
            }
        ?>
        </table>
    </div>
    <!-- ***************************************************-->
  <header id="venta" ><big><strong><font color="#333333">VENTA</strong></big></header>

    <div class="registros" id="imprimirprod">
        <table id="tablaventa" class="table table-striped table-condensed table-hover">
            <tr>
                <th width="15">ID</th>
                <th width="10"></th>
                <th width="300">PRODUCTO</th>
                <th width="50">CANTIDAD</th>
                <th width="100">PRECIO</th>
                <th width="50"></th>            
            </tr> 
        </table>
    </div>
    <section id="total">
    <table id="totales">
        <tr>
            <td><label for="totallbl">TOTAL $ </label></td>
            <td width="300"><input type="number" id="totaltxt" name="totaltxt" value="0" step="any" disabled /></td>
            <td><img id="myImg" src="../images/carrito.png" width="100" height="100"></td>
        </tr>
        <tr>
        <td><label for="clientellbl">CLIENTE </label></td>
            <td><select required="required" name="tipo" id="tipo">
            <?php
                include('../php/conexion2.php');
                $registro = mysql_query("SELECT id_clien, nomb_clien FROM clientes ORDER BY nomb_clien ASC");     
                while($registro2 = mysql_fetch_array($registro)){ ?>
                 <option value="<?php echo $registro2['id_clien']?>"><?php echo $registro2['nomb_clien'] ?>  </option>
            <?php }    ?>        
            </select></td>
        </tr>
    </table>
    </section>
    <!-- The Modal IMAGEN
<div id="myModal" class="modal">
  <span class="close"><a class="btn btn-primary">X</a></span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div> -->
    <div class="modal fade" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Agregar producto</b></h4>
            </div>
            <form id="formulario" name="form1" class="formulario" onsubmit="return agregaRegistro();">
            <div class="modal-body">
                <table border="0" width="100%">
                     <tr>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-prod" name="id-prod" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
                    </tr>
                     <tr>
                        <td width="150"></td>
                        <td><input type="text" required="required" readonly="readonly" id="pro" name="pro"
                        style="visibility:hidden; height:5px;"/></td>
                    </tr>
                    <tr>
                        <td>Nombre: </td>
                        <td><input type="text" required="required" name="nombre" id="nombre" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/></td>
                    </tr>
                    <tr>
                        <td>Precio Unitario: </td>
                        <td><input type="number" required="required" name="precio-uni" id="precio-uni" pattern="[0-9]{1,10}+\,[0-9]{1,2}$" placeholder="$0.00" step="any" /></td>
                    </tr>
                    <tr>
                        <td>Cantidad:</td>
                        <td><input type="number" name="cantidad" id="cantidad" pattern="[0-9]" placeholder="20" step="any"/></td>
                    <tr>
                        <td colspan="2">
                            <div id="mensaje"></div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
            </div>
            </form>
          </div>
        </div>
      </div>

<!--<script>
// Get the modal IMAGEN
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
</script>-->
</body>
</html>
