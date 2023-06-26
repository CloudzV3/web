
let nombre = document.getElementById("nombreAdmin");
let depto = document.getElementById("depto");


function getInitialValues (){
    var name = CacheManager.getData("nombre");
    var departamento = CacheManager.getData("nomDepto");
    nombre.innerText = name;
    depto.innerText = departamento;
    
}