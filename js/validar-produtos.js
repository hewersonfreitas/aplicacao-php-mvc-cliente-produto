$(document).ready(function() {

    /*
     * Mascara para formatação de moeda Brasil
     */
    $("#valor").maskMoney({showSymbol: true, symbol: "R$", decimal: ",", thousands: "."});



    $("#quantidade").bind("keyup blur focus", function(e) {
        e.preventDefault();
        var expre = /[^0-9]/g;
        // REMOVE OS CARACTERES DA EXPRESSAO ACIMA
        if ($(this).val().match(expre)) {
            $(this).val($(this).val().replace(expre, ''));
            $("#qtd-msg").html(" Somente números").css("color", "red");
        } else {
            $("#qtd-msg").html("");
        }
    });



//Validação de campos, para envio de formulario
    $("#form-cad-produto").submit(function() {
        /*
         * Atribuindo valores dos campos a variaveis
         */
        var produto = $("#produto").val();
        var qtd = $("#quantidade").val();
        var val = $("#valor").val();
        var data_nascimento = $("#data_nascimento").val();

        //Validação de campos

        /*
         * Validação de campos, varificando se estão vazios
         */
        if (produto != "")
        {
            $("#prod-msg").html(" Produto válido!").css("color", "green");

        } else {
            $("#prod-msg").html(" Digite um produto!!");

        }
        if (qtd != "" && qtd > 0)
        {

            $("#qtd-msg").html(" Quatidade válido!").css("color", "green");

        } else {
            $("#qtd-msg").html(" Digite um email!");

        }

        if (val != "")
        {
            $("#val-msg").html(" Valor válido!").css("color", "green");

        } else {
            $("#val-msg").html(" Digite um valor!!");

        }

        /*
         * Se todos campos estiverem inseridos corretamente
         * é efetuado o submit do form
         */
        if ((produto != "") && (qtd != "") && (val != "")) {
            return true;
        } else {
            return false;
        }

    });
});