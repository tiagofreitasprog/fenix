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
        <a href="<?php echo base_url('plataforma') ?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('faq') ?>" class="nav-link">Duvidas</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
         <a class="nav-link" href="#">Carteira virutal = <?php if($banca != null){echo $banca[0]->investimento."€";} ?></a>
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
                <a href="./index.html" class="nav-link active">
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
            <h1 class="m-0">Painel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('plataforma') ?>">Pagina principal</a></li>
              <li class="breadcrumb-item active">Gestão da banca</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <th>
                            <tr>
                                <td>#</td>
                                <td>Meu investimento</td>
                                <td>Retido</td>
                                <td>Possiveis ganhos</td>
                                <td>Balanço atual</td>
                                <td>Status</td>
                            </tr>
                        </th>
                       
                        <?php foreach($banca as $row){ ?>
                            <tr>
                               
                                <td>#</td>
                                <td><?php echo $row->investimento."€" ?></td>
                                <td><?php echo $row->apostado."€" ?></td>
                                <td><?php echo $row->aguardando."€" ?></td>
                                <td><?php 
                                      if($row->balanco > $row->investimento) {
                                        echo "<p style='color:green;'>Investimento:".$row->balanco."</p>";
                                      }
                                      if($row->balanco < $row->investimento) {
                                        echo "<p style='color:red;'>Investimento:".$row->balanco."</p>";
                                      }
                                      if($row->balanco == $row->investimento) {
                                        echo "<p style='color:yellow;'>Investimento:".$row->balanco."</p>";
                                      }
                                    ?>
                                  
                                </td>
                                <td>
                                  <button class="btn btn-success">Em aberto</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="">
      <div class="">
        <div class="row">
          <div class="col-md-12">
            <div style="text-align: center">
              <h3>Minhas apostas</h3>
            </div>
            <table id="tab1" class="table">
              <tr>
                <th>#</th>
                <th>Jogos</th>
                <th>Descrição</th>
                <th>Recomendação</th>
                <th>Status</th>
              </tr>
              <?php foreach($prognosticos as $row){ ?>
                <tr class="row-select">
                  <td><?php echo $row->id_boletim ?></td>
                  <td>
                      <?php
                        
                        $jogos = $this->db->query("SELECT * FROM jogos")->result();
                        
                        $id_jogo = null;
                        
                        foreach($jogos as $row3){
                          if($id_jogo == null){
                            $query = $this->db->query('SELECT * FROM jogos WHERE id_jogos = '.$row3->id_jogos)->result();
                            echo "<div style='border: 1px solid;'>";
                            echo $query[0]->casa." VS ".$query[0]->fora."<br />";
                            echo "</div>";
                          }
                        }
                      ?>
                    </td>
                    <td>
                      <?php 

                        foreach($jogos as $row2){
                          if($id_jogo == null){
                            $query = $this->db->query('SELECT * FROM jogos WHERE id_jogos = '.$row2->id_jogos)->result();
                            echo "<div style='border: 1px solid;'>";
                            echo $query[0]->descricao."<br />";
                            echo "</div>";
                          }
                        }

                      ?>

                    </td>
                    <td>
                      <?php  
                        if($row->recomendacao >= 60){
                          echo "<p style='color:green'>".$row->recomendacao."%"."</p>";
                        }else if($row->recomendacao <= 60 && $row->recomendacao >= 50){
                        echo "<p style='color:orange'>".$row->recomendacao."%"."</p>";
                        }else if($row->recomendacao <= 50){
                          echo "<p style='color:red'>".$row->recomendacao."%"."</p>";
                        }
                      ?>
                    </td>
                    <?php if($row->status == 1){ ?>
                    <td>
                      <p style="color: green;">Ganho</p>
                    </td>
                    <?php } ?>
                    <?php if($row->status == 0){ ?>
                    <td>
                      <form action="Painel/cancelarAposta">
                        <input type="text" name="valor" value="<?php echo $row->valor ?>" hidden>
                        <input type="text" name="id_aposta" value="<?php echo $row->id_aposta ?>" hidden>
                        <p style="color: orange;">Pendente</p>
                        <input type="submit" value="Cancelar Aposta" class="btn btn-danger"/>
                      </form>
                    </td>
                    <?php } ?>
                    <?php if($row->status == 2){ ?>
                    <td>
                      <p style="color: red;">Perda</p>
                    </td>
                    <?php } ?>
                  <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </section>
      
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
</body>
</html>
