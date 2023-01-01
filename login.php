<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
    <!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
    <style>
       /*
       cinza #55595c
       claro #eceeef
       */ 
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
            transparent 100%);
      }
  
      #radius-shape-1 {
        height: 220px;
        width: 220px;
        top: -60px;
        left: -130px;
        background: radial-gradient(#44006b, #ad1fff);
        overflow: hidden;
      }
  
      #radius-shape-2 {
        border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
        bottom: -60px;
        right: -110px;
        width: 300px;
        height: 300px;
        background: radial-gradient(#44006b, #ad1fff);
        overflow: hidden;
      }
  
      .bg-glass {
        background-color: hsla(0, 0%, 100%, 0.9) !important;
        backdrop-filter: saturate(200%) blur(25px);
      }
      
      @media screen and (min-width: 992px) {
        section {
            height: 100vh;
        }
}
    </style>
  
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
          <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
            Login <br />
            <span style="color: hsl(218, 81%, 75%)"> Project Vault</span>
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
              <form class="needs-validation" novalidate>                    
                <div class="form-outline form-floating mb-4">
                  <input type="email" id="emailAdress" class="form-control" placeholder="Email" required>
                  <label for="emailAdress">Email</label>
                  <div class="invalid-feedback">
                    <small>Type your email address.</small> 
                  </div>                
                </div>
  
                <div class="form-outline form-floating mb-4">
                  <input type="password" id="passwordLogin" class="form-control" placeholder="Password" required>
                  <label for="passwordLogin">Password</label>
                  <div class="invalid-feedback">
                    <small>Type your password.</small> 
                  </div>      
                </div>    

                <button type="submit" class="btn btn-secondary btn-block mb-0">
                  Login
                </button>

                <a class="btn btn-secondary btn-block mb-0" href="signUp.php" role="button">Sign Up</a>               
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