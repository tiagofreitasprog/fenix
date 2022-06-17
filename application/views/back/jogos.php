<?php 
if($this->session->logged_in == false){
  redirect(base_url());
}
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="<?php echo base_url('admin')?>" role="button"><i class="fas fa-bars"></i></a>
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

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
           <?php foreach($contactos as $row){ ?>
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                 <?php echo $row->nome ?>
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm"><?php echo $row->mensagem ?></p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?php echo $row->telefone ?></p>
              </div>
            </div>
          <?php } ?>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
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
            <a href="<?php echo base_url('admin') ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin') ?>" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Painel Principal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('website') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Website</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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
                <h3>Inserir jogos</h3>
                <form action="<?php echo base_url('painel/inserirJogos') ?>" method="POST">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <div style="margin:15px;">
                          <label class="form-control">Equipa da casa</label>
                          <input name="equipa_casa" id="equipa_casa" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div style="margin:15px;">
                          <label class="form-control">Equipa fora</label>
                          <input name="equipa_fora" id="equipa_fora" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                     <div style="margin:15px;">
                        <label class="form-control">Descrição de aposta</label>
                        <input name="descricao" id="" type="text" class="form-control">
                      </div>
                    </div>
                  </div>
                  <input class="btn btn-success" type="submit" name="Confirmar">
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <section>
          <?php foreach($lista_pacotes as $pac){ ?>
        	<div class="row">
        		<div class="col-md-12">
        			<div style="text-align: center;padding: 15px;">	
        				<h3><?php echo $pac->nome ?></h3>
        			</div>
        		
        				<table class="table">
        					<tr>
        						<th>ID JOGO</th>
        						<th>Equipa da casa</th>
        						<th>VS</td>
        						<th>Equipa fora</th>
        						<th>Aposta(descricao)</th>
        						<th>Efetuar aposta</th>
        					</tr>
        					<form action="Painel/boletim" method="POST">
    	    					<?php foreach($jogos as $row){ ?>
    	    					<tr>
    	    						<td><?php echo $row->id_jogos ?></td>
    	    						<td><?php echo $row->casa ?></td>
    	    						<td>VS</td>
    	    						<td><?php echo $row->fora ?></td>
    	    						<td><?php echo $row->descricao ?></td>
    	    						<td>
                        <input type="checkbox" name="selecionar[]" value="<?php echo $row->id_jogos?>">
                        <input type="text" name="id_pacote" value="<?php echo $pac->id?>" hidden>

                      </td>
    	    					</tr>
    	    					
    	    					<?php } ?>
    							<tr>
    								<td></td>
    								<td></td>
    								<td></td>
    								<td>
                      <lable class="form-control">odd BetClic</lable>
                      <input class="form-control" placeholder="0.00-100.00" type="text" name="BetClic" required />
                      <lable class="form-control">odd Betano</lable>
                      <input class="form-control" placeholder="0.00-100.00" type="text" name="Betano" required/>
                      <lable class="form-control">odd 22BET</lable>
                      <input class="form-control" placeholder="0.00-100.00" type="text" name="22BET" required/>
                    </td>
    								<td>
    								    <lable class="form-control">Recomendação</lable>
    								    <input class="form-control" placeholder="0-100" type="number" name="rec" required/>
    								</td>
    								<td>
    									<div class="row">
    										<div class="col-sm-6">
    											<input class="form-control" type="decimal" name="banca" placeholder="banca(%)" />
    										</div>
    										<div class="col-sm-6">
    											<button style="height: 100%;width: 100%;" class="btn btn-success" type="submit" value="Confirmar">Confirmar</button>
    										</div>
    									</div>
    								</td>
    							</tr>
        					</form>
        				</table>
        		</div>
        	</div>
   		<?php  } ?>
      </section>
    </div>
  </section>
  <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Definições</h5>
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
  <script type="text/javascript">
     $.ajax({
            type: "POST", //rest Type
            dataType: 'json', //mispelled
            url: "https://soccer.sportmonks.com/api/v2.0/leagues?api_token={2ww9z4hak5WQn3vr7Do36yPu2YtAvUhhrhuPvXWK8kVCDMr7i58aQxurYEr4}",
           
            success: function (msg) {
                console.log("mensagem"+msg);                
            },
             error: function (jqXHR, exception) {
              var msg = '';
              if (jqXHR.status === 0) {
                  msg = 'Not connect.\n Verify Network.';
              } else if (jqXHR.status == 404) {
                  msg = 'Requested page not found. [404]';
              } else if (jqXHR.status == 500) {
                  msg = 'Internal Server Error [500].';
              } else if (exception === 'parsererror') {
                  msg = 'Requested JSON parse failed.';
              } else if (exception === 'timeout') {
                  msg = 'Time out error.';
              } else if (exception === 'abort') {
                  msg = 'Ajax request aborted.';
              } else {
                  msg = 'Uncaught Error.\n' + jqXHR.responseText;
              }
              $('#post').html(msg);
          },
 });
  </script>
</footer>
</html>
