function sesion(){
    let sesion = CacheManager.getData("sesion");
    console.log(window.location.href);
    if(sesion === "0"){
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
  