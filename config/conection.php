<?php
session_start();
// Requerimento do PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/src/Exception.php';
require 'phpMailer/src/PHPMailer.php';
require 'phpMailer/src/SMTP.php';

/* Dois modos de conexão possíveis-> local e produção */
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

// Conexão com banco de dados
try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Banco conectado com sucesso";
} catch (PDOException $erro) {
    echo "Falha ao se conectar com o banco!";
}

function checkInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

// Função para autenticação
function auth($tokenSession) {
    global $pdo;
    // Verificação de autorização
    $sql = $pdo->prepare("SELECT * FROM users WHERE token=? LIMIT 1");
    $sql->execute(array($tokenSession));
    $user = $sql->fetch(PDO::FETCH_ASSOC);
    // Se não existir o usuário
    if(!$user){
        return false;
    }else {
        return $user;
    }
}
?>