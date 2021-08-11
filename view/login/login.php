<?php
    include('view/head/headLogin.html');
?>
<body class="bg-gradient-primary">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-5">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="p-5">
            <img class="mb-4" src="../image/ring.png" alt="" width="100" height="121">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Entre, por favor!</h1>
            </div>
            <form class="user" action="" name="f1" method="POST">
              <div class="form-group">
                  <input type="text" class="form-control form-control-user"
                      id="username" placeholder="Usuário">
              </div>
              <div class="form-group">
                  <input type="password" class="form-control form-control-user"
                      id="password" placeholder="Senha">
              </div>
              <div class="form-group">
              </div>
              <button class="btn btn-primary btn-user btn-block" type="button" id="login">Acessar</button>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="#">Esqueceu a senha?</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 11">
      <div id="message" class="toast text-white" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="d-flex">
            <div class="toast-body"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    </div>

</div>

<?php
  include("view/imports/importLogin.html");
?>