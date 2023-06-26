let search = document.getElementById("searchup");
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