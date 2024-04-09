<!DOCTYPE html>
<html>

<body>

    <form method="post" action="">
        <div class="row">
            <div class="col-md-12 form-group py-4">
                <input id="input" type="tel" class="form-control" name="Tel" id="Tel" placeholder="Télephone" style="border: 2px solid #c5c4c4">
            </div>
        </div>
        <input type="submit" name="envoi">
    </form>

</body>

</html>

<?php
if (isset($_POST['envoi'])) {
    // collect value of input field
    $telephone = htmlspecialchars(filter_var($_POST['Tel'], FILTER_VALIDATE_EMAIL));
    if (empty($phone)) {
        echo "Numéro de téléphone est vide";
    } else {
        echo "Votre numéro de téléphone est : " . $phone;
    }
}
?>