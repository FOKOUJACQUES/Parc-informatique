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
                                    <div class="col-md-12 grid-margin">
                                        <div class="row">
                                            <div class="container">
                                                <a href="recupmachine.php">Consulter la liste des machines</a>
                                                <h1 class="my-4">Formulaire d'enregistrement d'information sur l'équipement</h1>
                                                <form action="traitement.php" method="post">
                                                    <?php 
                                                        if(isset($_SESSION['success'])){ 
                                                            echo "<p style='text-align:center; color:green;'>".$_SESSION['success']."</p>"; 
                                                            unset($_SESSION['success']); 
                                                        }
                                                        if(isset($_SESSION['error'])){
                                                            echo "<p style='text-align:center; color:red;'>".$_SESSION['error']."</p>"; 
                                                            unset($_SESSION['error']);
                                                        }
                                                    ?>
                                                    <div class="mb-3">
                                                        <label for="ecole" class="form-label">Ecole:</label>
                                                        <select class="form-select" id="ecole" name="ecole" required>
                                                            <option value="" disabled selected>Sélectionner votre école</option>
                                                        <?php
                                                            // Récupération des établissements
                                                            $result = $bdd->query('SELECT id_etabli, nom FROM etablissement');

                                                            // Génération des options
                                                            while ($row = $result->fetch()) {
                                                                echo '<option value="' . $row['id_etabli'] . '">' . $row['nom'] . '</option>';
                                                            }
                                                        ?>
                                                        </select>
                                                        </div>
                                                        <div class="mb-3">
                                                        <label for="service" class="form-label">Service:</label>
                                                        <select class="form-select" id="service" name="service" required>
                                                        <?php
                                                            if(isset($_POST["ecole"])) {
                                                                $stmt = $bdd->prepare('SELECT id_etabli FROM etablissement WHERE nom = ?');
                                                                $stmt->execute([$_POST["ecole"]]);
                                                                $id_etabli = $stmt->fetchColumn();

                                                                $stmt = $bdd->prepare('SELECT id_service, nom FROM services WHERE id_etabli = ?');
                                                                $stmt->execute([$id_etabli]);
                                                                while ($row = $stmt->fetch()) {
                                                                    echo '<option value="' . $row['nom'] . '">' . $row['nom'] . '</option>';
                                                                }
                                                            }
                                                        ?>
                                                        </select>
                                                        </div>

                                                    <div class="mb-3">
                                                        <label for="type_code" class="form-label">Type de Code:</label>
                                                        <select class="form-select" id="type_code" name="type_code" required onchange="generateCode(this.value)">
                                                            <option value="" disabled selected>Sélectionnez un type code</option>
                                                            <option value="code_interne">Code Interne</option>
                                                            <option value="numero_serie">Numéro de Série</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3" id="code_interne_div" style="display: none;">
                                                        <label for="code_interne" class="form-label">Code Interne:</label>
                                                        <input type="text" class="form-control" id="code_interne" name="code_interne" readonly>
                                                    </div>
                                                    <div class="mb-3" id="numero_serie_div" style="display: none;">
                                                        <label for="numero_serie" class="form-label">Numéro de Série:</label>
                                                        <input type="text" class="form-control" id="numero_serie" name="numero_serie">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="date_achat" class="form-label">Date Achat:</label>
                                                        <input type="date" class="form-control" id="date_achat" name="date_achat" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="date_acquisition" class="form-label">Date Acquisition:</label>
                                                        <input type="date" class="form-control" id="date_acquisition" name="date_acquisition">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="marque" class="form-label">Marque:</label>
                                                        <select class="form-select" id="marque" name="marque" required> 
                                                            <option value="" disabled selected>Sélectionnez une marque</option>
                                                            <option value="dell">Dell</option>
                                                            <option value="hp">HP</option> 
                                                            <option value="thinkpad">Thinkpad</option>
                                                            <option value="apple">Apple</option>
                                                            <option value="lenovo">Lenovo</option> 
                                                            <option value="asus">Asus</option> 
                                                            <option value="acer">Acer</option> 
                                                            <option value="msi">MSI</option> 
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="etat" class="form-label">Etat:</label>
                                                        <select class="form-select" id="etat" name="etat" required>
                                                            <option value="en service">En service</option>
                                                            <option value="en intervention">En intervention</option>
                                                            <option value="hors service">Hors service</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="cout" class="form-label">Coût:</label>
                                                        <input type="text" class="form-control" id="cout" name="cout">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="type" class="form-label">Type de Machine:</label>
                                                        <select class="form-select" id="type" name="type" required onchange="showFields(this.value)"> 
                                                            <option value="" disabled selected>Sélectionnez un type d'appareil</option>
                                                            <option value="Unite centrale">Unité centrale</option>
                                                            <option value="Ecran">Écran</option> 
                                                            <option value="Switch">Switch</option> 
                                                            <option value="Routeur">Routeur</option> 
                                                            <option value="Serveur">Serveur</option> 
                                                            <option value="Ordinateur portable">Ordinateur portable</option> 
                                                            <option value="Tablette">Tablette</option>
                                                            <option value="Smartphone">Smartphone</option> 
                                                            <option value="Imprimante">Imprimante</option>
                                                            <option value="Scanner">Scanner</option>
                                                        </select> 
                                                    </div> 
                                                    <div class="mb-3" id="modele_div" style="display: none;">
                                                        <label for="modele" class="form-label">Modèle :</label>
                                                        <select class="form-select" id="modele" name="modele">
                                                            <option value="desktop">Desktop</option>
                                                            <option value="laptop">Laptop</option>
                                                            <option value="tablet">Tablet</option> 
                                                            <option value="smartphone">Smartphone</option> 
                                                            <option value="server">Server</option>
                                                            <option value="mainframe">macroordinateur</option>
                                                            <option value="supercomputer">Superordinateur</option> 
                                                        </select> 
                                                    </div> 
                                                    <div class="mb-3" id="disque_dur_div" style="display: none;">
                                                        <label for="disque_dur" class="form-label">Disque Dur:</label>
                                                        <input type="text" class="form-control" id="disque_dur" name="disque_dur"> 
                                                    </div>
                                                    <div class="mb-3" id="ram_div" style="display: none;">
                                                        <label for="ram" class="form-label">RAM:</label>
                                                        <input type="text" class="form-control" id="ram" name="ram">
                                                    </div>
                                                    <div class="mb-3" id="processeur_div" style="display: none;">
                                                        <label for="processeur" class="form-label">Processeur:</label>
                                                        <input type="text" class="form-control" id="processeur" name="processeur">
                                                    </div>
                                                    <div class="mb-3" id="taille_ecran_div" style="display: none;"> 
                                                        <label for="taille_ecran" class="form-label">Taille Ecran:</label>
                                                        <select class="form-select" id="taille_ecran" name="taille_ecran">
                                                        <option value="" disabled selected>Sélectionnez la taille</option>
                                                            <option value="13">13"</option> 
                                                            <option value="15">15"</option>
                                                            <option value="17">17"</option>
                                                            <option value="19">19"</option> 
                                                            <option value="21">21"</option>
                                                            <option value="24">24"</option>
                                                            <option value="27">27"</option>
                                                            <option value="32">32"</option>
                                                        </select>
                                                    </div> 
                                                    <input type="submit" name="envoi" class="btn btn-primary" value="Enregistrer">
                                                </form>
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
    <script>
        function generateCode(typeCode) {
            if (typeCode == 'code_interne') {
                var ecole = document.getElementById('ecole').options[document.getElementById('ecole').selectedIndex].text;
                var service = document.getElementById('service').options[document.getElementById('service').selectedIndex].text;
                var codeInterne = ecole + Date.now() + service;
                document.getElementById('code_interne').value = codeInterne;
                document.getElementById('code_interne_div').style.display = 'block';
                document.getElementById('numero_serie_div').style.display = 'none';
            } else {
                document.getElementById('code_interne_div').style.display = 'none';
                document.getElementById('numero_serie_div').style.display = 'block';
            }
        }

        function showFields(typeMachine) {
            if (typeMachine == 'Unite centrale') {
                document.getElementById('modele_div').style.display = 'block';
                document.getElementById('disque_dur_div').style.display = 'block';
                document.getElementById('ram_div').style.display = 'block';
                document.getElementById('processeur_div').style.display = 'block';
                document.getElementById('taille_ecran_div').style.display = 'none';
            } else if (typeMachine == 'Ecran') {
                document.getElementById('modele_div').style.display = 'none';
                document.getElementById('disque_dur_div').style.display = 'none';
                document.getElementById('ram_div').style.display = 'none';
                document.getElementById('processeur_div').style.display = 'none';
                document.getElementById('taille_ecran_div').style.display = 'block';
            } else {
                document.getElementById('modele_div').style.display = '            none';
                document.getElementById('disque_dur_div').style.display = 'none';
                document.getElementById('ram_div').style.display = 'none';
                document.getElementById('processeur_div').style.display = 'none';
                document.getElementById('taille_ecran_div').style.display = 'none';
            }
        }
    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#ecole').change(function(){
        var id_etabli = $(this).val();
        $.ajax({
            url: 'ajax.php',
            method: 'post',
            data: {id_etabli:id_etabli},
            dataType: 'json', 
            success: function(response){
                var len = response.length;
                $('#service').empty();
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    $('#service').append("<option value='"+id+"'>"+name+"</option>");
                }
            }
        });
    });
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>