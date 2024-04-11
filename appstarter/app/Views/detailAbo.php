<div id="topbar">
    <ul>
        <li class="btn"><a href="<?php echo base_url('/gestion_abonnés'); ?>">Gestion des abonnés</a></li>
        <li><a href="#">Gestion des livres</a></li>
        <li><a href="#">Gestion des exemplaires</a></li>
        <li><a href="#">Gestion des emprunts</a></li>
        <li><a href="#">Gestion des retours</a></li>
        <li><a href="#">Gestion des demandes</a></li>
    </ul>
</div>
<div id="content">
    <div class="container">
        <div class="h1Cont">
            <h1>Gestion des abonnés</h1>
        </div>
        <?php if (isset($message)): ?>
            <div id="message"><?= $message ?></div>
        <?php endif; ?>
        <div>
            <form action="<?php echo base_url('/abonne/update/'.$abonne['matricule_abonne']); ?>" method="post">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" value="<?php echo $abonne['nom_abonne']; ?>"><br>

                <label for="date_naissance">Date de naissance :</label>
                <input type="text" id="date_naissance" name="date_naissance" value="<?php echo $abonne['date_naissance_abonne']; ?>"><br>

                <label for="date_adhesion">Date d'adhésion :</label>
                <input type="text" id="date_adhesion" name="date_adhesion" value="<?php echo $abonne['date_adhesion_abonne']; ?>"><br>

                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name="adresse" value="<?php echo $abonne['adresse_abonne']; ?>"><br>

                <label for="telephone">Téléphone :</label>
                <input type="text" id="telephone" name="telephone" value="<?php echo $abonne['telephone_abonne']; ?>"><br>

                <label for="csp">CSP :</label>
                <input type="text" id="csp" name="csp" value="<?php echo $abonne['CSP_abonne']; ?>"><br>

                <input class="bouton" type="submit" value="Modifier">
            </form>
        </div>
    </div>
</div>