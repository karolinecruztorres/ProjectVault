<?php 
require('config/conection.php');

if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){
  
  // Receber os dados vindos do post e limpar
  $email = checkInput($_POST['email']);
  $password = checkInput($_POST['password']);
  $password_cript = sha1($password);

  // Verificar se usuário existe
  $sql = $pdo->prepare("SELECT * FROM users WHERE email=? AND _password=? LIMIT 1");
  $sql->execute(array($email,$password_cript));
  $user = $sql->fetch(PDO::FETCH_ASSOC);
  if($user){
    // Se existe o usuário, verificar se o cadastro foi confirmado
    // Criar um token
    $token = sha1(uniqid().date('d-m-Y-H-i-s'));
    // Atualizar o token deste usuário no banco
    $sql = $pdo->prepare("UPDATE users SET token=? WHERE email=? AND _password=?");
    if($sql->execute(array($token,$email,$password_cript))){
        // Armazenar este token na sessão (SESSION)
        $_SESSION['TOKEN'] = $token;
        header('location: home.php');
    }
  }else{
    $err_login = "The email or password is incorrect!";
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
    <title>Login</title>
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

    .sucess {
    color: rgb(11, 153, 11);
    text-align: center;
    margin-bottom: 25px;
    font-size: 14px; }

    .err_login {
      color: red;
      text-align: center;
      margin-bottom: 20px;
      font-size: 14px;
      font-weight: 600; } 
    
    .account {
    text-decoration: none;
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
    color: black;
    font-weight: 600; }

    .account:hover {
    color: rgb(11, 153, 11); }

    /*solução para tornar altura do background responsiva para todostamanhos*/
    @media screen and (min-width: 271px) {
      section {height: 100vh;} }
  </style>
  
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          Login<br> <span style="color: hsl(218, 81%, 75%)"> Project Vault</span>
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
              <!--Mensagem de cadastro realizado-->
              <?php if (isset($_GET['result']) && ($_GET['result']=="ok")){ ?>
                <div class="sucess animate__animated animate__rubberBand">
                  Registered successfully!
                </div>               
              <?php } ?>

              <!--Campo de email-->
              <div class="form-outline form-floating mb-4">
                <input type="email" id="email" class="form-control" name="email" placeholder="Email" required>
                <label for="email">Email</label>
              </div>

              <!--Campo de senha-->
              <div class="form-outline form-floating mb-4">
                <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                <label for="password">Password</label>
              </div>    

              <?php if(isset($err_login)){ ?>
                <div class="err_login animate__animated animate__headShake">
                  <?php echo $err_login; ?>
                </div>  
              <?php } ?> 

              <div class="text-center">
                <button type="submit" class="btn btn-secondary btn-block mt-1">
                  Login
                </button>               
              </div> 
              
              <div class="account">
                <a class="account" href="signUp.php">Create new account</a>       
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
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

<!--função utilizando jQuery para esconder mensagem de cadastro realizado-->
<?php if (isset($_GET['result']) && ($_GET['result']=="ok")){ ?>
  <script>
  setTimeout(() => {
    $('.sucess').hide();            
  }, 3000); 
  </script>
<?php }?>
</body>
</html>