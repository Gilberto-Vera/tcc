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
                                    <h1 class="h4 text-gray-900 p-1">Cadastrar cliente</h1>
                                </div>
                                <form class="user needs-validation" action="" id="f1" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="name"
                                            name="nome" placeholder="Nome">
                                            <div class="invalid-feedback" id="feedback_name"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="cpf"
                                                name="cpf" placeholder="CPF">
                                                <div class="invalid-feedback" id="feedback_cpf"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" id="phone"
                                                name="telefone" placeholder="Telefone">
                                                <div class="invalid-feedback" id="feedback_phone"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="address"
                                            name="endereco" placeholder="Endereço">
                                                <div class="invalid-feedback" id="feedback_address"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email"
                                            name="email" placeholder="Email">
                                                <div class="invalid-feedback" id="feedback_email"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" id="password"
                                             placeholder="Senha" autocomplete="on">
                                             <div class="invalid-feedback" id="feedback_password"></div>
                                        </div>
                                        <input type="hidden" id="hash_password" name="senha">
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" id="confirmPassword"
                                             placeholder="Confirmar Senha" autocomplete="on">
                                                <div class="invalid-feedback" id="feedback_confirmPassword"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn btn-secondary btn-user" type="button" id="clear_client">Limpar</button>
                                        </div>
                                        <div class="col text-right">
                                            <button class="btn btn-primary btn-user" type="submit" id="save_add_client">Salvar</button>
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

<script type="text/javascript" src="js/validate_add_client.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#clear_client").click(function(){
            const fields = ['name', 'cpf', 'phone', 'address', 'email', 'password', 'confirmPassword'];
            fields.forEach(function(element){
                    $("#" + element).removeClass('is-invalid');
                    $("#" + element).removeClass('is-valid');
                    $("#" + element).val('');
                    $("#feedback_" + element).html('');
            });
        });
    });
</script>