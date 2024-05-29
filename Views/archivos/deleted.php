<?php include_once 'Views/template/header.php'; ?>

<div class="app-content">
    <?php include_once 'Views/components/menus.php'; ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="section-description">
                <h1><?php echo $data['title'] ?></h1>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover display nowrap" style="width:100%" id="tblArchivos">
                        <thead>
                            <tr>
                                <th>Acciones</th>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>TIPO</th>
                                <th>FECHA</th>
                                <th>SE ELIMINA</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>


<?php
include_once 'Views/template/footer.php';
?>