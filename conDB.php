<?php
error_reporting(E_ALL);

$dsn = 'mysql:dbname=aula_mauro;host=127.0.0.1';
$user = 'root';
$password = '';

$pdo = new PDO($dsn, $user, $password);
