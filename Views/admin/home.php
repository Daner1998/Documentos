<?php
function obtener_icono($nombre_archivo)
{
    $extensiones_imagen = array('jpg', 'jpeg', 'png', 'gif');
    $extensiones_texto = array('txt');
    $extensiones_pdf = array('pdf');
    $extensiones_word = array('doc', 'docx');
    $extensiones_powerpoint = array('ppt', 'pptx');
    $extensiones_comprimido = array('zip');

    $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

    if (in_array($extension, $extensiones_imagen)) {
        return array('icono' => 'image', 'color' => 'text-primary');
    } elseif (in_array($extension, $extensiones_texto)) {
        return array('icono' => 'description', 'color' => 'text-warning');
    } elseif (in_array($extension, $extensiones_pdf)) {
        return array('icono' => 'picture_as_pdf', 'color' => 'text-danger');
    } elseif (in_array($extension, $extensiones_word)) {
        return array('icono' => 'description', 'color' => 'text-success');
    } elseif (in_array($extension, $extensiones_powerpoint)) {
        return array('icono' => 'slideshow', 'color' => 'text-primary');
    } elseif (in_array($extension, $extensiones_comprimido)) {
        return array('icono' => 'archive', 'color' => 'text-info');
    } else {
        return array('icono' => 'insert_drive_file', 'color' => 'text-info');
    }
}
?>
<?php include_once 'Views/template/header.php'; ?>

<div class="app-content">
    <?php include_once 'Views/components/menus.php'; ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description d-flex align-items-center">
                        <div class="page-description-content flex-grow-1">
                            <h1>Administrador de Carpetas</h1>
                        </div>
                        <div class="page-description-actions">
                            <a href="#" class="btn btn-primary" id="btnUpload"><i class="material-icons">add</i>Subir Archivo</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="container_progress" class="mb-3"></div>
            <div class="row">
                <?php foreach ($data['carpetas'] as $carpetas) {  ?>
                    <div class="col-md-4">
                        <div class="card file-manager-group">
                            <div class="card-body d-flex align-items-center">
                                <i class="material-icons" style="color: #<?php echo $carpetas
                                ['color']; ?>">folder</i>
                                <div class="file-manager-group-info flex-fill">
                                    <a href="#" id="<?php echo $carpetas['id']; ?>"
                                     class="file-manager-group-title carpetas"><?php echo $carpetas
                                     ['nombre']; ?></a>
                                    <span class="file-manager-group-about"><?php echo $carpetas
                                    ['fecha']; ?></span>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php } ?>
            </div>

            <div class="section-description">
                <h1>Administrador de Archivos</h1>
            </div>
            <div class="row">
                <?php foreach ($data['archivos'] as $archivo) { ?>
                    <div class="col-md-6">
                        <div class="card file-manager-recent-item">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <?php $icono = obtener_icono($archivo['nombre']); ?>
                                    <i class="material-icons-outlined <?php echo $icono['color']; ?> align-middle m-r-sm"><?php echo $icono['icono']; ?></i>
                                    <a href="#" class="file-manager-recent-item-title flex-fill"><?php echo $archivo['nombre']; ?></a>
                                    <span class="p-h-sm"><?php echo $archivo['tamaño_archivo']; ?> KB</span>
                                    <span class="p-h-sm text-muted"><?php echo $archivo['fecha_create']; ?></span>
                                    <a href="#" class="dropdown-toggle file-manager-recent-file-actions" id="file-manager-recent-<?php echo $archivo['id']; ?>" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="file-manager-recent-<?php echo $archivo['id']; ?>">
                                        <li><a class="dropdown-item compartir" href="#" id="<?php echo $archivo['id']; ?>">Compartir</a></li>
                                        <li><a class="dropdown-item" href="<?php echo BASE_URL . 'Assets/archivos/' . $archivo['id_carpeta'] . '/' . $archivo['nombre']; ?>" download="<?php echo $archivo['nombre']; ?>">Descargar</a></li>
                                        <li><a class="dropdown-item eliminar" href="#" data-id="<?php echo $archivo['id']; ?>">Eliminar</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>



<?php 
include_once 'Views/components/modal.php'; 
include_once 'Views/template/footer.php'; 
?>