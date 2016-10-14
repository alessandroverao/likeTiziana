/*<!--Copyright 2016 nk9mhp <nk9mhp@DESKTOP-LOGHESU> alessandroverao-->*/

var cant = 1;
var c = 0;
var suma = 0;
var itemsvent;
var idventa;
var producto;
var cantidad;
var precio;
var quitar;

$(function(){
	
	$('#bs-prod').on('keyup',function(){
		var dato = $('#bs-prod').val();
		var url = '../php/busca_venta.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});

	$('#nuevo-producto').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra-producto').modal({
			show:true,
			backdrop:'static'
		});
	});
});

function agregaRegistro(){
	var nombrepro = document.getElementById("nombre").value;
	var preciop = document.getElementById("precio-uni").value;
	var cantpro = document.getElementById("cantidad").value;
	var table = document.getElementById("tablaventa"), 
	rows = table.getElementsByTagName('tr'), i, j, cells;
	c = rows.length;
	var row = table.insertRow(c); 
	itemsvent = row.insertCell(0);
	idventa = row.insertCell(1);
	producto = row.insertCell(2);
	cantidad = row.insertCell(3);
	precio = row.insertCell(4);
	quitar = row.insertCell(5);
	itemsvent.innerHTML = itemsventa(); 
	idventa.innerHTML = '0';
	producto.innerHTML = nombrepro;
	cantidad.innerHTML = cantpro;
	precio.innerHTML = preciop * cantpro;
	quitar.innerHTML = '<a onclick="quitaVenta(this)" class="glyphicon glyphicon-chevron-left"></a>';
	suma += parseFloat(preciop * cantpro);
	document.getElementById("totaltxt").value = parseFloat(suma);

	$('#formulario')[0].reset();
	$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
	
	return false;

}


function agregaVenta(id){
		var url = '../php/agrega_venta.php';
		var qui = id;
		$.ajax({
			type:'POST',
			url:url,
			data:'id='+id,
			success: function(valores){
				var datos = eval(valores);
			 	var table = document.getElementById("tablaventa"), 
			 		rows = table.getElementsByTagName('tr'), i, j, cells;
			 	c = rows.length;

			    var row = table.insertRow(c); 
			    itemsvent = row.insertCell(0);
			    idventa = row.insertCell(1);
			    producto = row.insertCell(2);
			    cantidad = row.insertCell(3);
			    precio = row.insertCell(4);
			    quitar = row.insertCell(5);
			    itemsvent.innerHTML = itemsventa(); 
			    idventa.innerHTML = datos[0];
			    producto.innerHTML = datos[1];
			    cantidad.innerHTML = cant;
			    precio.innerHTML = datos[2];
			    quitar.innerHTML = '<a onclick="quitaVenta(this)" class="glyphicon glyphicon-chevron-left"></a>';
			   	suma += parseFloat(datos[2]);
				document.getElementById("totaltxt").value = parseFloat(suma);
			}
		});
	return false;
}

function itemsventa(){
	var valorASumar = 0;		
    var table = document.getElementById('tablaventa'), rows = table.getElementsByTagName('tr'), i, j, cells;
    valorASumar = rows.length; 
    valorASumar -= 1;
	return parseFloat(valorASumar);
}

function quitaVenta(t){       
    var td = t.parentNode;
    var tr = td.parentNode;
    var tabla = tr.parentNode;
    tabla.removeChild(tr);
    recuento();
}

function recuento(){
	var valorASumar
    suma = 0;		
    var sumaId = 1;
    var table = document.getElementById('tablaventa'), rows = table.getElementsByTagName('tr'), i, j, cells;
    for (i = 0, j = rows.length; i < j; ++i) {
        cells = rows[i].getElementsByTagName('td');
        if (!cells.length) {
            continue;
        }
        valorASumar = cells[4].innerHTML;
        suma += parseFloat(valorASumar);
        cells[0].innerHTML = sumaId;
        sumaId += 1;
    }
	document.getElementById("totaltxt").value = parseFloat(suma);
}

function emitir(){
	var table = document.getElementById('tablaventa'), rows = table.getElementsByTagName('tr'), i, j, cells;
	var url = '../php/emitirVenta.php';
	var idclienteventa = document.getElementById("tipo").value;
	var importe = document.getElementById("totaltxt").value; 
	var idprodven;
	var cantidadprodvent;
	var precioprodvent;
	var nombprodvent;
	var e = 0;
	if(rows.length > 1){
	var pregunta = confirm('¿Emitir venta?');
		if(pregunta == true){
		    for (i = 0, j = rows.length; i < j; ++i) {  
		        cells = rows[i].getElementsByTagName('td');
		        if (!cells.length) {
		            continue;
				}
				idprodven = cells[1].innerHTML;
				nombprodvent = cells[2].innerHTML;
				cantidadprodvent = cells[3].innerHTML;
				precioprodvent = cells[4].innerHTML;
				e = e+1;
			
				window.alert(nombprodvent);
				$.ajax({
					type:'POST',
					url:url,
					data:('idclienteventa='+idclienteventa+'&importe='+importe+'&idprodven='+idprodven+'&cantidadprodvent='+cantidadprodvent+'&precioprodvent='+precioprodvent+'&e='+e),
				});
			}
			pregunta = confirm('¿Emitir Ticket?');
			if(pregunta == true){
				var w = window.open();
				w.document.write("<div style='color:black;font-size:12px;text-align:center;'>");
				w.document.write("<strong>");
				w.document.write("likeTiziana");
				w.document.write("</strong>");
				w.document.write("<br/>");
				w.document.write("</div>");
				w.document.write("<div style='color:black;font-size:18px;text-align:center;'>");
				w.document.write("<strong>");
				w.document.write("Los dos Hermanos");
				w.document.write("</strong>");
				w.document.write("<br/>");
				w.document.write("<br/>");
				w.document.write("</div>");
				w.document.write("<div>");
				w.document.write('Vera Oszika Alessandro');
				w.document.write("<br/>");
				w.document.write('C.U.I.T.: 20-93945315-7');
				w.document.write("<br/>");
				w.document.write('Direccion: Las Palmas 1350 - Barrio: Mapuri');
				w.document.write("<br/>")
				w.document.write('CP: 3334 - Puerto Rico - Misiones');
				w.document.write("<br/>");
				w.document.write('Responsable Monotributo');
				w.document.write("<br/>");
				w.document.write('A Consumodir Final');
				w.document.write("<br/>");
				w.document.write("<br/>");
				/*fecha*/
				var d = new Date();
				var curr_date = d.getDate();
				var curr_month = d.getMonth();
				var curr_year = d.getFullYear();
				w.document.write("Fecha: " + curr_date + "-" + curr_month + "-" + curr_year);
				/* hora*/
				var date = new Date();
				var hh = date.getHours();
				var mm = date.getMinutes();
				var ss = date.getSeconds();
				w.document.write(" Hora: " + hh + ":" + mm + ":" + ss);
				w.document.write("<br/>");
				w.document.write("<br/>");
				w.document.write("</div>");
				w.document.write($('#imprimirprod').html());
				w.document.write("<div>");
				w.document.write("<br/>");
				w.document.write("<br/>");
				w.document.write('TOTAL: ' + document.getElementById('totaltxt').value);
				w.document.write("</div>");
				w.document.close(); 
				w.focus();
				w.print();
				w.close();
				url = '../php/impresion.php'
				$.ajax({
					type:'POST',
					url:'../php/impresion.php',
					data:'idclienteventa='+idclienteventa,
				});
			}
			window.location.href= '../php/ventas.php';
			location.reload();
		}
	}
}
