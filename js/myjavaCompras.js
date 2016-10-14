$(function(){ /*<!--Copyright 2016 nk9mhp <nk9mhp@DESKTOP-LOGHESU> alessandroverao-->*/
	
	$('#nuevo-comp').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra-comp').modal({
			show:true,
			backdrop:'static'
		});
	});
	
});

function agregaRegistro(){
	var url = '../php/agrega_compra.php';
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

function eliminarCompra(id){
	var url = '../php/elimina_compra.php';
	var pregunta = confirm('¿Esta seguro de eliminar esta Compra?');
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

function editarCompra(id){
	$('#formulario')[0].reset();
	var url = '../php/edita_compra.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Edicion');
				$('#id-prod').val(id);
				$('#proveedor').val(datos[0]);
				$('#importe_compra').val(datos[1]);
				$('#registra-comp').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}