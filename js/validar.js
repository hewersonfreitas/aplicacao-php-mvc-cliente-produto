$(document).ready(function() {
    $("#form-cad-usuario").submit(function() {
        var email = $("#email").val();
        if (email != "")
        {
            var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            if (filtro.test(email))
            {
                $("#email-msg").html(" Este endereço de email é válido!").css("color","green");
                return true;
            } else {
                $("#email-msg").html(" Este endereço de email não é válido!").css("color","red");
                return false;
            }
        } else {
            $("#email-msg").html(" Digite um email!");
            return false;
        }
    });
});