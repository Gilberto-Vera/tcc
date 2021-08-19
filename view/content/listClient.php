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
                                        <tr>
                                            <th>Nome</th>
                                            <th>email</th>
                                            <th>Senha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($clients as $client) { ?>
                                            <tr>
                                                <td><?php echo $client['nome']; ?></td>
                                                <td><?php echo $client['email']; ?></td>
                                                <td><?php echo $client['senha']; ?></td>
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
