<?php 
    require_once '../../database/database.php';

$arr='';
	//Editar -- Mi Perfil
	if(isset($_POST["id_perfil"])){
		$pdo=Database::connect();

	 	$codigo_perfil=$_POST['id_perfil'];
		$nombre_perfil=$_POST['nombre_perfil'];
		$ape_pat_perfil=$_POST['paterno_perfil'];
		$ape_mat_perfil=$_POST['materno_perfil'];
		$telf_perfil=$_POST['telf_perfil'];
		$nroDoc_perfil=$_POST['numdoc_perfil'];
		$pais_perfil=$_POST['pais_perfil'];
		$ciudad_perfil=$_POST['ciudad_perfil'];
		$nacimiento_perfil=$_POST['nacimiento_perfil'];
		$sexo_perfil=$_POST['sexo_perfil'];

		$sql="UPDATE usuarios SET 
		nombres='$nombre_perfil',
		apellido_pat='$ape_pat_perfil',
		apellido_mat='$ape_mat_perfil',
		nro_doc='$nroDoc_perfil',
		fecha_nacimiento='$nacimiento_perfil',
		sexo='$sexo_perfil',
		telefono='$telf_perfil',
		pais='$pais_perfil',
		estado_lugar='$ciudad_perfil'
		WHERE id_usuario='$codigo_perfil'";

		$q = $pdo->prepare($sql);
		$q->execute(array());

		$arr='miPerfil_actualizado';

		echo json_encode($arr);
		unset($arr);

		Database::disconnect();
	}/*else if(isset($_POST['id_usuario'])){
		//Actualizar Usuario
		$pdo=Database::connect();

	 	$codigo_user=$_POST['id_usuario'];
		$tipoDoc_user=$_POST['tipo_docUser'];
		$num_doc_user=$_POST['numdoc_user'];
		$nombre_user=$_POST['nombre_user'];
		$ape_pat_user=$_POST['apellido_p_user'];
		$ape_mat_user=$_POST['apellido_m_user'];
		$correo_user=$_POST['correo_user'];
		$nacimiento_user=$_POST['fecha_nac_user'];
		$sexo_user=$_POST['sexo_user'];
		$telf_user=$_POST['telefono_user'];
		$pais_user=$_POST['pais_user'];
		$ciudad_user=$_POST['ciudad_user'];
		$activ_user=$_POST['activ_user'];
		$donacion_user=$_POST['dona_user'];

		$sql="UPDATE usuarios SET 
		nombres='$nombre_user',
		apellido_pat='$ape_pat_user',
		apellido_mat='$ape_mat_user',
		correo_user='$correo_user',
		tipo_doc='$tipoDoc_user',
		nro_doc='$num_doc_user',
		fecha_nacimiento='$nacimiento_user',
		sexo='$sexo_user',
		telefono='$telf_user',
		pais='$pais_user',
		estado_lugar='$ciudad_user',
		cod_recurrenteDona='$donacion_user',
		actividad='$activ_user' 
		WHERE id_usuario='$codigo_user'";

		$q = $pdo->prepare($sql);
		$q->execute(array());

		$arr='Usuario_actualizado';

		echo json_encode($arr);
		unset($arr);

		Database::disconnect();

	}*/
?>