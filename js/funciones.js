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

// ---- FUNCIÓN PARA TABLA CONSULTAS -------

 // --- Función para consultas Médico
  //mostrar info en modal
 function reprogConsultaMed(y){
  document.getElementById("codigo_medConsulta").value="";
  document.getElementById("id_consulta_med").value="";
  document.getElementById("status_medConsulta").value="";
  document.getElementById("select_medstatusconsulta").value="";
  document.getElementById("consultaMed_fecha").value="";
  document.getElementById("consultaMed_hora").value="";
  document.getElementById("link_medConsulta").value="";
  document.getElementById("diag_medConsulta").value="";
  document.getElementById("apuntes_medConsulta").value="";
  
  //mensaje de espera
  swal({title: "Cargando...",allowEscapeKey: false,allowOutsideClick:false,text: "Espere unos segundos.",showConfirmButton: false});

  $.ajax({
      url: "includes/admin/crud_consultas.php",
      type: "POST",
      data: "cod_medicoConsulta=" + y,
      dataType: 'json',
      cache: false,
      success: function(arr){
          document.getElementById("codigo_medConsulta").value=arr[8];
          document.getElementById("id_consulta_med").value=arr[9];
          document.getElementById("id_tablaMedico").value=arr[10];

          document.getElementById("status_medConsulta").value=arr[1];
          document.getElementById("select_medstatusconsulta").value=arr[2];
          document.getElementById("consultaMed_fecha").value=arr[3];
          document.getElementById("consultaMed_hora").value=arr[4];
          document.getElementById("link_medConsulta").value=arr[5];
          document.getElementById("diag_medConsulta").value=arr[6];
          document.getElementById("apuntes_medConsulta").value=arr[7];
          
          swal.closeModal(); 
      }
  });
}

  //editar inputs del modal
  function editconsultaMed(z){
    //boolean
    var condicion = z;

    //si es falso -> edita 
    if(condicion == false) {
        document.getElementById('select_medstatusconsulta').classList.remove("d-none");
        document.getElementById('status_medConsulta').classList.add("d-none");

        //read only = false ->se podrá editar
        document.getElementById('consultaMed_fecha').readOnly=condicion;
        document.getElementById('consultaMed_hora').readOnly=condicion;
        document.getElementById('link_medConsulta').readOnly=condicion;
        document.getElementById('diag_medConsulta').readOnly=condicion;
        document.getElementById('apuntes_medConsulta').readOnly=condicion;

        //botón guardar-actualizar
        document.getElementById('actualizar_consultaMedico').classList.remove("d-none");
        document.getElementById('cancel_consultaMedico').classList.remove("d-none");
    }else{ //si es true -> NO se edita
        document.getElementById('select_medstatusconsulta').classList.add("d-none");
        document.getElementById('status_medConsulta').classList.remove("d-none");

        //read only = false ->se podrá editar
        document.getElementById('consultaMed_fecha').readOnly=condicion;
        document.getElementById('consultaMed_hora').readOnly=condicion;
        document.getElementById('link_medConsulta').readOnly=condicion;
        document.getElementById('diag_medConsulta').readOnly=condicion;
        document.getElementById('apuntes_medConsulta').readOnly=condicion;

        //botón guardar-actualizar
        document.getElementById('actualizar_consultaMedico').classList.add("d-none");
        document.getElementById('cancel_consultaMedico').classList.add("d-none");
    }   
}

  //actualizar datos del modal
function actualizarConsultaMedico(){
    var cod_medico = document.getElementById('id_tablaMedico').value;
    var cod_consultaMed = document.getElementById('id_consulta_med').value;
    var id_medicoUser = document.getElementById('codigo_medConsulta').value;

    var status_consulta = document.getElementById('select_medstatusconsulta').value;
    var fecha_consulta = document.getElementById('consultaMed_fecha').value;
    var hora_consulta = document.getElementById('consultaMed_hora').value;
    var link_consulta = document.getElementById('link_medConsulta').value;
    var diag_consulta = document.getElementById('diag_medConsulta').value;
    var apuntes_consulta = document.getElementById("apuntes_medConsulta").value;
    
    swal({
        title: '¿SEGURO QUE DESEA ACTUALIZAR ESTA CONSULTA?',
        text: "Se actualizarán los datos de esta Consulta",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Actualizar',
        cancelButtonText: 'No, Cancelar !'
    }).then(function () {
                $.ajax({
                url: "includes/admin/crud_consultas.php",
                type: "POST",
                dataType:'json',
                data:{
                    iduser_medico:id_medicoUser,
                    codigo_med:cod_medico,
                    id_consulta:cod_consultaMed,
                    estado_consulta:status_consulta,
                    fecha_consulta:fecha_consulta,
                    hora_consulta:hora_consulta,
                    link_consulta: link_consulta,
                    diagnosticoConsulta:diag_consulta,
                    apuntes_consulta:apuntes_consulta,
                },
                cache: false,
                success: function(arr){
                    swal({
                        title: 'Consulta Actualizada',
                        text: 'Se han actualizado los datos de la Consulta satisfactoriamente.',
                        type: 'success',
                    }).then(function(){ 
                        location.reload();
                        });
                }
            })
        }, function (dismiss) {
            if (dismiss === 'cancel') {
        }
    })
}
   //----Fin funciones consulta Médicos----

  //--Funciones consulta User--
