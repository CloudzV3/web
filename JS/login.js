function getInitialValues(){
  let sesion = CacheManager.getData("sesion");
  if(sesion === "1"){
    if(CacheManager.getData("nomDepto") === "ADM"){
      location.href = "HSAdmin.html";
    } else {
      location.href = "home.html";
    }
  } 
}

$(document).ready(()  =>{
  
  const validarLogin = new JustValidate("#formlogin");
  validarLogin.addField("#boleta",[
    {
      rule:"required",
      errorMessage:"Falta tu boleta",
    },
    {
      rule:"minLength",
      value:8,
      errorMessage:"Mínimo 8 digitos",
    },
    {
      rule:"maxLength",
      value:10,
      errorMessage:"Máximo 10 digitos",
    }
  ]).addField("#password",[
    {
      rule:"required",
      errorMessage:"Falta tu contraseña",
    },
    {
      rule:"password",
      errorMessage:"Mínimo 8 caracteres, una letra, un número",
    }
  ]).onSuccess(()=>{
    $.ajax({
      url: "./PHP/login.php",
      method: "POST",
      data: $("form#formlogin").serialize(),
      cache: false,
      success:(respAX)=>{
        let AX = JSON.parse(respAX);
        Swal.fire({
          title:"ESCOM - IPN",
          text:AX.msj,
          icon:AX.icono,
          didDestroy:()=>{
            console.log(AX.cod);
            if(AX.cod === "1"){
              CacheManager.saveData("boleta",AX.boleta)
              CacheManager.saveData("nombre",AX.nombre)
              CacheManager.saveData("apPat",AX.apPat)
              CacheManager.saveData("apMat",AX.apMat)
              CacheManager.saveData("nomDepto",AX.depto)
              CacheManager.saveData("correo",AX.correo)
              CacheManager.saveData("estadoE",AX.estadoE)
              CacheManager.saveData("acceso",AX.acceso)
              CacheManager.saveData("sesion","1")
              if(AX.depto === "ADM"){
                location.href = "HSAdmin.html";
              }else{
                location.href = "home.html";
              }
            }
            else
              location.href = "index.html";
          }
        }); // sweetAlert/
      }
    });
  }); // justValidate/
}); // ready/