<?php
    include('../verifica_login.php');
    include('../conecta.php');
    
    if(!$_SESSION['validate-insert']) {
        header('location: page-insert-item-nf.php');
    }

    $nf = $_SESSION['nf'];

    $queryItemsNF = "SELECT * FROM itemsnf WHERE codNF = '$nf'";
    $total = 0;
    foreach ($conexao -> query($queryItemsNF) as $lineResult) {
        $total = $total + $lineResult['subtotal'];
    }
    $_SESSION['total'] = $total;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Loja Otakinho - Sistema NF</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/images/favicon.png" rel="icon">
  <link href="../assets/images/favicon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/css/main.css" rel="stylesheet">
  <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bootslander - v2.2.0
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    .page-home {
      height: 100vh !important;
    }

    .drop-down ul {
      background-color: rgba(20, 20, 26, 0.9) !important;
    }

    .drop-down ul li a {
      color: white !important;
      transition: .3s;
    }

    .drop-down ul li a:hover {
      color: #1acc8d !important;
    }

    #hero {
      background: url("../assets/images/bgAnime2.jpg") fixed;
      background-repeat: no-repeat;
      background-size: 100% 110%;
      background-position: center;
      
      min-height: 100vh !important;

      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
    }

    .card {
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;

      padding-top: 2.5rem;
      padding-bottom: 2.5rem;
    }

    .col-auto {
      width: 100%;

      margin-top: 1rem;

      display: flex;
      align-items: center;
      justify-content: center;
    }

    .btn-primary {
      border-color: transparent !important;
    }

    .btn:hover {
      background-color: #34e5a6 !important;
    }

    .animated-button {
      -webkit-animation: right-left 1s ease-in-out infinite alternate-reverse both;
      animation: right-left 1s ease-in-out infinite alternate-reverse both;
    }

    .btn-sucess:hover {
        background-color: #34e5a6 !important;
    }

    .btn-danger:hover {
        background-color: #d64755 !important;
    }

    @-webkit-keyframes right-left {
      0% {
        transform: translateX(0px);
      }
      100% {
        transform: translateX(4px);
      }
    }

    @keyframes right-left {
      0% {
        transform: translateX(0px);
      }
      100% {
        transform: translateX(4px);
      }
    }

    .animated-button2 {
        -webkit-animation: top-bottom 1.5s ease-in-out infinite alternate-reverse both;
        animation: top-bottom 1.5s ease-in-out infinite alternate-reverse both;
      }
  
      @-webkit-keyframes top-bottom {
        0% {
          transform: translateY(-2px);
        }
        100% {
          transform: translateY(2px);
        }
      }
  
      @keyframes top-bottom {
        0% {
          transform: translateY(-2px);
        }
        100% {
          transform: translateY(2px);
        }
      }

    @media (max-width: 1000px) {
      #hero {
      background-size: 110% 110%;
      }
    }

    @media (max-width: 800px) {
      #hero {
      background-size: 120% 100%;
      }
    }

    @media (max-width: 650px) {
      #hero {
      background-size: 125% 100%;
      }
    }

    @media (max-width: 500px) {
      #hero {
      background-size: 130% 100%;
      }
    }

    @media (max-width: 400px) {
      #hero {
      background-size: 140% 100%;
      }
    }

    @media (max-width: 300px) {
      #hero {
      background-size: 150% 100%;
      }
    }
  </style>
</head>

<body class="page-home">
  <div class="page-home-container">

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
      <div class="container d-flex align-items-center">

        <div class="logo mr-auto">
          <h1 class="text-light"><a href="index.php"><span>Loja Otakinho</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li><a href="#" style="opacity: 50%;">Voltar &nbsp;<i class="solid fa fa-arrow-circle-left"></i></a></li>
            <li class="drop-down"><a href="#" style="opacity: 50%;">Opções</a>
              <ul>
                <li><a href="#" style="opacity: 50%;">Notas Emitidas</a></li>
                <li><a href="#" style="opacity: 50%;">Ver Produtos</a></li>
                <li><a href="#" style="opacity: 50%;">Cadastrar Produtos</a></li>
              </ul>
            </li>
            <li><a href="#" style="opacity: 50%;">Logout &nbsp;<i class="solid fa fa-sign-out"></i></a></li>

          </ul>
        </nav><!-- .nav-menu -->

      </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">

      <div class="card text-white bg-dark mb-3" data-aos="zoom-in" style="padding: 2rem;">
          <div class="card-header bg-dark text-white" style="padding-top: 0px !important;"><b>NF: <?php echo $nf; ?> &nbsp;<i class="animated-button fa fa-hand-o-right"></i>&nbsp;&nbsp; Total: R$ <?php echo $total; ?></b></div>
          <div class="card-body" style="width: 100%; display: flex; align-items: center !important; justify-content: center !important; padding: 0px !important;">

            <table class="table table-striped table-dark" style="opacity: 90%;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $queryItemsNF = "SELECT * FROM itemsnf WHERE codNF = '$nf'";
                        foreach ($conexao -> query($queryItemsNF) as $lineResult) {
                            include('../conecta.php');

                            $codProduct = $lineResult['codProduct'];
                            $queryProducts = "SELECT * FROM products WHERE idProduct = '$codProduct'";
                            $queryProducts = $conexao -> query($queryProducts);
                            $lineResultQueryProducts = $queryProducts -> fetch_assoc();
                            $nameProduct = $lineResultQueryProducts['name'];
                            $priceProduct = $lineResultQueryProducts['price'];
                    ?>

                            <tr>
                                <th scope="row"><?php echo $lineResult['codProduct']; ?></th>
                                <td><?php echo $nameProduct; ?></td>
                                <td><?php echo $priceProduct; ?></td>
                                <td><?php echo $lineResult['amount']; ?></td>
                                <td><?php echo $lineResult['subtotal']; ?></td>
                            </tr>

                        <?php
                            }
                        ?>
                </tbody>
            </table>  

          </div>
          <p style="margin-top: 1rem; text-align: left;">O que deseja fazer <?php echo $_SESSION['name']; ?>?</p>
          <div class="btn-group mr-2" role="group" aria-label="Second group">
            <a href="page-product-nf.php?total=<?php echo $total; ?>"><button type="button" class="btn btn-sucess" style="background-color: #1acc8d; border-color: none !important; color: white; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">Adicionar <i class="fa fa-cart-plus"></i></button></a>
            <?php 
                $_SESSION['validate-confirm-item'] = true;
            ?>
            <a href="confirm-item.php"><button type="button" class="btn btn-danger" style="border-color: none !important; border-top-left-radius: 0px; border-bottom-left-radius: 0px;">Finalizar <i class="fa fa-exclamation-circle"></i></button></a>
          </div>
        </div>

    </section><!-- End Hero -->

  </div>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>
