<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Project Vault</title>
</head>
<body>
    <style>
/* Código adquirido via Bootstrap, necessário analisar o que pode ser alterado no <style>.*/
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }
  
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
/* Única adicionada manualmente no <style>.*/
        a {
          font-size: 14px; 
          text-decoration:none;
          color: #55595c;
          border: solid 1px;
          border-radius: 4px; 
          padding: 6px 9px;
        }
      </style>
   
    </head>
    <body>
      <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
          <li class="nav-item"><a href="#" class="nav-link active" style="background-color: #55595c;color:#eceeef;" aria-current="page">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link" style="color:#55595c;">Add New Projects</a></li>
          <li class="nav-item"><a href="#" class="nav-link" style="color:#55595c;">About me</a></li>
        </ul>
      </header>
  
      <main>
        <section class="py-4 text-center container">
          <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
              <h1 class="fw-light">Projects</h1>
              <p class="lead text-muted">This project was created by me with JavaScript, PHP, MySQL and Bootstrap.</p>
            </div>
          </div>
        </section>
  
        <div class="album py-4 bg-light">
          <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">  
<!--
  * criado foreach que insere a <div> do grid que buscará no banco de dados os peojetos a serem mostrados, de acordo com a quantidade de elementos da array.
  * Próxima etapa será tornar array responsiva com banco de dados disposto no MySQL. 
-->
              <?php $quantidadeDiv = ["calculator", "calendar", "clock", "raffle", "converter"]; ?>
              <?php foreach ($quantidadeDiv as $key => $value):?>
                <div class="col">
                  <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder:   Thumbnail"    preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text   x="50%" y="50%"   fill="#eceeef" dy=".3em"><?php echo $value ?></text></svg>
                    <div class="card-body">
                      <p class="card-text">'Here will be text describing the project.'</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-outline-secondary">View</button>                    
                        </div>
                        <small class="text-muted">added on 'day'</small>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            
            </div>
          </div>
        </div>  
      </main>
  
      <footer class="text-muted py-4">
        <div class="container">
          <p class="float-end mb-1">
            <a href="#">Back to top</a>
          </p>
        </div>
      </footer>

      <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
