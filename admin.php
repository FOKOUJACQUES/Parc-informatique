<?php
require_once "connect.php";
    // Mot de passe en clair     UPDATE utilisateurs SET nom = 'DEFO' WHERE id_clt=6;
    $password = "Tueyum2@";

    // Hachage du mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Affichage du mot de passe haché
    echo $hashed_password;

    
?>
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
            <option value="ESG">ESG</option>
            <option value="ISA">ISA</option>
            <option value="ISTA">ISTA</option>
            <option value="campus numerique">Campus Numérique</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="service" class="form-label">Service:</label>
        <select class="form-select" id="service" name="service" required>
            <!-- Les options doivent être générées dynamiquement à partir de la base de données -->
            <?php
              

                // Récupération des services
                $result = $bdd->query('SELECT nom FROM services');

                // Génération des options
                while ($row = $result->fetch()) {
                    echo '<option value="' . $row['nom'] . '">' . $row['nom'] . '</option>';
                }
            ?>

        </select>
    </div>
    <div class="mb-3">
        <label for="type_code" class="form-label">Type de Code:</label>
        <select class="form-select" id="type_code" name="type_code" required onchange="generateCode(this.value)">
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

<script>
    function generateCode(typeCode) {
        if (typeCode == 'code_interne') {
            var ecole = document.getElementById('ecole').value;
            var service = document.getElementById('service').value;
            var codeInterne = ecole + '_' + Date.now() + '_' + service;
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
