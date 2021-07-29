<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <link href="css/sidebars.css" rel="stylesheet">
  </head>
  <body>

  <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
    <a href="#" class="d-flex align-items-center justify-content-md-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
      <img class="mb-4" src="image/ring.png" width="50" height="72"><br>
      <!-- <span class="fs-5 fw-semibold">SGCC</span> -->
    </a>
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
          Cliente
        </button>
        <div class="collapse" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">Cadastro</a></li>
            <li><a href="#" class="link-dark rounded">Lista</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
          Evento
        </button>
        <div class="collapse" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">Cadastro</a></li>
            <li><a href="#" class="link-dark rounded">Lista</a></li>
            <li><a href="#" class="link-dark rounded">Convidados</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
          Fornecedor
        </button>
        <div class="collapse" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">Cadastro</a></li>
            <li><a href="#" class="link-dark rounded">Lista</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
          Conta
        </button>
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">Cadastro</a></li>
            <li><a href="#" class="link-dark rounded">Perfil</a></li>
            <li><a href="#" class="link-dark rounded">Configurações</a></li>
            <li><a href="index.php?control=logout" class="link-dark rounded">Sair</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/sidebars.js"></script>
</body>
</html>