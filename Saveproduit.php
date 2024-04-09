<?php
session_start();
require_once "connection.php";
$bdd = $database->getConnection();
require_once "session_ouvert.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>FinAfriqu-Etude-Formation-Conseil</title>

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- endinject -->
  <!-- Favicon -->
  <link href="img/logo_finafrique.png" rel="icon">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color: #5a220b;">
        <a class="navbar-brand brand-logo mr-5" href="home.php"><img src="img/logo_finafrique_white.png" class="mr-2" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-color: #5a220b;">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">

          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link count-indicator dropdown-toggle py-2 m-4" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span></a>
            <a class="nav-link text-white dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <?php echo isset($_SESSION['user']['Nom']) ? $_SESSION['user']['Nom'] : 'Bienvenu'; ?>
            </a>
          </li>
          <li class='nav-item'>
            <Form action='Deconnection.php' method='POST'>
              <input type='submit' class='mb-1 btn-danger' value='Deconnection' id='decon'>
            </Form>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
  

     <!-- contact -->
    <div class="content">
        <div class="py-5" style="display: flex; justify-content: center; align-items: center;">
            <div style="text-align: center;">
                <i class="bi bi-envelope" style="font-size: 50px;"></i>
                <p style="font-weight: bolder; color: #5c5f61; font-size: 30px;">Enregistrer un produit</p>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-5 mr-auto">
                    <p class="py-4" style="font-weight: bolder; color: #5c5f61; font-size: 20px;">CONTACT</p>

                    <ul class="list-unstyled pl-md-5 mb-5">
                        <span style="font-weight: bolder; color: #5c5f61; font-size: 12px;" href="#">TELEPHONE</span><br>
                        <li class="d-flex text-black mb-2 py-3">
                            <small class="me-3 text-light bg-drapeau" id="drapeau">
                                <h6 style="color: #4e4f50; font-size: 15px;"><i class="flag-icon flag-icon-fr py-1"></i> France: 00 33 (0) 1 73 30 68 62 123 </h6>
                                <h6 style="color: #4e4f50; font-size: 15px;"><i class="flag-icon flag-icon-cm py-1"></i> Cameroun: 00 237 242 10 79 86</h6>
                                <h6 style="color: #4e4f50; font-size: 15px;"><i class="flag-icon flag-icon-ci py-1"></i> Côte d'ivoire: 00 225 69 49 38 46</h6>
                            </small>
                        </li>
                        <li class="py-4" style="border-top: 2px solid #c5c4c4; width: 70%;">
                            <a style="font-weight: bolder; color: #5c5f61; font-size: 12px;" href="#">E-MAIL</a>
                            <p class="py-3" style="color: #4e4f50; font-size: 15px;"><i class="bi bi-briefcase-fill"></i> info@finafrique.com</p>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6">
                    <form class="mb-5" method="POST" action="inserproduit.php" id="contactForm" name="contactForm">
                        <div class="row">
                            <p class="py-4" style="font-weight: bolder; color: #5c5f61; font-size: 20px;">ENTRER LES INFORMATIONS DU PRODUIT</p>
                            <div class="col-md-12 form-group py-4">
                                <input id="input" type="text" class="form-control" name="Name" id="name" placeholder="Nom du produit" pattern="[A-Za-z\s]+" style="border: 2px solid #c5c4c4" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group py-4">
                                <input id="input" type="text" class="form-control" name="Reference" id="prenom" placeholder="Reférence" pattern="[A-Za-z\s]+" style="border: 2px solid #c5c4c4" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group py-4">
                                <input id="input" type="text" class="form-control" name="Numero" id="date" placeholder="Numéro de serie" style="border: 2px solid #c5c4c4" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group py-4">
                                <input id="input" type="Number" class="form-control" name="Prix" id="date" placeholder="Prix unitaire" style="border: 2px solid #c5c4c4" required>
                            </div>
                        </div>
                        <div class="row py-4">
                            <div class="col-md-12">
                                <input type="submit" value="ENVOYER" name="Envoi" class="btn text-white rounded-0 py-2 px-4" style="background-color: #5a220b;">
                                <span class="submitting"></span>

                                <input type="reset" value="REINITIALISER" class="btn text-white rounded-0 py-2 px-4" style="background-color: #5a220b;">
                                <span class="submitting"></span>
        
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <p class="small fw-bold mt-2 pt-1 mb-0">Consulter la liste des <a href="Liste.php" class="link-danger">Produits</a> </p>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- contact-->
 
        <!-- partial:partials/_footer.html -->
        <footer class="footer text-white" style="background-color: #5a220b;">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Master 1 SG GL © 2024. Premium <a href="#" target="_blank">Les meilleurs produit </a> dans nos rayons de vente</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">FOKOU JACQUES DUCLAIR <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>