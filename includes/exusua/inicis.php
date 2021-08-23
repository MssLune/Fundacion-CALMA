<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesión</title>

    <link rel="stylesheet" href="././css/inicis.css">
</head>
<body>
  <section>
    <div class="contenedor">
      <div class="contenedor-contenido">
        <div class="contenedor-formulario">
          <h1 class="mb-2">Iniciar Sesion</h1>
          <h3 class="mb-3">Accede a su cuenta</h3>
          <form id="form_login">
              <div class="input">
                <span> Ingresa tu correo </span>
                <input type="text" name="" id="" class="correo" required/>
              </div>
              <div class="input">
                <span> Ingresa tu contraseña </span>
                <input type="password" name="" id="" class="contraseña" required/>
              </div>
              <div class="input">
                <span><center>¿Aun no tienes cuenta?</center></span>
                <a href="includes/inicio/registrar/registros.php"class="text-primary text-gradient font-weight-bold"><center>Registrarse</center></a>
                <p class="mb-3 text-sm mx-auto">
                <a  href="javascript:;"class="text-primary text-gradient font-weight-bold"><span><center>¿Olvidaste tu Contraseña?</center></span></a>
                <button type="submit">
                <div class="loader" id="loader"></div>
                <center><div class="tiutlo-boton btn-lg w-40 mt- mb-0">Ingresar</div><center>
                </button>
                </p>
              </div>
          </form>
        </div>
    </div>
    <div class="contenedor-img">
      <img src="assets/img/logocalma.png" alt="">
    </div>
  </div>
</section>




</body>
