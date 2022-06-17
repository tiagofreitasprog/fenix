<?php 
if($this->session->logged_in == false){
  redirect(base_url());
}
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('painel/faq')?>" class="nav-link">Duvidas</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('plataforma') ?>" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Gerenciamento</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url('user') ?>" class="d-block"><?php echo $this->session->username ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('plataforma') ?>" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Painel Principal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('prognosticos') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prognosticos</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo base_url('pacotes') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pacotes</p>
                </a>
              </li>
               <!--<li class="nav-item">
                <a href="<?php echo base_url('gestao') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gestão da banca</p>
                </a>
              </li>-->
               <li class="nav-item">
                <a href="<?php echo base_url('convidar') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Indique um amigo</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Prognosticos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('plataforma') ?>">Pagina principal</a></li>
              <li class="breadcrumb-item active">Prognosticos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-md-12">
	    			<div style="text-align: center;">	
	    				<?php foreach($pacotes as $pac){ ?>
	    					<?php if($permissoes == $pac->id){ ?>
	    						<h4><?php echo $pac->nome; ?></h4>
			    						<?php foreach($boletim as $row){ ?>
			    								<div class="row">
                            <div class="col-md-4">
                              <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <div class="row">
                                      <div class="col-md-9">
                                         <h5 style="font-size: 10px;" class="card-title">Boletim: <?php echo $row->id_boletim ?></h5>
                                      </div>
                                      <div class="col-md-3">
                                        <div style="text-align: left;">
                                          <p style="font-size: 10px;"><?php if($row->status == 0 ){echo "Esperando";}elseif($row->status==1){echo "Perdido";}elseif($row->status == 2){echo "Ganho";} ?></p>
                                        </div>
                                      </div>
                                    </div>
                               
                            <?php
			    									
			    									$jogos = $this->db->query("SELECT * FROM jogos")->result();
			    									
			    									$id_jogo = null;
			    									
			    									foreach($jogos as $row3){
			    										if($id_jogo == null){
			    											$query = $this->db->query('SELECT * FROM jogos WHERE id_jogos = '.$row3->id_jogos)->result();
                                
                                  if($id_jogo == null){
                                    $query = $this->db->query('SELECT * FROM jogos WHERE id_jogos = '.$row3->id_jogos)->result();
                                    ?>
                                    <div style="padding: 5px;">
                                      <p class='card-text'><?php echo $query[0]->casa." VS ".$query[0]->fora ?></p>
                                    </div>
                                    <div style="padding: 5px;">
                                      <p style="font-size: 10px;color:gray;" class='card-text'><?php echo $query[0]->descricao ?></p>
                                    </div>
                                    <?php
                                  }
			    										}
			    									}
			    									
			    								?>
			    							
			    							
			    							<?php
                          if($user[0]->casa_aposta == "betano"){
                            $odd = $row->betano;
                            $casa_aposta = "betano";
                          }elseif($user[0]->casa_aposta == "betClic"){
                             $odd = $row->betClic;
                             $casa_aposta = "betClic";
                          }elseif($user[0]->casa_aposta == "22BET"){
                            $odd = $row->x22BET;
                            $casa_aposta  = "22BET";
                          }
                        
            
                            $total = (int)$banca[0]->investimento*$row->banca/100;
                            
			    							?>
			    							    <input class="form-control" type="text" value="<?php echo "Casa de aposta:".$casa_aposta; ?>" name="" readonly />  
                            <input class="form-control" type="text" value="<?php echo "Total recomendado:".$total."€"; ?>" name="" readonly />  
                              
                              
                            </div>
			    					<?php } ?>
		    				<?php  }else{ ?>
                <?php } ?>
              </div>
		    			<?php } ?>
		    		  </div>
		    		 </div>
	    			</div>
    			</div>
    		</div>
    	</div>
    </section>
    <!-- /.content -->
   
  </div>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<script type="text/javascript">
    
</script>
</body>
</html>
