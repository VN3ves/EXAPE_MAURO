<?php
session_start();
require_once "conDB.php";
header('Content-Type: application/json');

try {
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

    if ($senha == '' || $nome == ''){
        echo json_encode("Nome ou Senha não enviados");
        return;
    }

    $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios(nome, senha) VALUES (:nome, :senha)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':senha', $senhaHash);
    $stmt->execute();

    echo json_encode("Usuario cadastrado");
} catch (Exception $e) {
    echo json_encode("Usuario não cadastrado" . $e->getMessage());
}
