<?php
session_start();
error_reporting(E_ALL);
require_once "navbar.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Celular</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <div class="container ">
        <br><br>

        <?php
            if(!isset($_SESSION['id'])){
                echo "Você não está logado!";
                exit;
            }
        ?>
        
        <label for="nome">NOME DO CELULAR: </label>
        <input type="text" id="nome">

        <label for="preco">PREÇO: </label>
        <input type="number" id="preco">

        <button class="btn btn-primary" id="enviarBtn">Salvar</button>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/jquery/jquery@3.6.4/dist/jquery.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $('#enviarBtn').click(function() {
                var nome = $('#nome').val();
                var preco = $('#preco').val();
                console.log(nome + preco)

                $.ajax({
                    url: "/salvarCelular.php",
                    type: "POST",
                    datatype: "JSON",
                    data: {
                        nome: nome,
                        preco: preco
                    },
                    success: function(response) {
                        $('#nome').val('');
                        $('#preco').val('');
                        alert(response);
                    },
                    error: function(response) {
                        alert(response);
                    }
                })
            });

        });
    </script>
</body>

</html>