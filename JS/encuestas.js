let siCargaMaxima = document.getElementById("simax");
let noCargaMaxima = document.getElementById("nomax");

let materiasDivElement = document.getElementById('materias');
let activitiesDivElement = document.getElementById('activities');

let nameElement = document.getElementById('input_name');
let boletaElement = document.getElementById('input_boleta');

function getSurveyData() {
    getMateriasData()
    getActivitiesData()
}

function getMateriasData() {
    $.ajax({
        url:"PHP/GetMateriasData.php",
        method:"GET",
        success: (response) => {
            response = JSON.parse(response);
            setMateriasData(response);
            console.log(response);
        },
        error: (error) => {
            console.log(error);
        }
    });
}

function setMateriasData(response) {
    for (let i = 0; i < response.length; i++) {
        let materia = response[i];
        let checkboxElement = document.createElement('input');
        checkboxElement.type = "checkbox"
        checkboxElement.id = materia.clavemat;
        checkboxElement.checked = false;
        let labelElement = document.createElement('label');
        labelElement.setAttribute('for', materia.clavemat);
        labelElement.textContent = materia.nombre;
        let brakLineElement = document.createElement('br');
        materiasDivElement.appendChild(checkboxElement);
        materiasDivElement.appendChild(labelElement);
        materiasDivElement.appendChild(brakLineElement);
    }
}
function getActivitiesData() {
    $.ajax({
        url:"PHP/GetActivitiesData.php",
        method:"GET",
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

function setActivitiesData(response) {
    for (let i = 0; i < response.length; i++) {
        let activity = response[i];
        let checkboxElement = document.createElement('input');
        checkboxElement.type = "checkbox"
        checkboxElement.id = activity.claveact;
        checkboxElement.checked = false;
        let labelElement = document.createElement('label');
        labelElement.setAttribute('for', activity.claveact);
        labelElement.textContent = activity.nombre;
        let brakLineElement = document.createElement('br');
        activitiesDivElement.appendChild(checkboxElement);
        activitiesDivElement.appendChild(labelElement);
        activitiesDivElement.appendChild(brakLineElement);
    }
}
function sendSurvey() {
    let data = {
        "cargaMaxima": siCargaMaxima.value,
        "materias" : {},
        "actividades": {},
        "horas": 10
    }
    $.ajax({
        url:"PHP/SaveSurveyData.php",
        method:"POST",
        body: data,
        success: (response) => {
            console.log(response);
        },
        error: (error) => {
            console.log(error);
        }
    });
}

function getUserData() {
    const data = new FormData(document.getElementById("formulario"));
    $.ajax({
        url:"PHP/GetUserData.php",
        method:"GET",
        body: data,
        success: (response) => {
            response = JSON.parse(response)
            nombre = response.nombre
            boleta = response.boleta
            setUserData(nombre, boleta);
        },
        error: (error) => {
            console.log(error);
        }
    });
}

function setUserData(nombre, boleta) {
    nameElement.value = nombre;
    boletaElement.value = boleta;
}
function encuestas() {
    $.ajax({
        url:"PHP/encuestas.php",
        method:"POST",
        success: (response) => {
            console.log(response);
        },
        error: (error) => {
            console.log(error);
        }
    });
}