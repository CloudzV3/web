let siCargaMaxima = document.getElementById("simax");

let academiaSwitch = document.getElementById("academia");
let planSwitch = document.getElementById("plan");
let programaSwitch = document.getElementById("programa")
let semestreSwitch = document.getElementById("semestre");

let materiasDivElement = document.getElementById('materias');
let activitiesDivElement = document.getElementById('activities');

let nameElement = document.getElementById('input_name');
let boletaElement = document.getElementById('input_boleta');

let materiasData = [];

function getInitialData() {
    getUserData();
    getSurveyData();
}
function getUserData() {
    let boleta = CacheManager.getData('boleta');
    let nombre = CacheManager.getData('nombre');
    setUserData(nombre, boleta);
}

function setUserData(nombre, boleta) {
    nameElement.value = nombre;
    boletaElement.value = boleta;
}
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
            materiasData = response;
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
        if (activity.claveact === "101" || activity.claveact === "102") {
            checkboxElement.checked = true;
            checkboxElement.disabled = true;
            // checkboxElement.setAttribute('onclick', 'return false;')
        }
        let labelElement = document.createElement('label');
        labelElement.setAttribute('for', activity.claveact);
        labelElement.textContent = activity.nombre;
        let breakLineElement = document.createElement('br');
        let breakLine2Element = document.createElement('br');
        let labelHoursElement = document.createElement('label');
        labelHoursElement.setAttribute('for', 'hrs_' + activity.claveact);
        labelHoursElement.textContent = "Numero de horas para " + activity.nombre;
        let inputHoursElement = document.createElement('input');
        inputHoursElement.type = "number";
        inputHoursElement.id = 'hrs_' + activity.claveact;
        inputHoursElement.max = 22;
        inputHoursElement.min = 0;
        inputHoursElement.placeholder = "Numero de horas";
        inputHoursElement.classList.add("validate");
        activitiesDivElement.appendChild(checkboxElement);
        activitiesDivElement.appendChild(labelElement);
        activitiesDivElement.appendChild(breakLineElement);
        activitiesDivElement.appendChild(labelHoursElement);
        activitiesDivElement.appendChild(inputHoursElement);
        activitiesDivElement.appendChild(breakLine2Element);

    }
}
function sendSurvey() {
    let data = {
        cargaMaxima: siCargaMaxima.value,
        materias: getSelectedMaterias(),
        actividades:  getSelectedActivities(),
        horas: getSelectedHours(),
        boleta: CacheManager.getData("boleta")
    }
    $.ajax({
        url:"PHP/SaveSurveyData.php",
        method:"POST",
        data: data,
        success: (response) => {
            console.log(response);
        },
        error: (error) => {
            console.log(error);
        }
    });
}

function getSelectedMaxiumLoad() {
    return siCargaMaxima.checked;
}

function getSelectedMaterias() {
    let materias = []
    for (let i = 0; i < materiasDivElement.childNodes.length; i++) {
        let element = materiasDivElement.childNodes[i];
        if (element.tagName === "INPUT" && element.type === "checkbox" && element.checked) {
            materias.push(element.id);
        }
    }
    return materias
}

function getSelectedActivities() {
    let actividades = []
    for (let i = 0; i < activitiesDivElement.childNodes.length; i++) {
        let element = activitiesDivElement.childNodes[i];
        if (element.tagName === "INPUT" && element.type === "checkbox" && element.checked) {
            actividades.push(element.id);
        }
    }
    return actividades
}

function getSelectedHours() {
    let horas = []
    for (let i = 0; i < activitiesDivElement.childNodes.length; i++) {
        let element = activitiesDivElement.childNodes[i];
        if (element.tagName === "INPUT" && element.type === "number" && element.value !== "") {
            horas.push(element.value);
        }
    }
    return horas
}

getSelectedMaxiumLoad()

function validateFields() {
    // Seleccionar al menos una materia
    console.log("SELECTED: ", getSelectedMaxiumLoad());
    console.log("NUMBER: ", getSelectedMaterias().length);
    if (getSelectedMaterias().length > 0) {
        if (getSelectedMaterias().length <= (getSelectedMaxiumLoad() ? 99999 : 4)) {
            if (getSelectedHours().length === getSelectedActivities().length) {
                sendSurvey()
            } else {
                showAlert(false, "Error", "Las horas no coinciden con las actividades seleccionadas");
            }
        } else {
            showAlert(false, "Error", "Sobrepaso la carga maxima de materias");
        }
    } else {
        showAlert(false, "Error", "Seleccione al menos una materia");
    }
}

function showAlert(success, title, message, routeSuccess, routeError) {
    Swal.fire({
        title:title,
        text:message,
        icon:success ? "success" : "error",
        didDestroy:()=>{
            console.log("Alerta mostrada correctamente");
        }
    }); // sweetAlert/
}

function sortMaterias() {
    var temporal = materiasData;
    if (academiaSwitch.checked) {
        console.log("ACADEMIA");
        temporal.sort((a, b) => {
            return a.academia > b.academia;
        });
    }
    if (planSwitch.checked) {
        console.log("PLAN");
        temporal.sort((a, b) => {
            return a.plan > b.plan;
        });
    }
    if (programaSwitch.checked) {
        console.log("PROGRAMA");
        temporal.sort((a, b) => {
            return a.programa > b.programa;
        });
    }
    if (semestreSwitch.checked) {
        console.log("SEMESTRE");
        temporal.sort((a, b) => {
            console.log(a.semestre < b.semestre)
            return a.semestre < b.semestre;
        });
    }
    console.log(temporal);
    removeAllMaterias()
    setMateriasData(temporal);
}

function removeAllMaterias() {
    while (materiasDivElement.firstChild) {
        materiasDivElement.removeChild(materiasDivElement.firstChild);
    }
}