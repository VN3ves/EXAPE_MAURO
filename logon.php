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

    $sql = "SELECT id, nome, senha FROM usuarios WHERE nome = :nome ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->execute();

    $result = $stmt->fetch();

    if(empty($result)){
        echo json_encode("usuario não encontrado");
        return;
    }

    if(password_verify($senha, $result['senha'])){
        $_SESSION['id'] = $result['id'];
        $_SESSION['nome'] = $result['nome']; 
        echo json_encode("Login Executado com sucesso!");
    }
    else {
        echo json_encode("Senha não bate");
    }

} catch (Exception $e) {
    echo json_encode("Erro: " . $e->getMessage());
}
