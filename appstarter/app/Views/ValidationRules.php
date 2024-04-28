<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bibliotheca Liber Primus</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/gestion.css'); ?>" />
    <script src="<?php echo base_url('assets/JS/DeletingScript.js'); ?>"></script>
    <script src="<?php echo base_url('assets/JS/autocomplete.js'); ?>"></script>
</head>

<body>
    <div id="userMessage">
        <?php if (isset($loggedIn) && $loggedIn == true) : ?>
            <span>Bonjour <?= esc($name) ?> !</span>
        <?php endif ?>
    </div>
    <div class="container-notification">
        <h1> Erreur : Aucun champ ne peut être vide !<br> Vous allez être redirigé vers la page précédente </h1>
    </div>
    <script>
        setTimeout(function() {
            window.history.back();
        }, 3000);
    </script>
<footer>
</footer>
</body>

</html>