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
                                    <h1 class="h4 text-gray-900 mb-4">Lista de cliente</h1>
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
                                                    <a href="#=<?php echo $client['id']; ?>">
                                                    <i class="fas fa-fw fa-edit"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#=<?php echo $client['id']; ?>"
                                                    onclick="return confirm('Você tem certeza que deseja excluir este cliente?')">
                                                    <i class="fas fa-fw fa-eraser"></i></a>
                                                </td>
                                            </tr>						
                                        <?php }; ?>
                                    </tbody>
                                </table>
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
