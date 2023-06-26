
let nombre = document.getElementById("name");
let depto = document.getElementById("depto");
let deptoEdit = document.getElementById("departamentoEdit");
let otroNombre = document.getElementById("nombreEdit");
let apellidoPaterno = document.getElementById("apPat");
let apellidoMaterno = document.getElementById("apMat");
let email = document.getElementById("correo");
let boleta = document.getElementById("boleta");

function getInValues (){
    var name = CacheManager.getData("nombre");
    var departamento = CacheManager.getData("nomDepto");
    var apPat = CacheManager.getData("apPat");
    var apMat = CacheManager.getData("apMat");
    var correo = CacheManager.getData("correo");
    var bol = CacheManager.getData("boleta");
    
    boleta.value = bol;
    nombre.textContent = name;
    depto.innerText = departamento;
    deptoEdit.value = departamento;
    otroNombre.value = name;
    apellidoPaterno.value = apPat;
    apellidoMaterno.value = apMat;
    email.value = correo;
}


$(document).ready(()=>{
    const validarRegistro = new JustValidate("form#formedit");
    validarRegistro.addField("#nombreEdit",[
      {
        rule:"required",
        errorMessage:"Falta tu nombre"
      }
    ]).addField("#apPat",[
      {
        rule:"required",
        errorMessage:"Falta tu primer apellidos"
      }
    ]).addField("#apMat",[
        {
          rule:"required",
          errorMessage:"Falta tu segundo apellidos"
        }
    ]).addField("#correo",[
      {
        rule:"required",
        errorMessage:"Falta tu correo"
      },
      {
        rule:"email",
        errorMessage:"Revisa formato de tu correo"
      }
    ]).addField("#departamentoEdit",[
      {
        rule:"required",
        errorMessage:"Falta ingresar tu departamento"
      },
      {
        rule:"minLength",
        value:2,
        errorMessage:"Mínimo 2 carateres"
      },
      {
        rule:"maxLength",
        value:4,
        errorMessage:"Máximo 4 caracteres"
      }
    ]).onSuccess(()=>{
        var data = {
            boleta: boleta.value,
            nombre : otroNombre.value,
            apPat : apellidoPaterno.value,
            apMat : apellidoMaterno.value,
            correo : email.value,
            departamento : deptoEdit.value
        }
      $.ajax({
        url:"./PHP/editar.php",
        method:"POST",
        data: data,
        cache:false,
        success:(respAX)=>{
          let AX = JSON.parse(respAX);
          Swal.fire({
            title:"ESCOM-IPN",
            text:AX.msj,
            icon:AX.icono,
            didDestroy:()=>{
              if(AX.cod == 1)
                CacheManager.saveData("nombre",AX.nombre)
                CacheManager.saveData("apPat",AX.apPat)
                CacheManager.saveData("apMat",AX.apMat)
                CacheManager.saveData("nomDepto",AX.depto)
                CacheManager.saveData("correo",AX.correo)
                location.href = "user.html";
              if(AX.cod == 0)
                location.reload();
            }
          }); // sweetAlert/
        }
      }); // ajax/
    }); // justValidate/
  }); // ready/
