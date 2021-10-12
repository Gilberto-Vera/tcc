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
            <form class="user  needs-validation" action="index.php?control=dashboard" method="POST">
              <div class="form-group">
                  <input type="text" class="form-control form-control-user"
                      id="username" placeholder="Usuário">
                    <div class="text-left invalid-feedback" id="feedback_username"></div>
              </div>
              <div class="form-group">
                  <input type="password" class="form-control form-control-user"
                      id="password" placeholder="Senha">
                  <div class="text-left invalid-feedback" id="feedback_password"></div>
              </div>
              <div class="form-group">
              </div>
              <button class="btn btn-success btn-user btn-block" type="submit" id="login">Acessar</button>
            </form>
            <hr>
            <!-- <div class="text-center">
              <a class="small" href="#">Esqueceu a senha?</a>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  include("view/imports/importLogin.html");
?>