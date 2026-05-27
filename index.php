<html lang="en">
<head>
  <title>Cadastro de Cidade</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <?php
    include 'consulta.php';
    ?>
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
            $("#resultado").html(resposta);
        }).fail(function(jqXHR, textStatus) {
            $("#resultado").html("Request failed: " + textStatus);
        }).always(function() {
            console.log("completou gravação");
        });
    });

    // Evento de Exclusão usando Delegação de Eventos (.on)
    // Essencial para funcionar com elementos gerados dinamicamente via AJAX
// Evento de Exclusão Corrigido com Delegação de Eventos
$(document).on("click", ".excluir", function() {
    var id = $(this).attr("id");
   if(confirm("Deseja excluir essa cidade realmente")){
    $.ajax({
        url: "apaga.php",
        type: "POST",
        data: { id: id },
        dataType: "html"
    }).done(function(resposta) {
        $("#resultado").html(resposta);
    }).fail(function(jqXHR, textStatus) {
        $("#resultado").html("Request failed: " + textStatus);
    }).always(function() {
        console.log("completou exclusão");
    });

   }

});
});
</script>
</head>
 <body>
    <div class="container">
         <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="margin:10px;">Cadastrar Cidade</button>
         <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">   
      <label for="usr">Nome:</label>
      <input type="text" class="form-control" id="name">
    </div>
    <div class="form-group">
      <label for="usr">Distrito:</label>
      <input type="text" class="form-control" id="district">
    </div>
    <div class="form-group">
      <label for="usr">População:</label>
      <input type="text" class="form-control" id="population">
    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="gravar">Gravar</button>
        </div>
      </div>
      
    </div>
</div>



    <div id="resultado" class="p-5">

    <?php
        consultar();
    ?>

    </div>
</div>

</body>
</html>