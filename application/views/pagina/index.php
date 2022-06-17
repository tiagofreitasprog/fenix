<!DOCTYPE html>
<html lang="en">
   <!-- Basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
   <!-- Site Metas -->
   <title>Fenix Consulting</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- Site Icons -->
   <link rel="shortcut icon" href="" type="recursos/image/x-icon" />
   <link rel="apple-touch-icon" href="">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="recursos/css/bootstrap.min.css">
   <!-- Site CSS -->
   <link rel="stylesheet" href="recursos/style.css">
   <!-- Colors CSS -->
   <link rel="stylesheet" href="recursos/css/colors.css">
   <!-- ALL VERSION CSS -->	
   <link rel="stylesheet" href="recursos/css/versions.css">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="recursos/css/responsive.css">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="recursos/css/custom.css">
   <!-- font family -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   <!-- end font family -->
   <link rel="stylesheet" href="css/3dslider.css" />
   <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
   <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
   <script src="js/3dslider.js"></script>
   </head>
   <body class="game_info" data-spy="scroll" data-target=".header">
      <section id="top">
         <header>
            <div class="container">
               <div class="header-top">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="full">
                           <div class="logo">
                              <a href="index.php"></a>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="right_top_section">
                           <!-- button section -->
                           <ul class="login">
                              <li class="login-modal">
                                 <a href="<?php echo base_url('login')?>" class="login"><i class="fa fa-user"></i>Login</a>
                              </li>
                              <li>
                                 <div class="cart-option">
                                    <a href="<?php echo base_url('registo') ?>"><i class="fa fa-shopping-cart"></i>Registo</a>
                                 </div>
                              </li>
                           </ul>
                           <!-- end button section -->
                        </div>
                     </div>
                  </div>
               </div>
               <div class="header-bottom">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="full">
                           <div class="main-menu-section">
                              <div class="menu">
                                 <nav class="navbar navbar-inverse">
                                    <div class="navbar-header">
                                       <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                                       <span class="sr-only">Navegação</span>
                                       <span class="icon-bar"></span>
                                       <span class="icon-bar"></span>
                                       <span class="icon-bar"></span>
                                       </button>
                                       <a class="navbar-brand" href="#">Menu</a>
                                    </div>
                                    <div class="collapse navbar-collapse js-navbar-collapse">
                                       <ul class="nav navbar-nav">
                                           <li class="active"><a href="<?php echo base_url('sobre') ?>">Sobre nós</a></li>
                                          <li class="active"><a href="<?php echo base_url('login') ?>">Prefil do Utilizador</a></li>
                                          <li><a href="<?php echo base_url('login') ?>">Partida do dia(Gratuita)</a></li>
                                          <li><a href="#pacotes">Pacotes</a></li>
                                          <li><a href="<?php echo base_url('registo')?>">Gestão da banca</a></li>
                                          <li><a href="">Prognósticos</a></li>
                                          <li><a href="">Indique um amigo</a></li>
                                          <li><a href="<?php echo base_url('contacto')?>">Apoio ao cliente</a></li>
                                       </ul>
                                    </div>
                                    <!-- /.nav-collapse -->
                                 </nav>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </header>
         <div class="full-slider">
            <div id="carousel-example-generic" class="carousel slide">
               <!-- Indicators -->
               <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
               </ol>
               <!-- Wrapper for slides -->
               <div class="carousel-inner" role="listbox">
                  <!-- First slide -->
                  <div class="item active deepskyblue" data-ride="carousel" data-interval="5000">
                     <div class="carousel-caption">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12"></div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                           <div class="slider-contant" data-animation="animated fadeInRight">
                              <h3>Consulting<br>Fenix <span class="color-yellow">Lucros</span><br>win to win!</h3>
                              <p>Ajudamos nas vossas apostas com os melhores analistas desportivos,<br>
                                exprimente já comprove por si mesmo !
                              </p>
                              <a href="<?php echo base_url('registo') ?>" class="btn btn-primary btn-lg">Criar conta</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.item -->
                  <!-- Second slide -->
                  <div class="item skyblue" data-ride="carousel" data-interval="5000">
                     <div class="carousel-caption">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12"></div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                           <div class="slider-contant" data-animation="animated fadeInRight">
                              <h3>If you Don’t Practice<br>You <span class="color-yellow">Don’t Derserve</span><br>to win!</h3>
                              <p>You can make a case for several potential winners of<br>the expanded European Championships.</p>
                              <button class="btn btn-primary btn-lg">Button</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.item -->
                  <!-- Third slide -->
                  <div class="item darkerskyblue" data-ride="carousel" data-interval="5000">
                     <div class="carousel-caption">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12"></div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                           <div class="slider-contant" data-animation="animated fadeInRight">
                              <h3>If you Don’t Practice<br>You <span class="color-yellow">Don’t Derserve</span><br>to win!</h3>
                              <p>You can make a case for several potential winners of<br>the expanded European Championships.</p>
                              <button class="btn btn-primary btn-lg">Button</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.item -->
               </div>
               <!-- /.carousel-inner -->
               <!-- Controls -->
               <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
               <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
               <span class="sr-only">Antes</span>
               </a>
               <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
               <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
               <span class="sr-only">Proximo</span>
               </a>
            </div>
            <!-- /.carousel -->
         </div>
      </section>
     <section style="margin-top:20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="main-heading sytle-2">
                            <a href="<?php echo base_url('painel/prog') ?>"><img height="100%" width="100%" src="http://www.apostas1x2.com/wordpress/wp-content/uploads/2016/03/prognosticos-futebol.png"/>
                            <p class="carousel-caption">Prognóstico para hoje</p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </section>
    <!-- PACOTES -->
    <section>
       <div class="container">
           <div class="row">
                   <div class="full">
                        <div class="right-match-time" style="
        background: none;">
                            <span id="pacotes" style="color:black;">Pacotes premium</span>
                        </div>
                   </div>
            </div>
            <div class="row">
                <?php foreach($pacotes as $row){ ?>
                <div class="col-md-3">
                    <div class="card-sl">
                        <a class="" href="#"><i class="fa fa-heart"></i></a>
                        <div class="card-heading">
                            <?php echo $row->nome ?>
                        </div>
                        <div class="card-text">
                             <?php echo $row->descricao ?>
                        </div>
                        <div class="card-text">
                             <?php echo $row->preco ?>
                        </div>
                        <a href="#" class="card-button"> Subscrever</a>
                    </div>
                </div>
              <?php } ?>
            </div>
        </div>
    </section>
      <section>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="main-heading sytle-2">
                        <h2>Guia</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium<br>doloremque laudantium, totam rem aperiam</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="video_section_main theme-padding middle-bg vedio">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="match_vedio">
                        <img class="img-responsive" src="recursos/images/img-07.jpg" alt="#" />
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <footer id="footer" class="footer">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="full">
                     <div class="footer-widget">
                        <div class="footer-logo">
                           <a href="#"><img src="recursos/images/footer-logo.png" alt="#" /></a>
                        </div>
                        <p>Most of our events have hard and easy route choices as we are always keen to encourage new riders.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer-bottom">
            <div class="container">
               <p>Copyright Fenix Consulting © 2022 </p>
            </div>
         </div>
      </footer>
      <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
      <!-- ALL JS FILES -->
      <script src="recursos/js/all.js"></script>
      <!-- ALL PLUGINS -->
      <script src="recursos/js/custom.js"></script>
   </body>
   <style>
         .card-sl {
        border-radius: 8px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .card-image img {
        max-height: 100%;
        max-width: 100%;
        border-radius: 8px 8px 0px 0;
    }

    .card-action {
        position: relative;
        float: right;
        margin-top: -25px;
        margin-right: 20px;
        z-index: 2;
        color: #E26D5C;
        background: #fff;
        border-radius: 100%;
        padding: 15px;
        font-size: 15px;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.19);
    }

    .card-action:hover {
        color: #fff;
        background: #E26D5C;
        -webkit-animation: pulse 1.5s infinite;
    }

    .card-heading {
        font-size: 18px;
        font-weight: bold;
        background: #fff;
        padding: 10px 15px;
    }

    .card-text {
        padding: 10px 15px;
        background: #fff;
        font-size: 14px;
        color: #636262;
    }

    .card-button {
        display: flex;
        justify-content: center;
        padding: 10px 0;
        width: 100%;
        background-color: #1F487E;
        color: #fff;
        border-radius: 0 0 8px 8px;
    }

    .card-button:hover {
        text-decoration: none;
        background-color: #1D3461;
        color: #fff;

    }


    @-webkit-keyframes pulse {
        0% {
            -moz-transform: scale(0.9);
            -ms-transform: scale(0.9);
            -webkit-transform: scale(0.9);
            transform: scale(0.9);
        }

        70% {
            -moz-transform: scale(1);
            -ms-transform: scale(1);
            -webkit-transform: scale(1);
            transform: scale(1);
            box-shadow: 0 0 0 50px rgba(90, 153, 212, 0);
        }

        100% {
            -moz-transform: scale(0.9);
            -ms-transform: scale(0.9);
            -webkit-transform: scale(0.9);
            transform: scale(0.9);
            box-shadow: 0 0 0 0 rgba(90, 153, 212, 0);
        }
    }
   </style>
</html>
