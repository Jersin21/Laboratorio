
<!DOCTYPE html>

<html lang="es">
    <head>
        <style>
            .imagen-galeria {
              width: 200px;
              height: 150px;
            }
            #galeria{ width: 400px;}

            nav ul{ list-style:none; padding-left: 0; 
             display:flex;
            }

            nav ul li a img{
             width: 100px;
             opacity:50%;
             transition:0.3s;
             filter:grayscale(50%);

                &:hover{ opacity:100%;  margin-top:-5px;  filter:grayscale(0%);
                box-shadow: 0 4px 8px rgba(0,0,0,.3)
                }
                &:active{transform:scale(0.8)}
            }
      </style>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistema Web</title>
        <link href="<?php echo APP_PATH_CSS; ?>styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
            var app_base_url = '<?= base_url();?>';        
        </script>  
	</head>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo APP_PATH_JS; ?>scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo APP_PATH_DEMO; ?>chart-area-demo.js"></script>
    <script src="<?php echo APP_PATH_DEMO; ?>chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="<?php echo APP_PATH_DEMO; ?>datatables-demo.js"></script>


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">TECLAB</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['usuario']; ?><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= base_url();?>logout">Salir</a>
					</div>
				</li>
			</ul>
		</nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="portada">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Portada
                            </a>
                            <?php if($_SESSION['idTipoUsuario'] == 1){  ?>
                            <a class="nav-link" href="ReporteController">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i>
                                    </div>
                                    Reportes
                                </a>
                            <?php } ?>
                            <?php if($_SESSION['idTipoUsuario'] == 5){  ?>
                                <a class="nav-link" href="SolicitudController">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i>
                                    </div>
                                    Gestion de Solicitud Medico
                                </a>
                            <?php } ?>
                            <?php if($_SESSION['idTipoUsuario'] == 7){  ?>
                                <a class="nav-link" href="RecepcionController">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i>
                                    </div>
                                    Gestion de Solicitudes Recepcion
                                </a>
                            <?php } ?>
                            <?php if($_SESSION['idTipoUsuario'] == 6){  ?>
                                <a class="nav-link" href="ResultadoController">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i>
                                    </div>
                                    Gestion de Solicitudes Responsable
                                </a>
                            <?php } ?>      
					</div>
				</nav>
			</div>
            

