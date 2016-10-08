(function(){
	// Variables
	var lista = document.getElementById("lista"),
		tareaInput = document.getElementById("tareaInput"),
		btnNuevaTarea = document.getElementById("btn-agregar");


	// Funciones
	var agregarTarea = function(){
		var tarea = tareaInput.value,
			nuevaTarea = document.createElement("li"),
			enlace = document.createElement("a"),
			contenido = document.createTextNode(tarea);

		if (tarea === "") {
			tareaInput.setAttribute("placeholder", "Agrega una nota valida");
			tareaInput.className = "error";
			return false;
		}

		// Agregamos el contenido al enlace
		enlace.appendChild(contenido);
		// Le establecemos un atributo href
		enlace.setAttribute("href", "#");
		// Agrergamos el enlace (a) a la nueva tarea (li)
		nuevaTarea.appendChild(enlace);
		// Agregamos la nueva tarea a la lista
		lista.appendChild(nuevaTarea);

		tareaInput.value = "";

		for (var i = 0; i <= lista.children.length -1; i++) {
			lista.children[i].addEventListener("click", function(){
			});
		}

	};
	var comprobarInput = function(){
		tareaInput.className = "";
		teareaInput.setAttribute("placeholder", "Agrega tu nota");
	};

	//var eleminarTarea = function(){
	//	this.parentNode.removeChild(this);
	//};

	// Eventos

	// Agregar Tarea
	btnNuevaTarea.addEventListener("click", agregarTarea);
	

	// Comprobar Input
	tareaInput.addEventListener("click", comprobarInput);

	// Borrando Elementos de la lista
	//for (i = 0; i <= lista.children.length -1; i++) {
	//	lista.children[i].addEventListener("click", eleminarTarea);
	//}
}());
function enviarNota(){
	if(document.getElementById("tareaInput").value != ""){
		var tareaInput = document.getElementById("tareaInput").value;
		$.ajax({
			type:'POST',
			url:'../php/agrega_nota.php',
			data:'tareaInput='+tareaInput,
			success:function(respuesta){
				respuesta=1;
			}
		})
	}
}
function runScript(e) {
	if (e.which == 13 || e.keyCode == 13) {
		var tb = document.getElementById("tareaInput");
			return false;
   	}
}
function borrarNotas(){
	var url = '../php/elimina_nota.php';
	var pregunta = confirm('¿Esta seguro de eliminar todas las notas?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'pregunta='+pregunta,
		success: function(registro){
			location.reload();
		}
	});
	return false;
	}else{
		return false;
	}
}

