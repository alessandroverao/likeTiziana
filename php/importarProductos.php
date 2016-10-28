<!DOCTYPE html>    <!--Copyright 2016 nk9mhp <nk9mhp@DESKTOP-LOGHESU> alessandroverao-->
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include("../php/seguridad.php"); ?>
        <?php include("../php/privilegio.php"); ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Importar</title>
        <LINK rel="icon" href="../favicon.ico" />
        <link href="../css/estiloImportar.css" rel="stylesheet">
        <script src="../js/jquery.js"></script>
        <script src="../js/myjavaImportar.js"></script>
    </head>
    <body>
        <header>
	       <h1>IMPORTAR PRODUCTOS</h1>
           <hr>
           <h4>Seleccione un archivo con extensión .CSV</h4>
        </header>
        <section>
            <form id="subida">
                <table>
                	<tr>
                        <td><input type="file" id="csv" name="csv" /></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Importar"/></td>
                    </tr>
                    <tr>
                        <td><input type="button" value="Volver" onclick="history.back()"/></td>
                    </tr>
                    <tr>
                        <td id="respuesta"></td>
                    </tr>
                </table>
            </form>
            <form id="subida">
        </section>
    </body>
</html>
