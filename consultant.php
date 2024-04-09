<?php
    // Définir le fuseau horaire par défaut à utiliser. Disponible depuis PHP 5.1
    date_default_timezone_set('UTC');

    // Affiche quelque chose comme : Monday 8th of August 2005 03:12:46 PM
    echo date('l jS \of F Y');
?>