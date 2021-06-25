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

// Función más info Admin
function masInfoAdmin(q){
    document.getElementById("codigo_user_admin").value="";
    document.getElementById("area_admin").value="";
    document.getElementById("tipo_docAdm").value="";
    document.getElementById("select_tipo_docAdm").value="";
    document.getElementById("numdocAdm").value="";
    document.getElementById("nombre_adm").value="";
    document.getElementById("paterno_admin").value="";
    document.getElementById("materno_admin").value="";
    document.getElementById("correo_admin").value="";
    document.getElementById("nacimiento_adm").value="";
    document.getElementById("sexo_admin").value="";
    document.getElementById("select_adminSexo").value="";
    document.getElementById("telf_admin").value="";
    document.getElementById("pais_admin").value="";
    document.getElementById("ciudad_admin").value="";
    document.getElementById("convenio_adm").value="";
    document.getElementById("actividad_admin").value="";
    document.getElementById("select_adm_activ").value="";
    document.getElementById("planDonaAdmin").value="";
    document.getElementById("selectPlan_admin").value="";
    
    //mensaje de espera
    swal({title: "Cargando...",allowEscapeKey: false,allowOutsideClick:false,text: "Espere unos segundos.",showConfirmButton: false});

    $.ajax({
        url: "includes/admin/crud_admin.php",
        type: "POST",
        data: "cod_userAdmin=" + q,
        dataType: 'json',
        cache: false,
        success: function(arr){
            document.getElementById("codigo_user_admin").value=arr[0];

            document.getElementById("area_admin").value=arr[19];
            document.getElementById("tipo_docAdm").value=arr[6];
            document.getElementById("select_tipo_docAdm").value=arr[5];
            document.getElementById("numdocAdm").value=arr[7];
            document.getElementById("nombre_adm").value=arr[1];
            document.getElementById("paterno_admin").value=arr[2];
            document.getElementById("materno_admin").value=arr[3];
            document.getElementById("correo_admin").value=arr[4];
            document.getElementById("nacimiento_adm").value=arr[8];
            document.getElementById("sexo_admin").value=arr[10];
            document.getElementById("select_adminSexo").value=arr[9];
            document.getElementById("telf_admin").value=arr[11];
            document.getElementById("pais_admin").value=arr[12];
            document.getElementById("ciudad_admin").value=arr[13];
            document.getElementById("convenio_adm").value=arr[15];

            if(arr[18] == 1){
                var nombre_act_adm = 'ACTIVO';
            }else{
                nombre_act_adm = 'INACTIVO';
            }
            document.getElementById("actividad_admin").value=nombre_act_adm;
            document.getElementById("select_adm_activ").value=arr[18];

            document.getElementById("planDonaAdmin").value=arr[17];
            document.getElementById("selectPlan_admin").value=arr[16];
            
            swal.closeModal(); 
        }
    });
}

