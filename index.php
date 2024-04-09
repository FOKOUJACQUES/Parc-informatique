<?php 
    session_start();
    //$_SESSION = array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>IUG-PInformatique</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/IUG.PNG" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<style>
    
    #test1 {
        font-size: 18px;
        color: #bdb5b5;
    }
    #test {
        font-size: 18px;
        color: #6a6d6e;
        font-size: 16px;
    }

    #test:hover {
        color: rgb(18, 173, 18);
       
    }



    @keyframes slideDown {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(20px);
        }
    }

    .btn {
        animation: slideDown 2s ease-out;
    }

    .btn:hover {
        transform: scale(1.1);
        transition: transform 0.3s ease-in-out;
    }

    #link:hover {
        color: rgb(3, 185, 27);

    }
</style>
   

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid px-5 d-none d-lg-block" style="background-color: rgb(3, 185, 27);">
        <div class="row gx-0">
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px; float: left;">
                    <a class="btn btn-sm" href="" style="color: white;"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm" href="" style="color: white;"><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm " href="" style="color: white;"><i class="fab fa-twitter fw-normal"></i></a>
                </div>
            </div>
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style=" float: right; height: 45px; ">
                    <small class="me-3 text-light bg-drapeau" id="drapeau">
                        <h6 style="color: #888B8D; font-size: 16px; color: white;"><i class=></i></h6>
                    </small>
                    <h6 style="color: white;"><a class="btn btn-sm " href="index.php" style="text-decoration: none; color: white; font-size: 16px;"></a></h6>
                </div>
            </div>

        </div>

    </div>
    </div>
    <!-- Topbar End -->

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.php" class="navbar-brand p-0" style="width: 15%; float: left;">
            <img class="w-50 p- m-5" src="img/IUG.PNG">
        </a>
        <div>
            <div class="collapse navbar-collapse f-l m-3" id="navbarCollapse" style=" float:left;">
                <div class="navbar-nav ms-auto py-3 w-100">
                    <a href="index.php" class="nav-item nav-link active" style="border-radius: 3px; color: white; background-color: rgb(3, 185, 27);">SE CONNECTER</a>
                    <a href="index.php" id="link" class="nav-item nav-link"></a>
                </div>
            </div>

        </div>
    </nav>
    <!-- navbar End -->
    
    <!-- contact -->
    <div class="content" style="">
        <div class="py-3" style="display: flex; justify-content: center; align-items: center;">
            <div style="text-align: center;">
                <p style="font-weight: bolder; color: #5c5f61; font-size: 30px;color:black">GESTION DU MATERIEL INFORMATIQUE</p>
            </div>
        </div>

        <div class="container d-flex align-items-center justify-content-center">
            <div class="row">
           

                <div class="col-12 mx-auto">
                    
                    <form action="Authentification.php" method="POST">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">Connectez-vous avec</p>

                            <div class="social-line">
                                <a href="#social" class="btn btn-floating mx-1" style="background-color: #5a220b; color:white;">
                                    <i class="fab fa-google"></i>
                                </a>
                            </div>

                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-twitter"></i>
                            </button>

                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-linkedin-in"></i>
                            </button>
                        </div>

                        <div class="divider d-flex align-items-center justify-content-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Ou</p>
                            <p class="text-center fw-bold mx-3 mb-0"></p>
                        </div>
                        <?php 
                        if (isset($_SESSION['error'])) : ?>

                        <div class="alert alert-danger">
                        
                         <?php
                            if(!isset($_SESSION['error'])) {
                                session_destroy();
                            } else {
                                // Si la session 'error' existe, l'afficher et la supprimer
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                        ?>
                        </div><?php endif; ?>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="Nom" id="form3Example3" class="form-control form-control-lg" placeholder="Entrez votre nom" />
                            <label class="form-label" for="form3Example3">Nom</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="pwd" id="form3Example4" class="form-control form-control-lg" placeholder="Entrez votre mot de passe" />
                            <label class="form-label" for="form3Example4">Mot de passe</label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                Souvenez-vous de moi
                                </label>
                            </div>
                            <a href="#!" >Mot de passe oublié?</a>     
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <input type="submit" name="envoi" value="Se connecter" class="btn text-white btn-neutral btn-lg me-3 m-4 animated slideInbottom" style="background-color: orange; border-radius: 30px, 30px, 30px, 0; padding-left: 2.5rem; padding-right: 2.5rem;"></input>
                            
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- contact-->

       <!-- dernier element body -->
  <div style="border-bottom: 4px solid rgb(18, 173, 18); width: 100%;"></div><br><br>

<!-- Footer Start -->
<footer class="h-100" style="background-color: white;">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-4"></div>
        </div>
    </div>
</footer>

<div class="container-fluid text-white" style="background-color: rgb(24, 22, 22);">
    <div class="container text-left">
        <div class="row justify-content-end">
            <div style="width: 80%; float: left;">
                <div class="d-flex align-items-left justify-content-left" style="height: 75px;">
                    <h6 class="m-4" style="color: #6a6d6e;">TUEYUM DEFO MERVEILLE LETICIA © Tel: 657.09.12.42 | Email: leticiadefo@gmail.com |</h6>
                    <a class="m-4" href="#"> Developpeuse web</a>
                </div>
            </div>
            <div class="d-inline-flex align-items-center" style="width: 20%; float: right;">
                <a class="btn btn-sm" href="" style="color: #6a6d6e;"><i class="fab fa-facebook-f fw-normal"></i></a>
                <a class="btn btn-sm" href="" style="color: #6a6d6e;"><i class="fab fa-linkedin-in fw-normal"></i></a>
                <a class="btn btn-sm " href="" style="color: #6a6d6e;"><i class="fab fa-twitter fw-normal"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-lg-square rounded back-to-top" style="background-color: #383838 "><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>