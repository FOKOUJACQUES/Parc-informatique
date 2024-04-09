<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ESG</title>
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
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0" style="float: right;">
                <div class="d-inline-flex align-items-center" style="height: 45px; width: 100%;">
                    <small class="me-3 text-light bg-drapeau" id="drapeau">
                        <h6 style="color: #888B8D; font-size: 16px; color: white;"><i class="flag-icon flag-icon-fr"></i> Langue (FR)</h6>
                    </small>
                    <small class="me-3 text-light">
                        <h6 style="color: #888B8D; font-size: 16px; color: white;">Pré-inscription</h6>
                    </small>
                    <small class="me-3 text-light">
                        <h6 style="color: #888B8D; font-size: 16px; color: white;">Demande d'archive</h6>
                    </small>
                    <small class="text-light">
                        <h6 style="color: #888B8D; font-size: 16px; color: white;">Espace Etudiant</h6>
                    </small>
                    <h6 style="color: white;"><a class="btn btn-sm " href="login.php" style="text-decoration: none; color: white; font-size: 16px;"> Se connecter</a></h6>
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
                    <a href="index.php" class="nav-item nav-link active" style="border-radius: 3px; color: white; background-color: rgb(3, 185, 27);">ACCUEIL</a>
                    <a href="#Etablissement" id="link" class="nav-item nav-link">ETABLISSEMENT</a>
                    <a href="#MOTS DU PRESIDENT" id="link" class="nav-item nav-link">MOTS DU PRESIDENT</a>
                    <a href="#A PROPOS" id="link" class="nav-item nav-link">A PROPOS</a>
                    <a href="#VIE ETUDIANTE" id="link" class="nav-item nav-link">VIE ETUDIANTE</a>
                    <a href="#ENTREPRISE" id="link" class="nav-item nav-link">ENTREPRISE</a>
                    <a href="#REFERENCE" id="link" class="nav-item nav-link">REFERENCE</a>
                    <a href="#PATENAIRES" id="link" class="nav-item nav-link">PATENAIRES</a>
                    <a href="login.php" id="link" class="nav-item nav-link">SE CONNECTER</a>
                </div>
            </div>

        </div>
    </nav>
    <!-- navbar End -->

</body>

</html>