//mostrar info en modal
function reprogConsultaUser(x){
  document.getElementById("id_User").value="";
  document.getElementById("id_ConsultaUser").value="";
  document.getElementById("id_tableMedico").value="";
  document.getElementById("id_userMedico").value="";
  
  document.getElementById("especialidad_userConsulta").value="";
  document.getElementById("select_userEspConsulta").value="";
  document.getElementById("fecha_userConsulta").value="";
  document.getElementById("hora_userConsulta").value="";
  
  //mensaje de espera
  swal({title: "Cargando...",allowEscapeKey: false,allowOutsideClick:false,text: "Espere unos segundos.",showConfirmButton: false});

  $.ajax({
      url: "includes/admin/crud_consultas.php",
      type: "POST",
      data: "cod_consultaUsuario=" + x,
      dataType: 'json',
      cache: false,
      success: function(arr){
          document.getElementById("id_User").value=arr[0];
          document.getElementById("id_ConsultaUser").value=arr[1];
          document.getElementById("id_tableMedico").value=arr[2];
          document.getElementById("id_userMedico").value=arr[3];
          
          document.getElementById("especialidad_userConsulta").value=arr[6];
          document.getElementById("select_userEspConsulta").value=arr[7];
          document.getElementById("fecha_userConsulta").value=arr[4];
          document.getElementById("hora_userConsulta").value=arr[5];
          
          swal.closeModal(); 
      }
  });
}

  //editar inputs del modal
  function editconsultaUser(z){
    //boolean
    var condicion = z;

    //si es falso -> edita 
    if(condicion == false) {
        document.getElementById('select_userEspConsulta').classList.remove("d-none");
        document.getElementById('especialidad_userConsulta').classList.add("d-none");

        //read only = false ->se podrá editar
        document.getElementById('fecha_userConsulta').readOnly=condicion;
        document.getElementById('hora_userConsulta').readOnly=condicion;

        //botón guardar-actualizar
        document.getElementById('actualizar_consultaUser').classList.remove("d-none");
        document.getElementById('cancel_consultaUser').classList.remove("d-none");
    }else{ //si es true -> NO se edita
        document.getElementById('select_userEspConsulta').classList.add("d-none");
        document.getElementById('especialidad_userConsulta').classList.remove("d-none");

        //read only = false ->se podrá editar
        document.getElementById('fecha_userConsulta').readOnly=condicion;
        document.getElementById('hora_userConsulta').readOnly=condicion;

        //botón guardar-actualizar
        document.getElementById('actualizar_consultaUser').classList.add("d-none");
        document.getElementById('cancel_consultaUser').classList.add("d-none");
    }   
}

  //actualizar datos del modal
function actualizarConsultaUser(){
    var codigo_usuario = document.getElementById('id_User').value;
    var codigoUser_medico = document.getElementById('id_userMedico').value;
    var id_medico = document.getElementById('id_tableMedico').value;
    var id_consultaUser = document.getElementById('id_ConsultaUser').value;

    var especialidad_userConsulta = document.getElementById('select_userEspConsulta').value;
    var fechaUser_consulta = document.getElementById('fecha_userConsulta').value;
    var horaUser_consulta = document.getElementById('hora_userConsulta').value;
    
    swal({
        title: '¿SEGURO QUE DESEA ACTUALIZAR SU CONSULTA?',
        text: "Se actualizarán los datos de su Consulta",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Actualizar',
        cancelButtonText: 'No, Cancelar !'
    }).then(function () {
                $.ajax({
                url: "includes/admin/crud_consultas.php",
                type: "POST",
                dataType:'json',
                data:{
                    codigo_user:codigo_usuario,
                    codigoUsuario_med:codigoUser_medico,
                    id_medico:id_medico,
                    id_ConsultaUsuario:id_consultaUser,
                    fecha_consulta:fechaUser_consulta,
                    hora_consulta:horaUser_consulta,
                    especialidadConsulta: especialidad_userConsulta,
                },
                cache: false,
                success: function(arr){
                    swal({
                        title: 'Consulta Actualizada',
                        text: 'Se han actualizado los datos de su Consulta satisfactoriamente.',
                        type: 'success',
                    }).then(function(){ 
                        location.reload();
                        });
                }
            })
        }, function (dismiss) {
            if (dismiss === 'cancel') {
        }
    })
}

