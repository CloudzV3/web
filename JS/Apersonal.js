let search = document.getElementById("searchup");
let tableElement = document.getElementById("table_profesores");

function getInitialValues() {
    $.ajax({
        url:"PHP/GetProfessors.php",
        method:"GET",
        success: (response) => {
            response = JSON.parse(response);
            setTableData(response);
            console.log(response);
        },
        error: (error) => {
            console.log(error);
        }
    });
}

function setTableData(response) {
    /*
    <td>Boleta</td>
                                <td>Admin</td>
                                <td>Nombre</td>
                                <td>apPat</td>
                                <td>apMat</td>
                                <td>Correo</td>
     */
    for (let i = 0; i < response.length; i++) {
        console.log("RESPUESTA: ", response[i]);
        let tr = document.createElement("tr");
        let admin = document.createElement("td");
        admin.textContent = response[i].admin ?? "No encontrado";
        let boleta = document.createElement("td");
        boleta.textContent = response[i].boleta ?? "No encontrado";
        let nombre = document.createElement("td");
        nombre.textContent = response[i].nombre ?? "No encontrado";
        let apPat = document.createElement("td");
        apPat.textContent = response[i].apPat ?? "No encontrado";
        let apMat = document.createElement("td");
        apMat.textContent = response[i].apMat ?? "No encontrado";
        let correo = document.createElement("td");
        correo.textContent = response[i].correo ?? "No encontrado";
        let estadoE = document.createElement("td");
        estadoE.textContent = response[i].estadoE === "1" ? "Contestado" :  "No contestado";
        tr.appendChild(admin);
        tr.appendChild(boleta);
        tr.appendChild(nombre);
        tr.appendChild(apPat);
        tr.appendChild(apMat);
        tr.appendChild(correo);
        tr.appendChild(estadoE);
        tableElement.appendChild(tr)
    }
    tableElement.append()
}

/*
function searchdata() {
    console.log('JQuery is working');
    let value = search.value
    console.log(value);

    $.ajax({
        url: 'PHP/Apersonal.php', // Corregido el formato de la URL
        type: 'GET',
        data: { search: value }, // Corregido el formato de los datos
        success: function(response) {
            console.log("respuesta: " , response);
            let tasks = JSON.parse(response);
            let template = '';
            tasks.forEach(task => {
                template += `
                       <li><a href="#" class="task-item">${task.name}</a></li>
                     `
             });
              $('#task-result').show();
              $('#container').html(template);

        }
    });

}
 */