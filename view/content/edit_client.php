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
                                    <h1 class="h4 text-gray-900 p-1">Editar cliente</h1>
                                </div>
                                <form class="user needs-validation" action="" method="POST">
                                    <input type="hidden" value="<?php echo $client[0]?>" id="id_client">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="name"
                                            name="nome" placeholder="Nome" value="<?php echo $client[1] ?>">
                                            <div class="invalid-feedback" id="feedback_name"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="cpf"
                                                name="cpf" placeholder="CPF" value="<?php echo $client[2] ?>">
                                                <div class="invalid-feedback" id="feedback_cpf"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" id="phone"
                                                name="telefone" placeholder="Telefone" value="<?php echo $client[3] ?>">
                                                <div class="invalid-feedback" id="feedback_phone"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="address"
                                            name="endereco" placeholder="Endereço" value="<?php echo $client[4] ?>">
                                                <div class="invalid-feedback" id="feedback_address"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="email"
                                            name="email" placeholder="Email" value="<?php echo $client[5] ?>">
                                                <div class="invalid-feedback" id="feedback_email"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn btn-primary btn-user" type="submit" formaction="index.php?control=client&list">Voltar</button>
                                        </div>
                                        <div class="col text-center">
                                            <button class="btn btn-primary btn-user" type="submit" formaction="#">Alterar senha</button>
                                        </div>
                                        <div class="col text-right">
                                            <button class="btn btn-primary btn-user" type="submit" id="save_client">Salvar</button>
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

<script type="text/javascript" src="js/validate_edit_client.js"></script>