// Función Eliminar Médico
function eliminarMedico(x){
    swal({
        title: '¿SEGURO QUE DESEA ELIMINAR ESTE MÉDICO?',
        text: "Se eliminará el Médico con Código "+x,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Eliminar',
        cancelButtonText: 'No, Cancelar !'
    }).then(function () {
            $.ajax({
                url: "includes/admin/crud_medico.php",
                type: "POST",
                dataType:"json",
                data:"elimina_medico=" + x,
                cache: false,
                success: function (arr){
                   swal({
                        title: 'Médico Eliminado',
                        text: 'El Médico se ha eliminado satisfactoriamente.',
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

//Función eliminar Usuario
function eliminarUser(y){
    swal({
        title: '¿SEGURO QUE DESEA ELIMINAR ESTE USUARIO?',
        text: "Se eliminará el Usuario con Código "+y,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Eliminar',
        cancelButtonText: 'No, Cancelar !'
    }).then(function () {
            $.ajax({
                url: "includes/admin/crud_usuario.php",
                type: "POST",
                dataType:"json",
                data:"elimina_user=" + y,
                cache: false,
                success: function (arr){
                    swal({
                        title: 'Usuario Eliminado',
                        text: 'El Usuario se ha eliminado satisfactoriamente.',
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

// Función Eliminar Admin
function eliminarAdmin(p){
    swal({
        title: '¿SEGURO QUE DESEA ELIMINAR ESTE ADMINISTRADOR?',
        text: "Se eliminará el Administrador con Código "+p,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Eliminar',
        cancelButtonText: 'No, Cancelar !'
    }).then(function () {
            $.ajax({
                url: "includes/admin/crud_admin.php",
                type: "POST",
                dataType:"json",
                data:"elimina_admin=" + p,
                cache: false,
                success: function (arr){
                    swal({
                        title: 'Administrador Eliminado',
                        text: 'El Administrador se ha eliminado satisfactoriamente.',
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


// ---Funciones para EDITAR -----

//Función editar Médico
function editMedico(z){
    //boolean
    var condicion = z;

    //si es falso -> edita 
    if(condicion == false) {
        document.getElementById('tipo-doc').classList.add("d-none");
        document.getElementById('select-tip_doc').classList.remove("d-none");
        document.getElementById('sexo-med').classList.add("d-none");
        document.getElementById('select-sexo').classList.remove("d-none");
        document.getElementById('actividad-med').classList.add("d-none");
        document.getElementById('select-activ').classList.remove("d-none");
        document.getElementById('planDona-med').classList.add("d-none");
        document.getElementById('select-plan').classList.remove("d-none");


        document.getElementById("guardar_med").classList.remove("d-none");
        //read only = false ->se podrá editar
        document.getElementById('numdoc').readOnly=condicion;
        document.getElementById('nombre-medico').readOnly=condicion;
        document.getElementById('paterno_med').readOnly=condicion;
        document.getElementById('materno_med').readOnly=condicion;
        document.getElementById('correo-med').readOnly=condicion;
        document.getElementById('nacimiento_med').readOnly=condicion;
        document.getElementById('telf-med').readOnly=condicion;
        document.getElementById('pais-med').readOnly=condicion;
        document.getElementById('estado-med').readOnly=condicion;
        //document.getElementById('convenio-med').readOnly=condicion;
    }else{ //si es true -> NO se edita
        document.getElementById('tipo-doc').classList.remove("d-none");
        document.getElementById('select-tip_doc').classList.add("d-none");
        document.getElementById('sexo-med').classList.remove("d-none");
        document.getElementById('select-sexo').classList.add("d-none");
        document.getElementById('actividad-med').classList.remove("d-none");
        document.getElementById('select-activ').classList.add("d-none");
        document.getElementById('planDona-med').classList.remove("d-none");
        document.getElementById('select-plan').classList.add("d-none");

        document.getElementById('guardar_med').classList.add("d-none");
        //read only es verdadero : no se edita
        document.getElementById('tipo-doc').readOnly=condicion;
        document.getElementById('sexo-med').readOnly=condicion;
        document.getElementById('actividad-med').readOnly=condicion;
        document.getElementById('planDona-med').readOnly=condicion;

        document.getElementById('numdoc').readOnly=condicion;
        document.getElementById('nombre-medico').readOnly=condicion;
        document.getElementById('paterno_med').readOnly=condicion;
        document.getElementById('materno_med').readOnly=condicion;
        document.getElementById('correo-med').readOnly=condicion;
        document.getElementById('nacimiento_med').readOnly=condicion;
        document.getElementById('telf-med').readOnly=condicion
        document.getElementById('pais-med').readOnly=condicion;
        document.getElementById('estado-med').readOnly=condicion;
        //document.getElementById('convenio-med').readOnly=condicion;
    }   
}

//Función Actualizar Médico
function actualizarMedico(){
    var cod_medico = document.getElementById('codigo_user-medico').value;
    var tipo_doc_med = document.getElementById('select-tip_doc').value;
    var num_docMed = document.getElementById('numdoc').value;
    var nombreMed = document.getElementById('nombre-medico').value;
    var medicoPaterno = document.getElementById('paterno_med').value;
    var medicoMaterno = document.getElementById('materno_med').value;
    var correoMed = document.getElementById('correo-med').value;
    var nacimientoMed = document.getElementById('nacimiento_med').value;
    var sexoMed = document.getElementById("select-sexo").value;
    var telefMed = document.getElementById("telf-med").value;

    var medicoPais = document.getElementById('pais-med').value;
    var medicoCiudad = document.getElementById('estado-med').value;
    var actividadMed = document.getElementById('select-activ').value;
    var planDonaMed = document.getElementById('select-plan').value;
    
    swal({
        title: '¿SEGURO QUE DESEA ACTUALIZAR ESTE REGISTRO?',
        text: "Se actualizarán los datos de este Médico",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Actualizar',
        cancelButtonText: 'No, Cancelar !'
    }).then(function () {
                $.ajax({
                url: "includes/admin/crud_medico.php",
                type: "POST",
                dataType:'json',
                data:{
                    idUser_medico:cod_medico,
                    tipo_docMed:tipo_doc_med,
                    numdoc_med:num_docMed,
                    nombre_med:nombreMed,
                    apellido_p_med:medicoPaterno,
                    apellido_m_med:medicoMaterno,
                    correo_med: correoMed,
                    fecha_nac_med:nacimientoMed,
                    sexo_med:sexoMed,
                    telefono_med:telefMed,
                    pais_med:medicoPais,
                    ciudad_med:medicoCiudad,
                    activ_med:actividadMed,
                    dona_med:planDonaMed,
                },
                cache: false,
                success: function(arr){
                    swal({
                        title: 'Médico Actualizado',
                        text: 'Se han actualizado los datos satisfactoriamente.',
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

//Función editar Usuario
function editUser(z){
    var condicion = z;

    if(condicion == false) {
        document.getElementById('tipo_doc').classList.add("d-none");
        document.getElementById('select_tipo_doc').classList.remove("d-none");
        document.getElementById('sexo_user').classList.add("d-none");
        document.getElementById('select_sexoUser').classList.remove("d-none");
        document.getElementById('userActividad').classList.add("d-none");
        document.getElementById('select_activUser').classList.remove("d-none");
        document.getElementById('planDona_user').classList.add("d-none");
        document.getElementById('select_planUser').classList.remove("d-none");


        document.getElementById("guardar_user").classList.remove("d-none");

        document.getElementById('numdocUser').readOnly=condicion;
        document.getElementById('nombre_user').readOnly=condicion;
        document.getElementById('paterno_user').readOnly=condicion;
        document.getElementById('materno_user').readOnly=condicion;
        document.getElementById('correo_user').readOnly=condicion;
        document.getElementById('nacimiento_user').readOnly=condicion;
        document.getElementById('telf_user').readOnly=condicion;
        document.getElementById('pais_user').readOnly=condicion;
        document.getElementById('estadoUser').readOnly=condicion;
        //document.getElementById('convenioUser').readOnly=condicion;
    }else{ 
        document.getElementById('tipo_doc').classList.remove("d-none");
        document.getElementById('select_tipo_doc').classList.add("d-none");
        document.getElementById('sexo_user').classList.remove("d-none");
        document.getElementById('select_sexoUser').classList.add("d-none");
        document.getElementById('userActividad').classList.remove("d-none");
        document.getElementById('select_activUser').classList.add("d-none");
        document.getElementById('planDona_user').classList.remove("d-none");
        document.getElementById('select_planUser').classList.add("d-none");

        document.getElementById('guardar_user').classList.add("d-none");

        document.getElementById('tipo_doc').readOnly=condicion;
        document.getElementById('sexo_user').readOnly=condicion;
        document.getElementById('userActividad').readOnly=condicion;
        document.getElementById('planDona_user').readOnly=condicion;

        document.getElementById('numdocUser').readOnly=condicion;
        document.getElementById('nombre_user').readOnly=condicion;
        document.getElementById('paterno_user').readOnly=condicion;
        document.getElementById('materno_user').readOnly=condicion;
        document.getElementById('correo_user').readOnly=condicion;
        document.getElementById('nacimiento_user').readOnly=condicion;
        document.getElementById('telf_user').readOnly=condicion
        document.getElementById('pais_user').readOnly=condicion;
        document.getElementById('estadoUser').readOnly=condicion;
        //document.getElementById('convenioUser').readOnly=condicion;
    }   
}

//Función Actualizar Usuario
function actualizarUser(){
    var cod_user = document.getElementById('codigo_user').value;
    var tipo_doc_user = document.getElementById('select_tipo_doc').value;
    var num_docUser = document.getElementById('numdocUser').value;
    var nombreUser = document.getElementById('nombre_user').value;
    var userPaterno = document.getElementById('paterno_user').value;
    var userMaterno = document.getElementById('materno_user').value;
    var correoUser = document.getElementById('correo_user').value;
    var nacimientoUser = document.getElementById('nacimiento_user').value;
    var sexoUser = document.getElementById("select_sexoUser").value;
    var telefUser = document.getElementById("telf_user").value;

    var userPais = document.getElementById('pais_user').value;
    var userCiudad = document.getElementById('estadoUser').value;
    var actividadUser = document.getElementById('select_activUser').value;
    var planDonaUser = document.getElementById('select_planUser').value;
    
    swal({
        title: '¿SEGURO QUE DESEA ACTUALIZAR ESTE REGISTRO?',
        text: "Se actualizarán los datos de este Usuario",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Actualizar',
        cancelButtonText: 'No, Cancelar !'
    }).then(function () {
                $.ajax({
                url: "includes/admin/crud_usuario.php",
                type: "POST",
                dataType:'json',
                data:{
                    id_usuario:cod_user,
                    tipo_docUser:tipo_doc_user,
                    numdoc_user:num_docUser,
                    nombre_user:nombreUser,
                    apellido_p_user:userPaterno,
                    apellido_m_user:userMaterno,
                    correo_user: correoUser,
                    fecha_nac_user:nacimientoUser,
                    sexo_user:sexoUser,
                    telefono_user:telefUser,
                    pais_user:userPais,
                    ciudad_user:userCiudad,
                    activ_user:actividadUser,
                    dona_user:planDonaUser,
                },
                cache: false,
                success: function(arr){
                    swal({
                        title: 'Usuario Actualizado',
                        text: 'Se han actualizado los datos satisfactoriamente.',
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

//Función editar Admin
function editAdmin(z){
    var condicion = z;

    if(condicion == false) {
        document.getElementById('tipo_docAdm').classList.add("d-none");
        document.getElementById('select_tipo_docAdm').classList.remove("d-none");
        document.getElementById('sexo_admin').classList.add("d-none");
        document.getElementById('select_adminSexo').classList.remove("d-none");
        document.getElementById('actividad_admin').classList.add("d-none");
        document.getElementById('select_adm_activ').classList.remove("d-none");
        document.getElementById('planDonaAdmin').classList.add("d-none");
        document.getElementById('selectPlan_admin').classList.remove("d-none");


        document.getElementById("guardar_admin").classList.remove("d-none");

        document.getElementById('area_admin').readOnly=condicion;
        document.getElementById('numdocAdm').readOnly=condicion;
        document.getElementById('nombre_adm').readOnly=condicion;
        document.getElementById('paterno_admin').readOnly=condicion;
        document.getElementById('materno_admin').readOnly=condicion;
        document.getElementById('correo_admin').readOnly=condicion;
        document.getElementById('nacimiento_adm').readOnly=condicion;
        document.getElementById('telf_admin').readOnly=condicion;
        document.getElementById('pais_admin').readOnly=condicion;
        document.getElementById('ciudad_admin').readOnly=condicion;
        //document.getElementById('convenio_adm').readOnly=condicion;
    }else{ 
        document.getElementById('tipo_docAdm').classList.remove("d-none");
        document.getElementById('select_tipo_docAdm').classList.add("d-none");
        document.getElementById('sexo_admin').classList.remove("d-none");
        document.getElementById('select_adminSexo').classList.add("d-none");
        document.getElementById('actividad_admin').classList.remove("d-none");
        document.getElementById('select_adm_activ').classList.add("d-none");
        document.getElementById('planDonaAdmin').classList.remove("d-none");
        document.getElementById('selectPlan_admin').classList.add("d-none");

        document.getElementById('guardar_admin').classList.add("d-none");

        document.getElementById('tipo_docAdm').readOnly=condicion;
        document.getElementById('sexo_admin').readOnly=condicion;
        document.getElementById('actividad_admin').readOnly=condicion;
        document.getElementById('planDonaAdmin').readOnly=condicion;

        document.getElementById('area_admin').readOnly=condicion;
        document.getElementById('numdocAdm').readOnly=condicion;
        document.getElementById('nombre_adm').readOnly=condicion;
        document.getElementById('paterno_admin').readOnly=condicion;
        document.getElementById('materno_admin').readOnly=condicion;
        document.getElementById('correo_admin').readOnly=condicion;
        document.getElementById('nacimiento_adm').readOnly=condicion;
        document.getElementById('telf_admin').readOnly=condicion
        document.getElementById('pais_admin').readOnly=condicion;
        document.getElementById('ciudad_admin').readOnly=condicion;
        //document.getElementById('convenio_adm').readOnly=condicion;
    }   
}

//Función Actualizar Admin
function actualizarAdmin(){
    var cod_adm = document.getElementById('codigo_user_admin').value;
    var areaAdmin = document.getElementById('area_admin').value;
    var tipo_doc_adm = document.getElementById('select_tipo_docAdm').value;
    var num_docAdmin = document.getElementById('numdocAdm').value;
    var nombre_adm = document.getElementById('nombre_adm').value;
    var adminPaterno = document.getElementById('paterno_admin').value;
    var adminMaterno = document.getElementById('materno_admin').value;
    var correoAdmin = document.getElementById('correo_admin').value;
    var nacimientoAdmin = document.getElementById('nacimiento_adm').value;
    var sexoAdmin = document.getElementById("select_adminSexo").value;
    var telfAdmin = document.getElementById("telf_admin").value;

    var adminPais = document.getElementById('pais_admin').value;
    var adminCiudad = document.getElementById('ciudad_admin').value;
    var actividadAdmin = document.getElementById('select_adm_activ').value;
    var planDona_adm = document.getElementById('selectPlan_admin').value;
    
    swal({
        title: '¿SEGURO QUE DESEA ACTUALIZAR ESTE REGISTRO?',
        text: "Se actualizarán los datos de este Administrador",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Actualizar',
        cancelButtonText: 'No, Cancelar !'
    }).then(function () { 
                $.ajax({
                url: "includes/admin/crud_admin.php",
                type: "POST",
                dataType:'json',
                data:{
                    id_admUser:cod_adm,
                    area_adm: areaAdmin,
                    tipo_docAdm:tipo_doc_adm,
                    numdoc_adm:num_docAdmin,
                    nombre_admin:nombre_adm,
                    apellido_p_adm:adminPaterno,
                    apellido_m_adm:adminMaterno,
                    correo_admin: correoAdmin,
                    fecha_nac_adm:nacimientoAdmin,
                    sexo_adm:sexoAdmin,
                    telefono_adm:telfAdmin,
                    pais_adm:adminPais,
                    ciudad_adm:adminCiudad,
                    activ_adm:actividadAdmin,
                    dona_adm:planDona_adm,
                },
                cache: false,
                success: function(arr){
                    swal({
                        title: 'Administrador Actualizado',
                        text: 'Se han actualizado los datos satisfactoriamente.',
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

//---- FUNCIONES PARA AÑADIR NUEVOS USER/PSICO/ADMINS----
//función mensaje
function msje_regUser(){
    swal({title: "Registrando Usuario...",allowEscapeKey: false,allowOutsideClick:false,text: "Espere unos segundos.",showConfirmButton: false});
}
function msje_regMed(){
    swal({title: "Registrando Médico...",allowEscapeKey: false,allowOutsideClick:false,text: "Espere unos segundos.",showConfirmButton: false});
}
function msje_regAdm(){
    swal({title: "Registrando Administrador...",allowEscapeKey: false,allowOutsideClick:false,text: "Espere unos segundos.",showConfirmButton: false});
}

//--- FUNCIONES PARA EDITAR PERFIL ----

 // Función para Mi Perfil
function editarPerfil(z){
    var condicion = z;

    if(condicion == false) {
        //para campo Sexo
        document.getElementById('perfilSexo').classList.add("d-none");
        document.getElementById('select_perfilSexo').classList.remove("d-none");

        document.getElementById('perfilNombre').readOnly=condicion;
        document.getElementById('perfilPaterno').readOnly=condicion;
        document.getElementById('perfilMaterno').readOnly=condicion;
        document.getElementById('perfilTelf').readOnly=condicion;
        document.getElementById('perfilNroDoc').readOnly=condicion;
        document.getElementById('perfilPais').readOnly=condicion;
        document.getElementById('perfilCiudad').readOnly=condicion;
        document.getElementById('perfilNacimiento').readOnly=condicion;

        //botón de actualizar
        document.getElementById("guardar_perfil").classList.remove("d-none");
        document.getElementById("cancelar_perfil").classList.remove("d-none");

        document.getElementById("edit_perfil").classList.add("d-none");
    }else{ 
        document.getElementById('perfilSexo').classList.remove("d-none");
        document.getElementById('select_perfilSexo').classList.add("d-none");

        document.getElementById('perfilNombre').readOnly=condicion;
        document.getElementById('perfilPaterno').readOnly=condicion;
        document.getElementById('perfilMaterno').readOnly=condicion;
        document.getElementById('perfilTelf').readOnly=condicion;
        document.getElementById('perfilNroDoc').readOnly=condicion;
        document.getElementById('perfilPais').readOnly=condicion;
        document.getElementById('perfilCiudad').readOnly=condicion;
        document.getElementById('perfilNacimiento').readOnly=condicion;

        //botón de actualizar
        document.getElementById("guardar_perfil").classList.add("d-none");
        document.getElementById("cancelar_perfil").classList.add("d-none");

        document.getElementById("edit_perfil").classList.remove("d-none");
    }   
}
function cancelPerfil(a){
    var condicion = a;

    document.getElementById('perfilSexo').classList.remove("d-none");
    document.getElementById('select_perfilSexo').classList.add("d-none");

    document.getElementById('perfilNombre').readOnly=condicion;
    document.getElementById('perfilPaterno').readOnly=condicion;
    document.getElementById('perfilMaterno').readOnly=condicion;
    document.getElementById('perfilTelf').readOnly=condicion;
    document.getElementById('perfilNroDoc').readOnly=condicion;
    document.getElementById('perfilPais').readOnly=condicion;
    document.getElementById('perfilCiudad').readOnly=condicion;
    document.getElementById('perfilNacimiento').readOnly=condicion;

    //botón de actualizar
    document.getElementById("guardar_perfil").classList.add("d-none");
    document.getElementById("cancelar_perfil").classList.add("d-none");

    document.getElementById("edit_perfil").classList.remove("d-none");
}

 // Función Actualizar Mi Perfil
function actualizarPerfil(){
    var codPerfil = document.getElementById('cod_perfil').value;
    var nombrePerfil = document.getElementById('perfilNombre').value;
    var perfilPaterno = document.getElementById('perfilPaterno').value;
    var perfilMaterno = document.getElementById('perfilMaterno').value;
    var perfilTelf = document.getElementById('perfilTelf').value;
    var perfilNumDoc = document.getElementById('perfilNroDoc').value;
    var perfilPais = document.getElementById("perfilPais").value;
    var perfilCiudad = document.getElementById("perfilCiudad").value;
    var perfilNac = document.getElementById('perfilNacimiento').value;

    var perfilSexo = document.getElementById('select_perfilSexo').value;
    
    swal({
        title: '¿SEGURO QUE DESEA ACTUALIZAR SU PERFIL?',
        text: "Se actualizarán los datos modificados",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Actualizar',
        cancelButtonText: 'No, Cancelar !'
    }).then(function () {
                $.ajax({
                url: "includes/admin/crud_perfil.php",
                type: "POST",
                dataType:'json',
                data:{
                    id_perfil:codPerfil,
                    nombre_perfil:nombrePerfil,
                    paterno_perfil:perfilPaterno,
                    materno_perfil:perfilMaterno,
                    telf_perfil:perfilTelf,
                    numdoc_perfil:perfilNumDoc,
                    pais_perfil:perfilPais,
                    ciudad_perfil:perfilCiudad,
                    nacimiento_perfil:perfilNac,
                    sexo_perfil:perfilSexo,
                },
                cache: false,
                success: function(arr){
                    swal({
                        title: 'Perfil Actualizado',
                        text: 'Se han actualizado los datos del perfil satisfactoriamente.',
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