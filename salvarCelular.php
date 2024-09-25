<?php
session_start();
require_once "conDB.php";
header('Content-Type: application/json');

try {
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $preco = isset($_POST['preco']) ? $_POST['preco'] : '';

    if ($preco == '' || $nome == ''){
        echo json_encode("Nome ou preço não enviados");
        return;
    }

    $sql = "INSERT INTO celulares(nome, preco, id_usuario) VALUES (:nome, :preco, :id_usuario)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':preco', $preco);
    $idUsuario = $_SESSION['id'];
    $stmt->bindParam(':id_usuario', $idUsuario);
    $stmt->execute();

    echo json_encode("Celular cadastrado");
} catch (Exception $e) {
    echo json_encode("Celular não cadastrado" . $e->getMessage());
}
