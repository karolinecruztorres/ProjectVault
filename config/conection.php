<?php
/* DOIS MODOS POSSÍVEIS -> local e produção */

$modo = 'local';

if ($modo == 'local') {
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "projects_database";
}

if ($modo =='producao') {
    $servidor = "";
    $usuario = "";
    $senha = "";
    $banco = ""; 
}

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Banco conectado com sucesso";
} catch (PDOException $erro) {
    echo "Falha ao se conectar com o banco!";
}
?>