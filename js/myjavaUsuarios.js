$(function(){ /*<!--Copyright 2016 nk9mhp <nk9mhp@DESKTOP-LOGHESU> alessandroverao-->*/
	$('#nuevo-usu').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		document.getElementById("usuario").disabled = false;
		$('#registra-usu').modal({
			show:true,
			backdrop:'static'
		});
	});
});

function agregaRegistro(){
	var url = '../php/agrega_usu.php';
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

function eliminarUsu(id){
	var url = '../php/elimina_usu.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Usuario?');
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

function editarUsu(id){
	$('#formulario')[0].reset();
	var url = '../php/edita_usu.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Edicion');
				document.getElementById("usuario").disabled = true;
				$('#id-usu').val(id);
				$('#usuario').val(datos[0]);
				$('#clave').val(datos[1]);
				$('#estado').val(datos[2]);
				$('#pri').val(datos[3]);
				$('#registra-usu').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function validar(){
	if ($('#pro').val() == 'Registro'){
		var usuario = document.getElementById("usuario").value;
		var url = '../php/validar_usu.php';
			$.ajax({
			type:'POST',
			url:url,
			data:'usuario='+usuario,
			success: function(valores){
				if(valores == 1){
					$('#mensaje').addClass('bien').html('Este usuario ya existe').show(200).delay(2500).hide(200);
					document.getElementById("usuario").value = "";
				}
			}
		});
	}
}