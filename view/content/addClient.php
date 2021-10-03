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
                                    <h1 class="h4 text-gray-900 p-1">Cadastro de cliente</h1>
                                </div>
                                <form class="user needs-validation" action="" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="name"
                                            placeholder="Nome">
                                            <div class="invalid-feedback" id="feedbackName"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="cpf"
                                                placeholder="CPF">
                                                <div class="invalid-feedback" id="feedbackCPF"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" id="phone"
                                                placeholder="Telefone">
                                                <div class="invalid-feedback" id="feedbackPhone"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="address"
                                            placeholder="Endereço">
                                                <div class="invalid-feedback" id="feedbackAddress"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="email"
                                            placeholder="Email">
                                                <div class="invalid-feedback" id="feedbackEmail"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" id="password"
                                             placeholder="Senha">
                                                <div class="invalid-feedback" id="feedbackPassword"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" id="confirmPassword"
                                             placeholder="Confirmar Senha">
                                                <div class="invalid-feedback" id="feedbackConfirmPassword"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn btn-primary btn-user" type="reset">Limpar</button>
                                        </div>
                                        <div class="col text-right">
                                            <button class="btn btn-primary btn-user" type="button" id="saveClient">Salvar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>

    <?php
        include("view/footer/footer.html");
    ?>

<?php
  include("view/imports/importSidebar.html");
?>