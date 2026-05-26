<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'consulta.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
$(function() {
    // Evento de Gravação (Inserir)
    $("#gravar").on("click", function() {
        var nome = $('#name').val();
        var distrito = $('#district').val();
        var populacao = $('#population').val();
        
        $.ajax({
            url: "insere.php",
            type: "POST",
            // Utilizando formato de objeto para o data (mais limpo e seguro contra caracteres especiais)
            data: {
                nome: nome,
                distrito: distrito,
                populacao: populacao
            },
            dataType: "html"
        }).done(function(resposta) {
            $("div").html(resposta);
        }).fail(function(jqXHR, textStatus) {
            $("div").html("Request failed: " + textStatus);
        }).always(function() {
            console.log("completou gravação");
        });
    });

    // Evento de Exclusão usando Delegação de Eventos (.on)
    // Essencial para funcionar com elementos gerados dinamicamente via AJAX
// Evento de Exclusão Corrigido com Delegação de Eventos
$(document).on("click", ".excluir", function() {
    var id = $(this).attr("id");
    
    $.ajax({
        url: "apaga.php",
        type: "POST",
        data: { id: id },
        dataType: "html"
    }).done(function(resposta) {
        $("div").html(resposta);
    }).fail(function(jqXHR, textStatus) {
        $("div").html("Request failed: " + textStatus);
    }).always(function() {
        console.log("completou exclusão");
    });
});
});
</script>
    <title>Document</title>
</head>
<body>
    <input type="text" id="name">
    <input type="text" id="district">
    <input type="text" id="population">
    <button id="gravar"> Gravar</button>
    <div>

    <?php
        consultar();
    ?>

    </div>
</body>
</html>