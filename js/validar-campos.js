//--VALIDAR CAMPOS - -REGISTRARSE

  //formulario
  const formulario = document.getElementById('form-registro');
  //console.log("form: " +formulario);
    //inputs
  const inputs = document.querySelectorAll('#form-registro input');
    //expresiones regulares
  const expresiones = {
      //password: /^.{4,12}$/, // 4 a 12 digitos.
      correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
      telefono: /^\d{7,9}$/ // 7 a 9 numeros.
  }
  const campos = {
      password: false,
      correo: false,
      telefono: false
  }
  
  // validar campos
  const validarCampo = (expresion, input, campo) => {
      if(expresion.test(input.value)){
          document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
          campos[campo] = true;
      } else {
          document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
          campos[campo] = false;
      }
  }
  
  //validar contraseña
  const validarPassword2 = () => {
      const inputPassword1 = document.getElementById('pass-registro');
      const inputPassword2 = document.getElementById('pass-confirm-registro');
  
      if(inputPassword1.value !== inputPassword2.value){
          document.querySelector(`#grupo__passConfirm .formulario__input-error`).classList.add('formulario__input-error-activo');
          campos['password'] = false;
      } else {
          document.querySelector(`#grupo__passConfirm .formulario__input-error`).classList.remove('formulario__input-error-activo');
          campos['password'] = true;
      }
  }
  
    //función para validar todos los input en formulario
    const validarFormulario = (e) => {
      switch (e.target.name) {
        //en base al name de inputs
        case "pass_registrar":
          validarPassword2();
        break;
        case "pass-confirm_registrar":
          validarPassword2();
        break;
        case "email-user_registrar":
          validarCampo(expresiones.correo, e.target, 'email');
        break;
        case "celular_registrar":
          validarCampo(expresiones.telefono, e.target, 'celular');
        break;
      }
    }
    //Comprobar en cada input al escribir y click fuera
  inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
  });
  