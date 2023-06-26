function getInitialValues(){
    let sesion = CacheManager.getData("sesion");
    if(sesion === "1"){
      if(CacheManager.getData("nomdepto") === "ADM"){
        location.href = "HSAdmin.html";
      } else {
        location.href = "home.html";
      }
    } 
  }
  
  function logout(){
    CacheManager.saveData("sesion","0");
    location.replace("index.html")
  }
  