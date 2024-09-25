<?php
session_start();
require_once "navbar.php";
if (!isset($_SESSION['id'])) {
    echo "Você não está logado!";
    exit;
}
require_once "conDB.php";

$sql = "SELECT * FROM celulares WHERE id_usuario = :id_usuario";
$stmt = $pdo->prepare($sql);
$idUsuario = $_SESSION['id'];
$stmt->bindParam(':id_usuario', $idUsuario);
$stmt->execute();

$results = $stmt->fetchAll();

if (empty($results)) {
    echo "Nenhum celular cadastrado por esse usuário";
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celulares</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <br><br>
        <div class="table-responsive">
            <table class="table table-striped table-bordered border-primary">
                <thead>
                    <tr>
                        <th>NOME CELULAR</th>
                        <th>PREÇO</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <?php
                            foreach($results as $result){
                                echo "<tr><td> " . $result['nome'] .  "</td><td>" . $result['preco'] . "</td></tr>";
                            }
                        ?>

                </tbody>
            </table>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/gh/jquery/jquery@3.6.4/dist/jquery.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {


        });
    </script>
</body>

</html>