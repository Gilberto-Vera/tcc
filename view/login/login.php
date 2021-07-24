<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="../css/signin.css" rel="stylesheet">
        <link href="../image/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        
        <script src="../js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/jquery.3.6.0.js"></script>
        <script type="text/javascript" src="js/login.js"></script>

        <title>SGCC</title>
    </head>
    <body class="text-center">

    <main class="form-signin">
      <form action="" name="f1" method="POST">
        <img class="mb-4" src="../image/ring.png" alt="" width="100" height="121">
        <h1 class="h3 mb-3 fw-normal">Entre, por favor</h1>
        <div class="form-floating">
          <input type="text" class="form-control" id="username" placeholder="Login">
          <label>Login</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="password" placeholder="Senha">
          <label>Senha</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="button" id="login">Acessar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
      </form>
      <div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 11">
        <div id="message" class="toast" role="alert" aria-live="assertive" aria-atomic="true">  
          <div class="toast-header">
            <strong class="me-auto" id="cabecalho"></strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>  
          <div class="toast-body"></div>
        </div>
      </div>
    </main>
  </body>
</html>