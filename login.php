<?php
session_start();
error_reporting(E_ALL);
require_once "navbar.php";

if(isset($_SESSION['id'])){
    //location('');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <div class="container ">
        <br><br>

        <!-- <div>
            <label for="">Dados Sessão: </label>
            <?php
                //var_dump($_SESSION);
            ?>
        </div> -->

        <?php
            if(isset($_SESSION['id'])){
                echo "Você já está logado, saia primeiro para logar com outro usuário!";
                exit;
            }
        ?>
        
        <br><br>

        <label for="nome">NOME: </label>
        <input type="text" id="nome">

        <label for="senha">SENHA: </label>
        <input type="text" id="senha">

        <button  class="btn btn-primary" id="enviarBtn">Salvar</button>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/jquery/jquery@3.6.4/dist/jquery.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $('#enviarBtn').click(function() {
                var nome = $('#nome').val();
                var senha = $('#senha').val();
                console.log(nome + senha)

                $.ajax({
                    url: "/logon.php",
                    type: "POST",
                    datatype: "JSON",
                    data: {
                        nome: nome,
                        senha: senha
                    },
                    success: function(response) {
                        $('#nome').val('');
                        $('#senha').val('');
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