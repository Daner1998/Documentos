<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../Assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title><?php echo $data['title']; ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL . 'Assets/img/favicon/favicon.ico'; ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    
    
    <link rel="stylesheet" href="<?php echo BASE_URL . 'Assets/plugins/fonts/boxicons.css'; ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL . 'Assets/plugins/css/core.css'; ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo BASE_URL . 'Assets/plugins/css/theme-default.css'; ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo BASE_URL . 'Assets/css/diseño.css'; ?>" />


    <!-- pluginss CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL . 'Assets/plugins/libs/perfect-scrollbar/perfect-scrollbar.css'; ?>" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?php echo BASE_URL . 'Assets/plugins/css/pages/page-auth.css'; ?>" />

    <!-- Helpers -->
    <script src="<?php echo BASE_URL . 'Assets/plugins/js/helpers.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/js/config.js'; ?>"></script>

  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              
              <h4 class="mb-2" style="text-align: center;">  <a href="#"><?php echo $data['title']; ?></a></h4>
              
                  
              <form id="formulario"  autocomplete="off">
                <input type="hidden" name="token" value="<?php echo $data['usuario']['token']; ?>">
                <div class="mb-3">
                  <label for="clave_nueva" class="form-label">Contraseña Nueva</label>
                  <input
                    type="password"
                    class="form-control m-b-md"
                    id="clave_nueva"
                    name="clave_nueva"
                    placeholder="Ingrese Contraseña Nueva"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-clave-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="clave"> Confirmar Contraseña <span class="text-danger">*</span></label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="clave_confirmar"
                      class="form-control"
                      name="clave_confirmar"
                      placeholder="Confirmar Contraseña"
            
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>

                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Cambiar Contraseña</button>
                </div>
              </form>

              <p class="text-center">
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>



    <!-- Core JS -->
    <!-- build:js assets/plugins/js/core.js -->
    <script src="<?php echo BASE_URL . 'Assets/plugins/libs/jquery/jquery.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/plugins/libs/popper/popper.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/plugins/js/bootstrap.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/plugins/libs/perfect-scrollbar/perfect-scrollbar.js'; ?>"></script>

    <script src="<?php echo BASE_URL . 'Assets/plugins/jquery/jquery-3.5.1.min.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/plugins/js/menu.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/js/sweetalert2@11.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/js/alertas.js'; ?>"></script>
    <script>
        const base_url = '<?php echo BASE_URL;?>';
    </script>
  
    <script src="<?php echo BASE_URL . 'Assets/js/pages/reset.js'; ?>"></script>
 

    <!-- Main JS -->

    <script src="<?php echo BASE_URL . 'Assets/js/main.js'; ?>"></script>
   
    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
