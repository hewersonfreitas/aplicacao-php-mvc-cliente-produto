$(document).ready(function() {
    
    $("#data_nascimento").mask("99/99/9999");
    
    //Validando Form
    $("#form-cad-usuario").submit(function() {
        var nome = $("#nome").val();
        var email = $("#email").val();
        var senha = $("#senha").val();
        var data_nascimento = $("#data_nascimento").val();
        var flag = false;
        //Validação de campos
        if (nome != "")
        {
            $("#nome-msg").html(" Nome válido!").css("color", "green");
            flag = true;
        } else {
            $("#nome-msg").html(" Digite um nome!!");
            flag = false;
        }

        if (email != "")
        {
            var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            if (filtro.test(email))
            {
                $("#email-msg").html(" Este endereço de email é válido!").css("color", "green");
                flag = true;
            } else {
                $("#email-msg").html(" Este endereço de email não é válido!").css("color", "red");
                flag = false;
            }
        } else {
            $("#email-msg").html(" Digite um email!");
            flag = false;
        }

        if (senha != "")
        {
            $("#senha-msg").html(" Senha válida!").css("color", "green");
            flag = true;
        } else {
            $("#senha-msg").html(" Digite uma senha!!");
            flag = false;
        }

        if (data_nascimento != "")
        {
            $("#data-msg").html(" Data válida!").css("color", "green");
            console.log(data_nascimento);
            flag = true;
        } else {
            $("#data-msg").html(" Selecione uma data!!");
            console.log(data_nascimento);
            flag = false;
        }

        if (flag) {
            return flag;
        } else {
            return flag;
        }

    });
    
});