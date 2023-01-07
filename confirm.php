<?php
require('config/conection.php');

if(isset($_GET['cod_confirm']) && !empty($_GET['cod_confirm'])){
    
    // Limpar o GET
    $cod = checkInput($_GET['cod_confirm']);

    // Consultar se usuário tem esse código de confirmação
    // Verificar se usuário existe
    $sql = $pdo->prepare("SELECT * FROM users WHERE confirmation_code=? LIMIT 1");
    $sql->execute(array($cod));
    $user = $sql->fetch(PDO::FETCH_ASSOC);
    if($user){
        // Atualizar o status para CONFIRMED
        $status = "confirmed";
        $sql = $pdo->prepare("UPDATE users SET status=? WHERE confirmation_code=?");
        if($sql->execute(array($status,$cod))){            
            header('location: index.php?result=ok');
        }
    }else{
       echo "<h1>Código de confirmação inválido!</h1>";
    }
}
?>