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
                                    <form class="user" action="index.php?control=client&add" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="nome"
                                                placeholder="Nome">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="cpf"
                                                    placeholder="CPF">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user" id="telefone"
                                                    placeholder="Telefone">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="endereco"
                                                placeholder="Endereço">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user"
                                                    id="senha" placeholder="Senha">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user"
                                                    id="confirmaSenha" placeholder="Confirmar Senha">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email"
                                                placeholder="Email">
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
                                                <button type="submit" class="btn btn-primary btn-user" id="submit">Salvar</button>
                                                <!-- <a href="#" class="btn btn-primary btn-user">
                                                    Salvar
                                                </a> -->
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
        include("view/imports/importAddClient.html");
    ?>

<?php
  include("view/imports/importSidebar.html");
?>