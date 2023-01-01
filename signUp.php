<?php
require('config/conection.php');

//verificar se a postagem existe de acordo com os campos.
if(isset($_POST['full_name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re_password'])){
  //verificar se todos os campos foram preenchidos
  if(empty($_POST['full_name']) or empty($_POST['email']) or empty($_POST['password']) or empty($_POST['re_password']) or empty($_POST['termos'])){
    $erro_geral = "Todos os campos são obrigatórios!";
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

    label {
      color: #6c757d; /*HEX da cor secondary Bootstrap*/
    }

/*solução para tornar altura da media de background responsiva para todos tamanhos*/
    @media screen and (min-width: 992px) {
      section {
          height: 100vh; }}
  </style>
  
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">      
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          Sign Up<br />
          <span style="color: hsl(218, 81%, 75%)">Project Vault</span>
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
            <form method="post" class="needs-validation" novalidate>                        
              <div class="form-outline form-floating mb-4">
                <input type="text" id="fullName" class="form-control" name="full_name" placeholder="Full Name" required>
                <label for="fullName">Full Name</label>
                <div class="invalid-feedback">
                  <small>What's your name?</small> 
                </div>
              </div>

              <div class="form-outline form-floating mb-4">
                <input type="email" id="emailAdress" class="form-control" name="email" placeholder="Email" required>
                <label for="emailAdress">Email</label>
                <div class="invalid-feedback">
                  <small>Type your email address.</small> 
                </div>
              </div>
        
              <div class="row">
                <div class="col-md-6">
                  <div class="form-outline form-floating mb-4">
                    <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    <div class="invalid-feedback">
                      <small>Your password must be at least 6 characters long.</small> 
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-outline form-floating mb-4">
                    <input type="password" id="rePassword" class="form-control" name="re_password" placeholder="Repeat Password"    required>
                    <label for="rePassword">Repeat Password</label>
                    <div class="invalid-feedback">
                      <small>Enter a match Password.</small>
                    </div>
                  </div>
                </div>
              </div>              

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="ok" name="terms" id="invalidCheck" required>
                <label class="form-check-label mb-4" for="invalidCheck">
                  <small>By continuing, you agree to our <a class="link-dark" href="#"><strong>Terms of Service</strong></a> and <a class="link-dark" href="#"><strong>Privacy Policy</strong>.</a></small>
                </label>                    
              </div>  

              <button type="submit" class="btn btn-secondary btn-block mb-0">
                Sign up
              </button>
            </form> 

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <!-- Section: Design Block -->

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/formValidator.js"></script>

</body>
</html>