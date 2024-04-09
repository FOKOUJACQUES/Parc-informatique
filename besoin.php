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
                    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-2">
                        <div class="main-panel">
                            <div class="content-wrapper">
                                <div class="row">
                                    <div class="col-md-8 grid-margin">
                                        <div class="row">
                                        <a href="etatmachine.php">Consulter l'état des équipements</a><br>
                                            <style>
                                                .table th {
                                                    font-size: 30px;
                                                    font-weight: bold;
                                                }
                                            </style>
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-8">
                                                        <div class="card">
                                                            <div class="card-body" id="chatContainer" style="height: 400px; overflow-y: scroll;">
                                                                <!-- Les messages seront affichés ici -->
                                                                <?php
                                                                    class Reparation {
                                                                        private $pdo;

                                                                        public function __construct($pdo){
                                                                            $this->pdo = $pdo;
                                                                        }

                                                                        public function recupererMessages(){
                                                                            // Récupération de l'id_clt de l'utilisateur connecté
                                                                            $id_clt = $_SESSION['user']['id_clt'];

                                                                            // Préparation de la requête SQL
                                                                            $query = $this->pdo->prepare("SELECT nature_du_probleme FROM reparation WHERE id_clt = ? ORDER BY date_de_signalement DESC");

                                                                            // Exécution de la requête SQL
                                                                            $query->execute([$id_clt]);

                                                                            // Récupération des résultats
                                                                            $result = $query->fetchAll(PDO::FETCH_ASSOC);

                                                                            return $result;
                                                                        }
                                                                    }

                                                                    $reparation = new Reparation($bdd);
                                                                    $messages = $reparation->recupererMessages();

                                                                    // Affichage des messages
                                                                    foreach ($messages as $message) {                                  
                                                                        echo 'Nature du problème: ' . $message['nature_du_probleme'] . '<br>';
                                                                        echo '<hr>';
                                                                    }
                                                                ?>


                                                            </div>
                                                        </div>
                                                        <form id="messageForm" class="mt-3">
                                                            <div class="input-group">
                                                                <input type="text" id="messageInput" class="form-control" name="message" placeholder="Type a message" required>
                                                                <div class="input-group-append">
                                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right" style="color: white;"></i></button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
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
                        <span class="text-white">I.U.G la meilleur université <a href="#" style="color:orange;" target="_blank">privée</a> du cameroun</span>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        document.getElementById('messageForm').addEventListener('submit', function(e) {
            e.preventDefault();
            var message = document.getElementById('messageInput').value;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'sendMessage.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (this.status == 200) {
                    var chatContainer = document.getElementById('chatContainer');
                    var messageElement = document.createElement('div');
                    messageElement.classList.add('alert', 'alert-primary', 'text-right');
                    messageElement.textContent = message;
                    chatContainer.appendChild(messageElement);
                    chatContainer.scrollTop = chatContainer.scrollHeight;
                    document.getElementById('messageInput').value = '';
                }
            };
            xhr.send('message=' + message);
        });
    </script>
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

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>