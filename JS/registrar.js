$(document).ready(()=>{
  const validarRegistro = new JustValidate("form#formregistro");
  validarRegistro.addField("#boleta",[
    {
      rule:"required",
      errorMessage:"Falta tu boleta"
    },
    {
      rule:"minLength",
      value:8,
      errorMessage:"Mínimo 8 digitos"
    },
    {
      rule:"maxLength",
      value:10,
      errorMessage:"Máximo 10 digitos"
    }
  ]).addField("#nombre",[
    {
      rule:"required",
      errorMessage:"Ingresa tu nombre"
    }
  ]).addField("#apPat ",[
    {
      rule:"required",
      errorMessage:"Ingresa el primer apellido"
    }
  ]).addField("#apMat ",[
    {
      rule:"required",
      errorMessage:"Ingresa el segundo  apellido"
    }
  ]).addField("#correo",[
    {
      rule:"required",
      errorMessage:"Ingresa tu correo"
    },
    {
      rule:"email",
      errorMessage:"Revisa formato de tu correo"
    }
  ]).addField("#depto",[
    {
      rule:"required",
      errorMessage:"Ingresa el departamanto al que pertenece el profesor"
    }
  ]).addField("#password",[
    {
      rule:"required",
      errorMessage:"Falta ingresar tu contraseña"
    },
    {
      rule:"password",
      errorMessage:"Mínimo 8 caracteres, una letra, un número"
    }
  ]).onSuccess(()=>{
    $.ajax({
      url:"./PHP/registrar.php",
      method:"POST",
      data:$("form#formregistro").serialize(),
      cache:false,
      success:(respAX)=>{
        let AX = JSON.parse(respAX);
        Swal.fire({
          title:"ESCOM-IPN",
          text:AX.msj,
          icon:AX.icono,
          didDestroy:()=>{
            if(AX.cod == 1)
              location.href = "HSAdmin.html";
            if(AX.cod == 0 || AX.cod == 2)
              location.reload();
          }
        }); // sweetAlert/
      }
    }); // ajax/
  }); // justValidate/
}); // ready/