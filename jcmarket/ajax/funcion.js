//GUARDAMOS LA INSCRIPCION
$("#enviar").off("click");
$("#enviar").on("click", function(e) {
    $('enviar').attr("disabled", true);
    var codigo = $("#codigo").val();
    var nombres = $("#nombres").val();
    var apellidos = $("#apellidos").val();
    var dui = $("#dui").val();
    var direccion = $("#direccion").val();
    var telefono = $("#telefono").val();
    var email = $("#email").val();
   
    parametros = {
        'codigo': codigo,
        'nombres': nombres,
        'apellidos': apellidos,
        'dui': dui,
        'direccion': direccion,
        'telefono': telefono,
        'email': email
    };
    $.ajax({
        type: "POST",
        url: "recibe_clientes2.php",
        data: parametros,
        beforeSend: function(objeto) {
            $("#Msg").html('Cargando...');
        },
        success: function(datos) {
            $("#Msg").html(datos);
            $('#enviar').attr("disabled", false);
            $('#codigo').val(''),
            $('#nombres').val(''),
            $('#apellidos').val(''),
            $('#dui').val(''),
            $('#direccion').val(''),
            $('#telefono').val(''),
            $('#email').val('')
        }
    });
    event.preventDefault();
});
