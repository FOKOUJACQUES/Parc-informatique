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
  <title>IUG-PInformatique</title>

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


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
  <link href="img/IUG.PNG" rel="icon">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color: rgb(3, 185, 27);">
        <a class="navbar-brand brand-logo mr-5" href="home.php"><img src="img/IUG.PNG" class="mr-2" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-color: rgb(3, 185, 27);">
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
              <?php echo isset($_SESSION['user']['nom']) ? $_SESSION['user']['nom'] : 'Bienvenu'; ?>
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
    <div class="container-fluid page-body-wrapper">
      <div class="container-fluid">
        <div class="row">
          <!-- Sidebar -->
          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" href="home.php">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Tableau de bord</span>
                  </a>
                </li>
                <?php
                if (isset($_SESSION['user']) && $_SESSION['user']['Statut'] == 'Administrateur') {
                  echo "
            <style>
            .dropdown-toggle::after {
              content: '▶';
              transform: rotate(90deg);
              display: inline-block;
              margin-left: .255em;
              vertical-align: .255em;
          }
        </style>
          <li class='nav-item'>
              <div class='dropdown'>
                  <button type='button' class='btn dropdown-toggle' data-bs-toggle='dropdown' style='text-align: left; margin-left: 18px; width: 100%;'>Gestion des:</button>
                  <ul class='dropdown-menu dropdown-menu-end'>
                      <li><a class='dropdown-item' href='recupmachine.php'>machine</a></li>
                      <li><a class='dropdown-item' href='insertservices.php'>Services</a></li>
                      <li><a class='dropdown-item' href='#'>affectations</a></li>
                      <li><a class='dropdown-item' href='contact.php'>utilisateur</a></li>
                  </ul>
              </div>
          </li>
          <li class='nav-item'>
              <div class='dropdown'>
                  <button type='button' class='btn dropdown-toggle' data-bs-toggle='dropdown' style='text-align: left; margin-left: 18px; width: 100%;'>Equipements:</button>
                  <ul class='dropdown-menu dropdown-menu-end'>
                      <li><a class='dropdown-item' href='#'>Attribution</a></li>
                      <li><a class='dropdown-item' href='etatmachine.php'>Etats</a></li>
                  </ul>
              </div>
          </li>
          <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"rebut.php\">
                  <i class=\"icon-paper menu-icon\"></i>
                  <span class=\"menu-title\">Rebuts</span>
              </a>
          </li>
          <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"pages/documentation/documentation.html\">
                  <i class=\"icon-paper menu-icon\"></i>
                  <span class=\"menu-title\">Statistique</span>
              </a>
          </li>
          <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"pages/documentation/documentation.html\">
                  <i class=\"icon-paper menu-icon\"></i>
                  <span class=\"menu-title\">Documentation</span>
              </a>
          </li>";
                } else {
                  echo "
                  <li class=\"nav-item\">
                  <a class=\"nav-link\" href=\"insertservices.php\">
                      <i class=\"icon-paper menu-icon\"></i>
                      <span class=\"menu-title\">Services</span>
                  </a>
              </li>
              <li class=\"nav-item\">
                  <a class=\"nav-link\" href='etatmachine.php'>
                      <i class=\"icon-paper menu-icon\"></i>
                      <span class=\"menu-title\">Etats équipements</span>
                  </a>
              </li>
              <li class=\"nav-item\">
                  <a class=\"nav-link\" href=\"rebut.php\">
                      <i class=\"icon-paper menu-icon\"></i>
                      <span class=\"menu-title\">Rebuts</span>
                  </a>
              </li>
              <li class=\"nav-item\">
                  <a class=\"nav-link\" href=\"pages/documentation/documentation.html\">
                      <i class=\"icon-paper menu-icon\"></i>
                      <span class=\"menu-title\">Statistique</span>
                  </a>
              </li>
              <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"pages/documentation/documentation.html\">
                  <i class=\"icon-paper menu-icon\"></i>
                  <span class=\"menu-title\">Documentation</span>
              </a>
          </li>";
                }
                ?>
              </ul>
            </div>
          </nav>

          <!-- partial -->
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="main-panel">
              <div class="content-wrapper">
                <div class="row">
                  <div class="col-md-12 grid-margin">
                    <div class="row">
                      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Bienvenu au parc informatique de IUG</h3>
                        <h6 class="font-weight-normal mb-0">Retrouver toutes les informations sur <span class="text-primary">les équipements informatique ici.</span></h6>
                      </div>
                      <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                          <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              <i class="mdi mdi-calendar"></i>
                              <?php
                              date_default_timezone_set('Africa/Douala'); // Remplacez par votre fuseau horaire
                              echo date('d-m-Y H:i');
                              ?>
                            </button>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 grid-margin stretch-card">
                    <div class="card tale-bg">
                      <div class="card-people mt-auto">
                        <img src="images/dashboard/people.svg" alt="people">
                        <div class="weather-info">
                          <div class="d-flex">
                            <div>
                              <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>100<sup>%</sup></h2>
                            </div>
                            <div class="ml-2">
                              <h4 class="location font-weight-normal">Satisfait</h4>
                              <h6 class="font-weight-normal">De la qualité du service</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                      <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale" style="background-color: #34AD54; color: white;">
                          <div class="card-body">
                            <p class="mb-4">Unité centrale fonctionnelle</p>
                            <p class="fs-30 mb-2">
                              <?php
                              $recuperer = $bdd->prepare("SELECT Count(*) as nbre FROM machines WHERE type='Unite centrale' AND etat='en service'") ;
                              $recuperer->execute(array());
                              while($row = $recuperer->fetch(PDO::FETCH_ASSOC)){
                                echo "{$row['nbre']}";
                              }
                              ?>
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark" style="background-color: orange; color: white;">
                          <div class="card-body">
                            <p class="mb-4">Ecran opérationnel</p>
                            <p class="fs-30 mb-2">
                            <?php
                              $recuperer = $bdd->prepare("SELECT Count(*) as nbre FROM machines WHERE type='Ecran' AND etat='en service'") ;
                              $recuperer->execute(array());
                              while($row = $recuperer->fetch(PDO::FETCH_ASSOC)){
                                echo "{$row['nbre']}";
                              }
                              ?>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light bg-primary text-white">
                          <div class="card-body">
                            <p class="mb-4">Unité centrale à réparer</p>
                            <p class="fs-30 mb-2">
                            <?php
                              $recuperer = $bdd->prepare("SELECT Count(*) as nbre FROM machines WHERE type='Unite centrale' AND etat='en intervention'") ;
                              $recuperer->execute(array());
                              while($row = $recuperer->fetch(PDO::FETCH_ASSOC)){
                                echo "{$row['nbre']}";
                              }
                              ?>
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 stretch-card transparent">
                        <div class="card card-light-danger">
                          <div class="card-body">
                            <p class="mb-4">Ecran à reparer</p>
                            <p class="fs-30 mb-2">
                            <?php
                              $recuperer = $bdd->prepare("SELECT Count(*) as nbre FROM machines WHERE type='Ecran' AND etat='en intervention'") ;
                              $recuperer->execute(array());
                              while($row = $recuperer->fetch(PDO::FETCH_ASSOC)){
                                echo "{$row['nbre']}";
                              }
                              ?>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <p class="card-title">Réparation et rebus</p>
                        <p class="font-weight-500">Le dispositif en place offre la possibilité au département informatique de détecter les équipements requérant des interventions correctives suite à la signalisation d’un dysfonctionnement par l’utilisateur, tout en apportant un éclairage supplémentaire sur la spécificité de la problématique rencontrée.</p>
                        <p class="font-weight-500">Dans l’éventualité où un équipement se révèle irréparable, le département informatique procède à son enregistrement, garantissant ainsi une traçabilité optimale. Cette procédure s’accompagne de la transmission des informations pertinentes : motif de la mise au rebut, date de la dernière intervention de maintenance et identification du détenteur de la machine</p>
                        <div class="d-flex flex-wrap mb-5">
                          <div class="mr-2 mt-3">
                            <p class="text-muted">Machines complètes</p>
                            <h3 class="text-primary fs-30 font-weight-medium">
                              <?php
                              $recuperer = $bdd->prepare("SELECT Count(*) as nbre FROM machines") ;
                              $recuperer->execute(array());
                              while($row = $recuperer->fetch(PDO::FETCH_ASSOC)){
                                echo "{$row['nbre']}";
                              }
                              ?>
                            </h3>
                          </div>
                          <div class="mr-2 mt-3">
                            <p class="text-muted">Réparations</p>
                            <h3 class="text-primary fs-30 font-weight-medium">
                            <?php
                              $recuperer = $bdd->prepare("SELECT Count(*) as nbre FROM reparation") ;
                              $recuperer->execute(array());
                              while($row = $recuperer->fetch(PDO::FETCH_ASSOC)){
                                echo "{$row['nbre']}";
                              }
                              ?>
                            </h3>
                          </div>
                          <div class="mr-2 mt-3">
                            <p class="text-muted">Machines au rebut</p>
                            <h3 class="text-primary fs-30 font-weight-medium">
                            <?php
                              $recuperer = $bdd->prepare("SELECT Count(*) as nbre FROM rebut") ;
                              $recuperer->execute(array());
                              while($row = $recuperer->fetch(PDO::FETCH_ASSOC)){
                                echo "{$row['nbre']}";
                              }
                              ?>
                            </h3>
                          </div>
                          <div class="mt-3">
                            <p class="text-muted">Machines à redéployer</p>
                            <h3 class="text-primary fs-30 font-weight-medium">
                            <?php
                              $recuperer = $bdd->prepare("SELECT Count(*) as nbre FROM modifications") ;
                              $recuperer->execute(array());
                              while($row = $recuperer->fetch(PDO::FETCH_ASSOC)){
                                echo "{$row['nbre']}";
                              }
                              ?>
                            </h3>
                          </div>
                        </div>
                        <canvas id="order-chart"></canvas>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <p class="card-title">Statistique</p>
                          <a href="#" class="text-info">Vue d'ensemble</a>
                        </div>
                        <p class="font-weight-500">Le système fourni des statistique détaillées sur le matériel, y compris le nombre total de machine (par type). Le nombre de machine en service et hors services.</p>
                        <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                        <canvas id="sales-chart"></canvas>
                      </div>
                    </div>
                  </div>
                </div> 

              </main>
          </div>
      </div>
    </div>
              <!-- content-wrapper ends -->
              <!-- partial:partials/_footer.html -->
              <footer class="footer text-white" style="background-color: rgb(3, 185, 27);">
                <div class="container">
                  <div class="row justify-content-center text-center">
                    <div class="col-12 col-sm-6">
                      <span class="text-white">I.U.G la meilleure université <a href="#" style="color:orange;" target="_blank">privée</a> du cameroun</span>
                    </div>
                    <div class="col-12 col-sm-6">
                      <span>FOKOU JACQUES DUCLAIR <i class="ti-heart text-danger ml-1"></i></span>
                    </div>
                  </div>
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
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGgFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>