$(document).ready(()=>{
    const validarLogin = new JustValidate("form#login");
    validarLogin.addField("#user",[
      {
        rule:"required",
        errorMessage:"Falta tu boleta"
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
    ]).addField("#pasword",[
      {
        rule:"required",
        errorMessage:"Falta tu contraseña"
      },
      {
        rule:"password",
        errorMessage:"Mínimo 8 caracteres, una letra, un número"
      }
    ]).onSuccess(()=>{
      $.ajax({
        url:"./PHP/index_AX.php",
        method:"POST",
        data:$("form#login").serialize(),
        cache:false,
        success:(respAX)=>{
          let AX = JSON.parse(respAX);
          Swal.fire({
            title:"ESCOM - IPN",
            text:AX.msj,
            icon:AX.icono,
            didDestroy:()=>{
              if(AX.cod == 0)
                location.reload();
              else
                location.href = "./PHP/user.php";
            }
          }); // sweetAlert/
        }
      }); // ajax/
    }); // justValidate/
  }); // ready/