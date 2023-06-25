$(document).ready(()=>{
    const validarRegistro = new JustValidate("form#login");
    validarRegistro.addField("#user",[
      {
        rule:"required",
        errorMessage:"Falta ingresar boleta"
      },
      /*{
        rule:"integer",
        errorMessage:"Deben ser solo números"
      },*/
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
        errorMessage:"Ingrese nombre."
      }
    ]).addField("#apPat",[
      {
        rule:"required",
        errorMessage:"Falta ingresar primer apellido."
      }
    ]).addField("#email",[
      {
        rule:"required",
        errorMessage:"Falta correo."
      },
      {
        rule:"email",
        errorMessage:"Revisa formato de correo."
      }
    ]).addField("#depto",[
      {
        rule:"required",
        errorMessage:"Falta ingresar departamento."
      },
      /*{
        rule:"minLength",
        value:10,
        errorMessage:"Mínimo 4 digitos"
      },
      {
        rule:"maxLength",
        value:10,
        errorMessage:"Máximo 10 digitos"
      }*/
    ]).addField("#pasword",[
      {
        rule:"required",
        errorMessage:"Falta ingresar contraseña"
      },
      {
        rule:"password",
        errorMessage:"Mínimo 8 caracteres, una letra, un número"
      }
    ]).onSuccess(()=>{
      $.ajax({
        url:"./php/registrar_AX.php",
        method:"POST",
        data:$("form#login").serialize(),
        cache:false,
        success:(respAX)=>{
          let AX = JSON.parse(respAX);
          Swal.fire({
            title:"ESCOM-IPN",
            text:AX.msj,
            icon:AX.icono,
            didDestroy:()=>{
              if(AX.cod == 1)
                location.href = "./";
              if(AX.cod == 0 || AX.cod == 2)
                location.reload();
            }
          }); // sweetAlert/
        }
      }); // ajax/
    }); // justValidate/
  }); // ready/