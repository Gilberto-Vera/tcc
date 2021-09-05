<?php 
  include("view/head/headSidebar.html");
?>
<?php
    include("view/sidebar/sidebar.php");
?>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid">
                <div class="card shadow mt-4 mb-4">
                    <div class="card-header">
                        <h4 class="m-0 font-weight-bold text-primary">Cliente</h4>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="p-5">
                                    <div class="card-title text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Cadastro de cliente</h1>
                                    </div>
                                    <form class="user needs-validation" id="form" action="index.php?control=addClient&add" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="nome" id="name"
                                                placeholder="Nome">
                                                <div class="invalid-feedback" id="feedback"></div>
                                                <div class="valid-feedback"></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" name="cpf"
                                                    placeholder="CPF">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user" name="telefone"
                                                    placeholder="Telefone">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="endereco"
                                                placeholder="Endereço">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email"
                                                placeholder="Email">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user"
                                                    name="senha" placeholder="Senha">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user"
                                                    name="confirmaSenha" placeholder="Confirmar Senha">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <a href="#" class="btn btn-primary btn-user">
                                                    Voltar
                                                </a>
                                            </div>
                                            <div class="col text-center">
                                                <a href="#" class="btn btn-primary btn-user">
                                                    Cancelar
                                                </a>
                                            </div>
                                            <div class="col text-right">
                                                <button type="submit" class="btn btn-primary btn-user" id="save">Salvar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>

            <!-- <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
                })();
            </script> -->

        <?php
            include("view/footer/footer.html");
        ?>

    <?php
        // include("view/imports/importAddClient.html");
    ?>

<?php
  include("view/imports/importSidebar.html");
?>