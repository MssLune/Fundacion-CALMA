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
  swal({title: "Registrando...",allowEscapeKey: false,allowOutsideClick:false,text: "Espere unos segundos.",showConfirmButton: false});
}
//función de  mensaje registro correcto
function registro_correcto(){
  swal({title: "Registro Exitoso",icon: 'success',allowEscapeKey: false,allowOutsideClick:false,text: "Te has registrado correctamente.",showConfirmButton: false});
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

