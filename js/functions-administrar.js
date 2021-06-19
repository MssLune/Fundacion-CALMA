// Función más info Médicos
function masInfoMedico(y){
    document.getElementById("codigo_user-medico").value="";
    document.getElementById("tipo-doc").value="";
    document.getElementById("select-tip_doc").value="";
    document.getElementById("numdoc").value="";
    document.getElementById("nombre-medico").value="";
    document.getElementById("paterno_med").value="";
    document.getElementById("materno_med").value="";
    document.getElementById("correo-med").value="";
    document.getElementById("nacimiento_med").value="";
    document.getElementById("sexo-med").value="";
    document.getElementById("select-sexo").value="";
    document.getElementById("telf-med").value="";
    document.getElementById("pais-med").value="";
    document.getElementById("estado-med").value="";
    document.getElementById("convenio-med").value="";
    document.getElementById("actividad-med").value="";
    document.getElementById("select-activ").value="";
    document.getElementById("planDona-med").value="";
    document.getElementById("select-plan").value="";
    
    //mensaje de espera
    swal({title: "Cargando...",allowEscapeKey: false,allowOutsideClick:false,text: "Espere unos segundos.",showConfirmButton: false});

    $.ajax({
        url: "includes/admin/crud_medico.php",
        type: "POST",
        data: "cod_userMedico=" + y,
        dataType: 'json',
        cache: false,
        success: function(arr){
            document.getElementById("codigo_user-medico").value=arr[0];
            
            document.getElementById("tipo-doc").value=arr[6];
            document.getElementById("select-tip_doc").value=arr[5];
            document.getElementById("numdoc").value=arr[7];
            document.getElementById("nombre-medico").value=arr[1];
            document.getElementById("paterno_med").value=arr[2];
            document.getElementById("materno_med").value=arr[3];
            document.getElementById("correo-med").value=arr[4];
            document.getElementById("nacimiento_med").value=arr[8];
            document.getElementById("sexo-med").value=arr[10];
            document.getElementById("select-sexo").value=arr[9];
            document.getElementById("telf-med").value=arr[11];
            document.getElementById("pais-med").value=arr[12];
            document.getElementById("estado-med").value=arr[13];
            document.getElementById("convenio-med").value=arr[15];

            if(arr[18] == 1){
                var nombre_act = 'ACTIVO';
            }else{
                nombre_act = 'INACTIVO';
            }
            document.getElementById("actividad-med").value=nombre_act;
            document.getElementById("select-activ").value=arr[18];

            document.getElementById("planDona-med").value=arr[17];
            document.getElementById("select-plan").value=arr[16];
            swal.closeModal(); 
        }
    });
}

// Función más info Usuarios
function masInfoUser(x){
    document.getElementById("codigo_user").value="";
    document.getElementById("tipo_doc").value="";
    document.getElementById("select_tipo_doc").value="";
    document.getElementById("numdocUser").value="";
    document.getElementById("nombre_user").value="";
    document.getElementById("paterno_user").value="";
    document.getElementById("materno_user").value="";
    document.getElementById("correo_user").value="";
    document.getElementById("nacimiento_user").value="";
    document.getElementById("sexo_user").value="";
    document.getElementById("select_sexoUser").value="";
    document.getElementById("telf_user").value="";
    document.getElementById("pais_user").value="";
    document.getElementById("estadoUser").value="";
    document.getElementById("convenioUser").value="";
    document.getElementById("userActividad").value="";
    document.getElementById("select_activUser").value="";
    document.getElementById("planDona_user").value="";
    document.getElementById("select_planUser").value="";
    
    //mensaje de espera
    swal({title: "Cargando...",allowEscapeKey: false,allowOutsideClick:false,text: "Espere unos segundos.",showConfirmButton: false});

    $.ajax({
        url: "includes/admin/crud_usuario.php",
        type: "POST",
        data: "cod_user=" + x,
        dataType: 'json',
        cache: false,
        success: function(arr){
            document.getElementById("codigo_user").value=arr[0];
            
            document.getElementById("tipo_doc").value=arr[6];
            document.getElementById("select_tipo_doc").value=arr[5];
            document.getElementById("numdocUser").value=arr[7];
            document.getElementById("nombre_user").value=arr[1];
            document.getElementById("paterno_user").value=arr[2];
            document.getElementById("materno_user").value=arr[3];
            document.getElementById("correo_user").value=arr[4];
            document.getElementById("nacimiento_user").value=arr[8];
            document.getElementById("sexo_user").value=arr[10];
            document.getElementById("select_sexoUser").value=arr[9];
            document.getElementById("telf_user").value=arr[11];
            document.getElementById("pais_user").value=arr[12];
            document.getElementById("estadoUser").value=arr[13];
            document.getElementById("convenioUser").value=arr[15];

            if(arr[18] == 1){
                var nombre_act_user = 'ACTIVO';
            }else{
                nombre_act_user = 'INACTIVO';
            }
            document.getElementById("userActividad").value=nombre_act_user;
            document.getElementById("select_activUser").value=arr[18];

            document.getElementById("planDona_user").value=arr[17];
            document.getElementById("select_planUser").value=arr[16];
            swal.closeModal(); 
        }
    });
}