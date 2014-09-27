$(document).ready(function() {

    /*
     * Mascara para formatação de data usando plugin
     */
    $("#data_nascimento").mask("99/99/9999");


    //Validação de campos, para envio de formulario
    $("#form-cad-usuario").submit(function() {
        /*
         * Atribuindo valores dos campos a variaveis
         */
        var nome = $("#nome").val();
        var email = $("#email").val();
        var senha = $("#senha").val();
        var data_nascimento = $("#data_nascimento").val();

        //Validação de campos
        
        /*
         * Validação de campos, varificando se estão vazios
         * , bloco if interno com suas validações particulares
         * no email e data nascimento através regex
         */
        if (nome != "")
        {
            $("#nome-msg").html(" Nome válido!").css("color", "green");

        } else {
            $("#nome-msg").html(" Digite um nome!!");

        }

        if (email != "")
        {
            /*
             * Filtro de email em regex para validação de email
             */
            var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            if (filtro.test(email))
            {
                $("#email-msg").html(" Este endereço de email é válido!").css("color", "green");

            } else {
                $("#email-msg").html(" Este endereço de email não é válido!").css("color", "red");
            }
        } else {
            $("#email-msg").html(" Digite um email!");

        }

        if (senha != "")
        {
            $("#senha-msg").html(" Senha válida!").css("color", "green");

        } else {
            $("#senha-msg").html(" Digite uma senha!!");

        }
        
        if (data_nascimento != "")
        {
            /*
             * Filtro de data em regex para validação de email
             */
            var patternData = new RegExp(/((0[1-9]|[12][0-9]|3[01])\/(0[13578]|1[02])\/[12][0-9]{3})|((0[1-9]|[12][0-9]|30)\/(0[469]|11)\/[12][0-9]{3})|((0[1-9]|1[0-9]|2[0-8])\/02\/[12][0-9]([02468][1235679]|[13579][01345789]))|((0[1-9]|[12][0-9])\/02\/[12][0-9]([02468][048]|[13579][26]))/gi);;
            if (patternData.test(data_nascimento)) {
                $("#data-msg").html(" Data válida!").css("color", "green");
            } else {
                $("#data-msg").html(" Está data invalida!").css("color", "red");
            }
        } else {
            $("#data-msg").html(" Digite uma data!!");
        }
         
        /*
         * Se todos campos estiverem inseridos corretamente
         * é efetuado o submit do form
         */
        if ((nome != "") && (email != "") && (senha != "") && (data_nascimento != "")) {
            return true;
        } else {
            return false;
        }

    });

});