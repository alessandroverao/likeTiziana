$(function(){ /*<!--Copyright 2016 nk9mhp <nk9mhp@DESKTOP-LOGHESU> alessandroverao-->*/
	$('#bd-desde').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var url = '../php/busca_cliente_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
	$('#bd-hasta').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var url = '../php/busca_cliente_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
	$('#nuevo-clien').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra-cliente').modal({
			show:true,
			backdrop:'static'
		});
	});
	
	$('#bs-clien').on('keyup',function(){
		var dato = $('#bs-clien').val();
		var url = '../php/busca_cliente.php';
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
	
});

function agregaRegistro(){
	var url = '../php/agrega_cliente.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}
		}
	});
	return false;
}

function eliminarCliente(id){
	var url = '../php/elimina_cliente.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Producto?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}

function editarCliente(id){
	$('#formulario')[0].reset();
	var url = '../php/edita_cliente.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Edicion');
				$('#id-clien').val(id);
				$('#nombre').val(datos[0]);
				$('#tipo').val(datos[1]);
				$('#direccion').val(datos[2]);
				$('#celular').val(datos[3]);
				$('#cuil').val(datos[4]);
				$('#email').val(datos[5]);
				$('#registra-cliente').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}