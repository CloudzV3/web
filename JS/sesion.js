function getInitialValues(){
    let sesion = CacheManager.getData("sesion");
    if(sesion === "1"){
      if(CacheManager.getData("nomDepto") === "ADM"){
        location.href = "HSAdmin.html";
      } else {
        location.href = "home.html";
      }
    } else{
        location.replace("index.html");
    }

  }
  
  function logout(){
    CacheManager.saveData("sesion","0");
    CacheManager.removeData("boleta");
    CacheManager.removeData("nombre");
    CacheManager.removeData("apPat");
    CacheManager.removeData("apMat");
    CacheManager.removeData("estadoE");
    CacheManager.removeData("correo");
    CacheManager.removeData("acceso");
    CacheManager.removeData("nomDepto");
    location.replace("index.html");
  }
  