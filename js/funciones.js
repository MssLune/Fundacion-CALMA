//función de  mensaje cargando
function cargando(){
    swal({title: "Iniciando Sesión...",allowEscapeKey: false,allowOutsideClick:false,text: "Espere unos segundos por favor.",showConfirmButton: false,timer: 25000});
}

//función de  mensaje login exitoso
function login_exitoso(){
    swal({title: "Inicio de Sesión Exitoso",icon: 'success',allowEscapeKey: false,allowOutsideClick:false,text: "Has iniciado sesión correctamente.",showConfirmButton: false});
}

//función de  mensaje sesión expirada
function sesion_expirada(){
    swal({title: "Su Sesión Terminó",icon: 'warning',allowEscapeKey: false,allowOutsideClick:false,text: "Ingrese sus Datos Nuevamente para continuar.",showConfirmButton: false});
}

//función de  mensaje credenciales incorrectas
function datos_incorrectos(){
    swal("Falló el Inicio de Sesión", "El Nombre de Usuario y/o Contraseña son Incorrectos.", "error");
}

//función de  mensaje registrando
function registrar(){
  swal({title: "Registrando...",allowEscapeKey: false,allowOutsideClick:false,text: "Espere unos segundos.",showConfirmButton: false,timer: 1500});
}
//función de  mensaje registro correcto
function registro_correcto(){
  swal("Registro Exitoso", "Te has registrado correctamente.", "success");
}

//Función para el dropdown en nav bar
function dropdown(){
    document.getElementById("menu_dropdown").classList.toggle("show");
}
// Cerrar el dropdown si se hace click fuera
window.onclick = function(event) {
    if (!event.target.matches('.btn-dropdown')) {
      var dropdowns = document.getElementsByClassName("content_dropdown");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

//limpiar campos
function limpiarCampos(){
  document.getElementById("names-registro").value = "";
  document.getElementById("apellidoPat-registro").value = "";
  document.getElementById("apellidoMat-registro").value = "";
  document.getElementById("email-user-registro").value = "";
  document.getElementById("tipoDoc-registro").value = "";
  document.getElementById("nroDoc-registro").value = "";
  document.getElementById("nacimiento-registro").value = "";
  document.getElementById("celular-registro").value = "";
  document.getElementById("pass-registro").value = "";
  document.getElementById("pass-confirm-registro").value = "";
  document.getElementById("convenio-registro").value = "";
  document.getElementById("pais-registro").value = "defecto_pais";
  document.getElementById("estado-registro").value = "defecto_estado";
  document.getElementById("genero-registro").value = "defecto_genero";
}
console.log
//--FUNCIÓN PARA GUARDAR NUEVO REGISTRO
function registrar_nuevo_usuario(){
  registrar();
  //guardar inputs
	var nombres_registro = document.getElementById("names-registro").value;
  var paterno_registro = document.getElementById("apellidoPat-registro").value;
  var materno_registro = document.getElementById("apellidoMat-registro").value;
  var email_registro = document.getElementById("email-user-registro").value;
  var nroDoc_registro = document.getElementById("nroDoc-registro").value;
  var fechaNac_registro = document.getElementById("nacimiento-registro").value;
  var celular_registro = document.getElementById("celular-registro").value;
  var password_registro = document.getElementById("pass-registro").value;
  var convenio_registro = document.getElementById("convenio-registro").value;

  //select tipo Documento Identidad
  var campo_tipoDoc = document.getElementById("tipoDoc-registro").value;
  if(campo_tipoDoc==="defecto_tipoDoc"){
    alert("Debes seleccionar un Tipo de Documento.");
  }else{
    var tipoDoc_registro = parseInt(campo_tipoDoc);
  }
  
  //select pais
  var campo_pais = document.getElementById("pais-registro");
  var selected_pais = campo_pais.options[campo_pais.selectedIndex].text;
  if(selected_pais==="Selecciona tu País"){
    alert("Debes seleccionar un País.");
  }else{
    var pais_registro = document.getElementById("pais-registro").value;
  }

  //select estado
  var campo_estado = document.getElementById("estado-registro");
  var selected_estado = campo_estado.options[campo_estado.selectedIndex].text;
  if(selected_estado==="Selecciona tu Estado"){
    alert("Debes seleccionar un Estado.");
  }else{
    var estado_registro = document.getElementById("estado-registro").value;
  }

  //select de género
  var campo_genero = document.getElementById("genero-registro");
  var selected_genero = campo_genero.options[campo_genero.selectedIndex].text;

  if (selected_genero==="Género") {
    alert("Opción de Género inválida.");
  }else {
    var sexo = parseInt(document.getElementById("genero-registro").value);
  }

  $.ajax({
    url: "includes/registrar/registro_nuevo_usuario.php",
    type: "POST",
    data: { "nombres_r":nombres_registro,
        "paterno_r":paterno_registro,
        "materno_r":materno_registro,
        "email_r":email_registro,
        "tipoDoc_r":tipoDoc_registro,
        "nroDoc_r":nroDoc_registro,
        "fechaNacimiento_r":fechaNac_registro,
        "pais_r":pais_registro,
        "estado_r":estado_registro,
        "celular_r":celular_registro,
        "pass_r":password_registro,
        "convenio_r":convenio_registro,
        "genero_r":sexo
    },
    cache: false,
    dataType: 'json',
    success : function(arr){
      registro_correcto();
      limpiarCampos();
      //setTimeout(function() {location.reload();}, 1500);
    }
	});
}

