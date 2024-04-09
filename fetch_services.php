<?php 
require_once "connection.php";
$bdd = $database->getConnection();
?>
<div class="mb-3">
<label for="ecole" class="form-label">Ecole:</label>
<select class="form-select" id="ecole" name="ecole" required>
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
            echo '<option value="' . $row['id_service'] . '">' . $row['nom'] . '</option>';
        }
    }
?>
</select>
</div>

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
