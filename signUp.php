<?php
require('config/conection.php');

// Verificar se a postagem existe de acordo com os campos
if(isset($_POST['fullName']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['rePassword'])) {
  // Verificar se todos os campos foram preenchidos
  if(empty($_POST['fullName']) or empty($_POST['email']) or empty($_POST['password']) or empty($_POST['rePassword']) or empty($_POST['terms'])) {
    $general_err = "Todos os campos são obrigatórios!";
  }else {
    // Receber valores vindos via post e limpar caracteres indesejados
    $name = checkInput($_POST['fullName']);
    $email = checkInput($_POST['email']);
    $password = checkInput($_POST['password']);
    $password_cript = sha1($password);
    $rePassword = checkInput($_POST['rePassword']);
    $checkbox = checkInput($_POST['terms']);
    // Verificar se nome tem apenas letras e espaços
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $err_name = "Only letters and white space allowed.";
    }
    // Verificar se email tem formato válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err_email = "Invalid email format.";
    }
    // Verificar se a senha tem 6 ou mais dígitos 
    if (strlen($password) < 6) {
        $err_password = "Your password must be at least 6 characters long.";
    }
    // Verificar se a senha repetida é igual a anterior
    if ($password !== $rePassword) {
        $err_rePassword = "Password do no match.";
    }
    // Verificar se checkbox foi marcado
    if($checkbox !== "ok") {
       $err_checkbox = "Disabled";
    }

    if(!isset($general_err) && !isset($err_name) && !isset($err_email) && !isset($err_password) && !isset($err_rePassword) && !isset($err_checkbox)) {
      // Verificar se o email já está cadastrado no banco
      $sql = $pdo->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
      $sql->execute(array($email));
      $user = $sql->fetch();
      // Se não existir o usuário, adicionar ao banco
      if(!$user) {
        $reset_password="";
        $token="";
        $confirmation_code = uniqid();
        $status = "new";
        $registration_date = date('d/m/Y');
        $sql = $pdo->prepare("INSERT INTO users VALUES (null,?,?,?,?,?,?,?,?)");
        if($sql->execute(array($name,$email,$password_cript,$reset_password,$token,$confirmation_code,$status,$registration_date))){
          // Se o modo de conexão for local
          if($modo == "local") {
            header('location: index.php?result=ok');
          }
          // Se o modo de conexão for produção
          if($modo == "producao") {
            // Enviar email para usuário
            $mail = new PHPMailer(true);

            try {
              //Recipients
              $mail->setFrom('sistema@emailsistema.com', 'Sistema de login'); // Who is sending the email
              $mail->addAddress($email, $name); // Add a recipient

              //Content
              $mail->isHTML(true); //Corpo do email como HTML
              $mail->Subject = 'Confirm your registration!'; // Título (assunto do email)
              $mail->Body    = '<b><h1>Welcome to Project Vault</h1></b><br><br><p>To start using the platform, please, confirm your email address by clicking the button below:</p><br><br><a style="background:green; color:white; text-decoration:none; padding:20px; border-radius:5px" href="https://seusistema.com.br/confirmacao.php?cod_confirm='.$confirmation_code.'">Confirmar Email</a>';
              $mail->send();
              header('location: thankyou.html');
            }catch (Exception $e) {
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            } 
          }
        }
      }else{
        // Erro de usuário já cadastrado
        $general_err = "Usuário já cadastrado";
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <title>Sign Up</title>
</head>
<body>
<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
  <style>      
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
        hsl(218, 41%, 35%) 15%,
        hsl(218, 41%, 30%) 35%,
        hsl(218, 41%, 20%) 75%,
        hsl(218, 41%, 19%) 80%,
        transparent 100%),
      radial-gradient(1250px circle at 100% 100%,
        hsl(218, 41%, 45%) 15%,
        hsl(218, 41%, 30%) 35%,
        hsl(218, 41%, 20%) 75%,
        hsl(218, 41%, 19%) 80%,
        transparent 100%); }
    
    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden; } 

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden; }   
    
    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px); }

    .general_err {
      color: red;
      text-align: center;
      margin-bottom: 20px;
      font-size: 14px;
      font-weight: 600; } 

    .form-control.err-input {
      border: 1px solid red; }

    .form-check-input.err-input {
      border: 1px solid red; }

    .err {
      color: red;
      margin: 4px 0px 10px 4px;
      font-size: 14px; }

    .account {
    text-decoration: none;
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
    color: black;
    font-weight: 600; }

    .account:hover {
    color: rgb(11, 153, 11); }

    /*solução para tornar altura do background responsiva para todos tamanhos*/
    @media screen and (min-width: 992px) {
      section {height: 100vh;} }
  </style>
  
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">      
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          Sign Up<br> <span style="color: hsl(218, 81%, 75%)">Project Vault</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
          This project was created by me with JavaScript, PHP, MySQL and Bootstrap.
        </p>
      </div>
      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5"> 
              
            <!--Formulário com validações-->              
            <form method="post">     
              <!--Campo de nome completo-->
              <div class="form-outline form-floating mb-3">
                <input <?php if(isset($general_err) or isset($err_name)){echo 'class="form-control err-input"';} ?> type="text" id="fullName" class="form-control" name="fullName" placeholder="Full Name" <?php if(isset($_POST['fullName'])){echo "value='".$_POST['fullName']."'";}?> required>
                <label for="fullName">Full Name</label>
                <?php if(isset($err_name)){ ?>
                  <div class="err"><?php echo $err_name; ?></div>
                <?php } ?>
              </div>

              <!--Campo de email-->
              <div class="form-outline form-floating mb-3">          
                <input <?php if(isset($general_err) or isset($err_email)){echo 'class="form-control err-input"';} ?> type="email" id="email" class="form-control" name="email" placeholder="Email" <?php if(isset($_POST['email'])){ echo "value='".$_POST['email']."'";}?> required> 
                <label for="email">Email</label>
                <?php if(isset($err_email)){ ?>
                  <div class="err"><?php echo $err_email; ?></div>
                <?php } ?>
              </div>
        
              <!--Linha que recebe campos de senha e repetição de senha-->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-outline form-floating mb-3">
                    <input <?php if(isset($general_err) or isset($err_password)){echo 'class="form-control err-input"';} ?> type="password" id="password" class="form-control" name="password" placeholder="Password" <?php if(isset($_POST['password'])){ echo "value='".$_POST['password']."'";}?> required>
                    <label for="password">Password</label>
                    <?php if(isset($err_password)){ ?>
                      <div class="err"><?php echo $err_password; ?></div>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-outline form-floating mb-3">
                    <input <?php if(isset($general_err) or isset($err_rePassword)){echo 'class="form-control err-input"';} ?> type="password" id="rePassword" class="form-control" name="rePassword" placeholder="Repeat Password" <?php if(isset($_POST['rePassword'])){ echo "value='".$_POST['rePassword']."'";}?> required>
                    <label for="rePassword">Repeat Password</label>
                    <?php if(isset($err_rePassword)){ ?>
                      <div class="err"><?php echo $err_rePassword; ?></div>
                    <?php } ?>
                  </div>
                </div>
              </div>              

              <!--Checkbox de termos-->
              <div class="form-check">
                <input <?php if(isset($general_err) or isset($err_checkbox)){echo 'class="form-check-input err-input"';} ?> class="form-check-input" type="checkbox" value="ok" name="terms" id="terms" required>
                <label class="form-check-label mb-4" for="terms">
                  <small>By continuing, you agree to our <a class="link-dark" href="#"><strong>Terms of Service</strong></a> and <a class="link-dark" href="#"><strong>Privacy Policy</strong>.</a></small>
                </label>                    
              </div>  

              <!--Erro para campos não preenchidos-->
              <?php if(isset($general_err)){ ?>
                <div class="general_err animate__animated animate__headShake">
                  <?php echo $general_err; ?>
                </div>  
              <?php } ?> 

              <div class="text-center">
                <button type="submit" class="btn btn-secondary btn-block">
                  Sign up
                </button>
              </div> 

              <div class="account">
                <a class="account" href="index.php">Already a member? Log in</a>       
              </div> 
            </form> 
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>