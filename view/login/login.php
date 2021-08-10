<?php
    include('view/head/headLogin.html');
?>

    <main class="form-signin">
      <form action="" name="f1" method="POST">
        <img class="mb-4" src="../image/ring.png" alt="" width="100" height="121">
        <h1 class="h3 mb-3 fw-normal">Entre, por favor</h1>
        <div class="form-floating">
          <input type="text" class="form-control" id="username" placeholder="Login">
          <label>Login</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control input-border-radius" id="password" placeholder="Senha">
          <label>Senha</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="button" id="login">Acessar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
      </form>
      <div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 11">
        <div id="message" class="toast text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
              <div class="toast-body"></div>
              <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
      </div>
    </main>

    <?php
      include("view/imports/importLogin.html");
    ?>