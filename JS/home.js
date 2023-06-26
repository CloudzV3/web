
let titleHome = document.getElementById("title_home");
let activitiesTableBody = document.getElementById("table_actividades");
let materiasTableBody = document.getElementById("table_materias");
let actvitiesData = [];
let materiassData = [];

function getInitialData() {
    titleHome.textContent = "Bienvenido " + CacheManager.getData("nombre")
    getActivitiesData()
    getMateriasData()
}

function getActivitiesData() {
    $.ajax({
        url:"PHP/GetActivitiesData.php",
        method:"GET",
        success: (response) => {
            response = JSON.parse(response);
            activitiesData = response;
            getProfessorActivitiesData()
            console.log(response);
        },
        error: (error) => {
            console.log(error);
        }
    });
}

function getMateriasData() {
    $.ajax({
        url:"PHP/GetMateriasData.php",
        method:"GET",
        success: (response) => {
            response = JSON.parse(response);
            materiasData = response;
            getProfessorMateriasData()
            console.log(response);
        },
        error: (error) => {
            console.log(error);
        }
    });
}

function getProfessorActivitiesData() {
    let data = {
        boleta: CacheManager.getData("boleta")
    }
    $.ajax({
        url:"PHP/GetProfessorActivities.php",
        method:"GET",
        data: data,
        success: (response) => {
            response = JSON.parse(response);
            setActivitiesData(response);
            console.log(response);
        },
        error: (error) => {
            console.log(error);
        }
    });
}

function getProfessorMateriasData() {
    let data = {
        boleta: CacheManager.getData("boleta")
    }
    $.ajax({
        url:"PHP/GetProfessorMaterias.php",
        method:"GET",
        data: data,
        success: (response) => {
            response = JSON.parse(response);
            setMateriassData(response);
            console.log(response);
        },
        error: (error) => {
            console.log(error);
        }
    });
}

function setActivitiesData(response) {
    for (let i = 0; i < response.length; i++) {
        let tr = document.createElement("tr");
        let clave = document.createElement("td");
        clave.textContent = response[i].claveact;
        let nombre = document.createElement("td");
        let valor = activitiesData.filter((activity) => {
            return activity.claveact === response[i].claveact;
        })[0]
        nombre.textContent = valor.nombre ?? "No encontrado"
        let horas = document.createElement("td");
        horas.textContent = response[i].numhrs;
        tr.appendChild(clave);
        tr.appendChild(nombre);
        tr.appendChild(horas);
        activitiesTableBody.appendChild(tr)
    }
}

function setMateriassData(response) {
    for (let i = 0; i < response.length; i++) {
        let tr = document.createElement("tr");
        let clave = document.createElement("td");
        clave.textContent = response[i].clavemat;
        let nombre = document.createElement("td");
        let valor = materiasData.filter((activity) => {
            return activity.clavemat === response[i].clavemat;
        })[0]
        nombre.textContent = valor.nombre ?? "No encontrado"
        let nomalter = document.createElement("td");
        nomalter.textContent = valor.nomalter ?? "No encontrado";
        let semestre = document.createElement("td");
        semestre.textContent = valor.semestre ?? "No encontrado";
        let academia = document.createElement("td");
        academia.textContent = valor.academia ?? "No encontrado";
        let plan = document.createElement("td");
        plan.textContent = valor.plan ?? "No encontrado";
        let programa = document.createElement("td");
        programa.textContent = valor.programa ?? "No encontrado";
        tr.appendChild(clave);
        tr.appendChild(nombre);
        // tr.appendChild(nomalter);
        tr.appendChild(semestre);
        tr.appendChild(academia);
        tr.appendChild(plan);
        tr.appendChild(programa);
        materiasTableBody.appendChild(tr)
    }
}