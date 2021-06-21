<?php 
    require_once '../../database/database.php';

$arr='';
	//Más info - Admin
	if(isset($_POST["cod_userAdmin"])){
		$pdo = Database::connect();

		$sql = "SELECT * FROM usuarios u INNER JOIN admin adm ON u.id_usuario = adm.usuario_id INNER JOIN sexo s ON u.sexo = s.id_genero INNER JOIN tipodocumentoidentidad tdoc ON tdoc.id_tipoDoc = u.tipo_doc INNER JOIN convenio conv ON conv.codigo_convenio = u.id_convenio INNER JOIN dona_recurrente drec ON drec.id_donaRecurrente = u.cod_recurrenteDona WHERE u.id_usuario='".$_POST['cod_userAdmin']."'";

	    $busqueda=$pdo->query($sql);
	    $arrDatos=$busqueda->fetchAll(PDO::FETCH_ASSOC);
		
		foreach ($arrDatos as $row) {
			$arr = array(
                $row['id_usuario'], //0
                $row['nombres'], //1
                $row['apellido_pat'], //2
                $row['apellido_mat'], //3
                $row['correo_user'], //4
                $row['tipo_doc'], //5
                $row['nombre_tipoDoc'], //6
                $row['nro_doc'], //7
                $row['fecha_nacimiento'], //8
                $row['sexo'], //9
                $row['nombre_genero'], //10
                $row['telefono'], //11
                $row['pais'], //12
                $row['estado_lugar'], //13
                $row['id_convenio'], //14
                $row['nombre_convenio'], //15
                $row['cod_recurrenteDona'], //16
                $row['nombre_donaRecurrente'], //17
                $row['actividad'], //18
				$row['area_admin'] //19
            );
		}

		echo json_encode($arr);
		unset($arr);

        Database::disconnect();
	}else if(isset($_POST['id_admUser'])){
		//Actualizar Admin
		$pdo=Database::connect();

	 	$codigo_admin=$_POST['id_admUser'];
		$areaAdm=$_POST['area_adm'];
		$tipoDoc_adm=$_POST['tipo_docAdm'];
		$num_doc_adm=$_POST['numdoc_adm'];
		$nombre_adm=$_POST['nombre_admin'];
		$ape_pat_adm=$_POST['apellido_p_adm'];
		$ape_mat_adm=$_POST['apellido_m_adm'];
		$correo_adm=$_POST['correo_admin'];
		$nacimiento_adm=$_POST['fecha_nac_adm'];
		$sexo_adm=$_POST['sexo_adm'];
		$telf_adm=$_POST['telefono_adm'];
		$pais_adm=$_POST['pais_adm'];
		$ciudad_adm=$_POST['ciudad_adm'];
		$activ_adm=$_POST['activ_adm'];
		$donacion_adm=$_POST['dona_adm'];

		$sql="UPDATE usuarios, admin SET 
		usuarios.nombres='$nombre_adm',
		usuarios.apellido_pat='$ape_pat_adm',
		usuarios.apellido_mat='$ape_mat_adm',
		usuarios.correo_user='$correo_adm',
		usuarios.tipo_doc='$tipoDoc_adm',
		usuarios.nro_doc='$num_doc_adm',
		usuarios.fecha_nacimiento='$nacimiento_adm',
		usuarios.sexo='$sexo_adm',
		usuarios.telefono='$telf_adm',
		usuarios.pais='$pais_adm',
		usuarios.estado_lugar='$ciudad_adm',
		usuarios.cod_recurrenteDona='$donacion_adm',
		usuarios.actividad='$activ_adm',
		admin.area_admin='$areaAdm' 
		WHERE usuarios.id_usuario='$codigo_admin' 
		AND usuarios.id_usuario = admin.usuario_id";
		
		$q = $pdo->prepare($sql);
		$q->execute(array());

		$arr='Admin_actualizado';

		echo json_encode($arr);
		unset($arr);

		Database::disconnect();

	}else if(isset($_POST["elimina_admin"])){
		//Eliminar Admin
		$codigo_adm=$_POST["elimina_admin"];

		$pdo = Database::connect();
		
		$sql = "DELETE usuarios, admin FROM usuarios INNER JOIN admin ON admin.usuario_id = usuarios.id_usuario WHERE usuarios.id_usuario = ".$codigo_adm."";

		$pdo->query($sql);
		error_log($sql);
		$arr = array("Eliminado_admin");

		echo json_encode($arr);
		unset($arr);
		Database::disconnect();

	}
?>