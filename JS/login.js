$(document).on('submit','#login', function(event){
    event.preventDefault();

    var boleta = this.login.boleta;

    $.ajax({
        url: "PHP/loginAjax.php",
        type: "POST",
        dataType: "json",
        data: {
            boleta: boleta
        },
        beforeSend: function(){
            
        }
    })
    .done(function(respuesta){
        console.log(respuesta);
        if(!respuesta.error){
            if(respuesta.nomdepto == 'ADM'){
                location.href = 'home.php';
            } else {//if (respuesta.nomdepto == 'IA'){
                location.href = 'encuestas.php';
            }
        } else {
            $('.error').slideDown('slow');
            setTimeout(function(){
                $('.error').slideUp('slow');
            },3000);
            $('login-btn').val('INGRESAR');   
        }
    })
    .fail(function(respuesta){
        console.log(respuesta);
    })
    .always(function(respuesta){
        console.log("complete"); 
    })
});