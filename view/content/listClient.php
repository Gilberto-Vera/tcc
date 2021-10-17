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
                                <div class="card-title text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Listar cliente</h1>
                                </div>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                   <thead>
                                        <tr class="text-center">
                                            <th>Nome</th>
                                            <th>Telefone</th>
                                            <th>Email</th>
                                            <th>Editar</th>
                                            <th>Apagar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($clients as $client) { ?>
                                            <tr>
                                                <td><?php echo $client['nome']; ?></td>
                                                <td><?php echo $client['telefone']; ?></td>
                                                <td><?php echo $client['email']; ?></td>
                                                <td class="text-center">
                                                    <a href="index.php?control=client&edit=<?php echo $client['id']; ?>">
                                                    <i class="fas fa-fw fa-edit"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <a data-toggle="modal" href="index.php?control=edit&<?php echo $client['id']; ?>" data-target="#modal_del">
                                                    <i class="fas fa-fw fa-eraser"></i></a>
                                                    <input type="hidden" value="<?php echo $client['id']; ?>" id="id"></input>
                                                </td>
                                            </tr>						
                                            <?php }; ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                            <div class="modal fade" id="modal_del" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Remover cliente</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                            Tem certeza de deseja excluir esse cliente? <?php echo $client['id']; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" autofocus>Voltar</button>
                                            <button type="button" class="btn btn-primary" id="excluir">Excluir</button>
                                        </div>
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

<?php
    include("view/imports/importAddClient.html");
?>
