// ----- FUNCIÓN PARA MOSTRAR RESULTADOS ----

 // -- mostrar
function mostrarResultmed(x, y){
  document.getElementById("id_user").value="";
  document.getElementById("id_medico").value="";
  document.getElementById("id_userMedico").value="";

  document.getElementById("diag_result").value="";
  document.getElementById("diagdetail_result").value="";
  document.getElementById("proxSesion_result").value="";
  document.getElementById("apuntes_result").value="";
  
  //mensaje de espera
  swal({title: "Cargando...",allowEscapeKey: false,allowOutsideClick:false,text: "Espere unos segundos.",showConfirmButton: false});

  $.ajax({
      url: "includes/admin/crud_consultas.php",
      type: "POST",
      data:{
        id_medUser_result:x,
        id_consulta_result:y,
      },
      dataType: 'json',
      cache: false,
      success: function(arr){
        document.getElementById("id_user").value=arr[2];
        document.getElementById("id_medico").value=arr[1];
        document.getElementById("id_userMedico").value=arr[0];
        document.getElementById("id_consulta").value=arr[7];
        
        if(arr[3] == '' || arr[3] == null){
          var diagnostico_med = 'SIN DIAGNÓSTICO DISPONIBLE.';
        }else{
          diagnostico_med = arr[3];
        }
        if(arr[4] == '' || arr[4] == null){
          var detalle_med = 'SIN DETALLES DISPONIBLES.';
        }else{
          detalle_med = arr[4];
        }
        if(arr[5] == '' || arr[5] == null){
          var sesion_recomend = 'SIN SESIÓN RECOMENDADA DISPONIBLE.';
        }else{
          sesion_recomend = arr[5];
        }
        if(arr[6] == '' || arr[6] == null){
          var apuntes_med = 'SIN NOTAS ADICIONALES DISPONIBLES.';
        }else{
          apuntes_med = arr[6];
        }

        document.getElementById("diag_result").value=diagnostico_med;
        document.getElementById("diagdetail_result").value=detalle_med;
        document.getElementById("proxSesion_result").value=sesion_recomend;
        document.getElementById("apuntes_result").value=apuntes_med;

        swal.closeModal(); 
      }
  });
}
  
     // -- editar
  function editResultmed(z){
  var condicion = z;

  if(condicion == false) {
      document.getElementById("diag_result").readOnly=condicion;
      document.getElementById("diagdetail_result").readOnly=condicion;
      document.getElementById("proxSesion_result").readOnly=condicion;
      document.getElementById("apuntes_result").readOnly=condicion;

      //botón de actualizar
      document.getElementById("guardar_result_med").classList.remove("d-none");
      document.getElementById("cancelar_resultmed").classList.remove("d-none");

      document.getElementById("edit_diag_med").classList.add("d-none");
  }else{ 
      document.getElementById("diag_result").readOnly=condicion;
      document.getElementById("diagdetail_result").readOnly=condicion;
      document.getElementById("proxSesion_result").readOnly=condicion;
      document.getElementById("apuntes_result").readOnly=condicion;

      //botón de actualizar
      document.getElementById("guardar_result_med").classList.add("d-none");
      document.getElementById("cancelar_resultmed").classList.add("d-none");

      document.getElementById("edit_diag_med").classList.remove("d-none");
  }   
}

  // -- Actualizar
  function actualizarResultMed(){
    var Id_usuario = document.getElementById("id_user").value;
    var id_med = document.getElementById("id_medico").value;
    var id_usuarioMed = document.getElementById("id_userMedico").value;
    var id_consultaResult = document.getElementById("id_consulta").value;

    var result_diagnostico = document.getElementById("diag_result").value;
    var detail_result = document.getElementById("diagdetail_result").value;
    var sesionproxResult = document.getElementById("proxSesion_result").value;
    var apuntes_result = document.getElementById("apuntes_result").value;
    
    swal({
        title: '¿SEGURO QUE DESEA ACTUALIZAR ESTOS RESULTADOS?',
        text: "Se actualizarán los resultados de este Paciente",
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
                    id_userConsulta:id_consultaResult,
                    idusuario_med:id_usuarioMed,
                    usuarioId:Id_usuario,
                    medicoId:id_med,
                    result_diag:result_diagnostico,
                    result_detail:detail_result,
                    result_proxSesion: sesionproxResult,
                    result_apuntes:apuntes_result,
                },
                cache: false,
                success: function(arr){
                    swal({
                        title: 'Resultados Actualizados',
                        text: 'Se han actualizado los resultados satisfactoriamente.',
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

 // -- Mostrar para Usuario : Mis consultas -- Resultados
 function mostrarResultuser(x, y){
  document.getElementById("resultado_diag_user").value="";
  document.getElementById("resultado_detail_user").value="";
  document.getElementById("resultado_proxSes_user").value="";
  
  //mensaje de espera
  swal({title: "Cargando...",allowEscapeKey: false,allowOutsideClick:false,text: "Espere unos segundos.",showConfirmButton: false});

  $.ajax({
      url: "includes/admin/crud_consultas.php",
      type: "POST",
      data:{
        id_usuario_result_user:x,
        consultId_result_user:y,
      },
      dataType: 'json',
      cache: false,
      success: function(arr){
        if(arr[0] == '' || arr[0] == null){
          var diagnostico_user = 'SIN DIAGNÓSTICO DISPONIBLE.';
        }else{
          diagnostico_user = arr[0];
        }
        if(arr[1] == '' || arr[1] == null){
          var detalle_user = 'SIN DETALLES DISPONIBLES.';
        }else{
          detalle_user = arr[1];
        }
        if(arr[2] == '' || arr[2] == null){
          var proxSes_user = 'SIN SESIÓN RECOMENDADA DISPONIBLE.';
        }else{
          proxSes_user = arr[2];
        }

        document.getElementById("resultado_diag_user").value=diagnostico_user;
        document.getElementById("resultado_detail_user").value=detalle_user;
        document.getElementById("resultado_proxSes_user").value=proxSes_user;

        swal.closeModal(); 
      }
  });
}
  
  