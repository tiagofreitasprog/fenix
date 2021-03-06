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
        <a href="<?php echo base_url('admin') ?>" class="nav-link">Home</a>
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
    <a href="<?php echo base_url('admin') ?>" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Painel administrador</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" data-toggle="modal" data-target="#exampleModal" class="d-block"><?php echo $this->session->username ?></a>
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
                <a href="" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Website</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('website') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Plataforma</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('subscricoes')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subscri????es</p>
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
            <h1 class="m-0">Website</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Home</a></li>
              <li class="breadcrumb-item active">Website</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <section>
          <div class="row">
            <div class="col-md-12">
              <div style="text-align: center;">
              
              </div>
            </div>
          </div>
        </section>
        <section>
        <div class="row">
          <div class="col-md-12">
            <div style="text-align: center;">
              <h3>Adicionar/Apagar pacotes</h3>
              <table class="table">
                  <th>#</th>
                  <th>Nome</th>
                  <th>Descricao</th>
                  <th>Pre??o</th>
                  <th>Op????es</th>
                
              <?php foreach($pacotes as $row){ ?>
                 <tr>
                   <td><?php echo $row->id ?></td>
                   <td><?php echo $row->nome ?></td>
                   <td><?php echo $row->descricao ?></td>
                   <td><?php echo $row->preco ?></td>
                   <td>
                     <a class="btn-danger">Eliminar</a>
                   </td>
                 </tr>
              <?php } ?>
                  <tr>
                    <form id="adicionarProgramas" class="form" method="POST" action="painel/adicionarPacotes">
                      <td>#</td>
                      <td><input class="form-control" type="text" name="nome"></td>
                      <td><input class="form-control" type="text" name="descricao"></td>
                      <td><input class="form-control" type="text" name="preco"></td>
                      <td><input type="submit" class="btn btn-sucess"></td>
                    </form>
                  </tr>
              </table>
            </div>
          </div>
        </div>
      </section>
     
         
       <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Defini????es</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <form action="" method="POST">
                  <label class="form-control">Mudar Password</label>
                  <div style="padding: 5px">
                    <input class="form-control" type="password" name="password" placeholder="Insira nova password">
                  </div>
                  <div style="padding: 5px">
                    <input class="form-control" type="password" name="password" placeholder="Confirme nova password">
                  </div>
                  <div style="padding: 5px">
                    <button type="submit" class="btn btn-warning">Alterar</button>
                  </div>
                </form>
              </div>
              <div class="col-md-6">
                <form action="" method="POST">
                  <label class="form-control">Mudar telefone</label>
                  <div style="padding: 5px">
                    <input class="form-control" type="password" name="password" placeholder="Insira antigo numero">
                  </div>
                  <div style="padding: 5px">
                    <input class="form-control" type="password" name="password" placeholder="Insira novo numero">
                  </div>
                  <div style="padding: 5px">
                    <button type="submit" class="btn btn-warning">Alterar</button>
                  </div>
                </form>
              </div>
            </div>
              <div style="text-align: center;">
                <a href="<?php echo base_url('sair') ?>" class="btn btn-danger">Sair</a>
              </div>
          </div>
        </div>
      </div>
    </div>  
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

<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body> 
<footer>
  <style type="text/css">
    .centro{
      text-align: center;
      padding: 20px;
    }
  </style>
</footer>
</html>
