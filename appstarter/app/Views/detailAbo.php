<div id="topbar">
    <ul>
        <li class="btn"><a href="<?php echo base_url('/gestion_abonnes'); ?>">Gestion des abonnés</a></li>
        <li><a href="<?php echo base_url('/gestion_livres'); ?>">Gestion des livres</a></li>
        <li><a href="<?php echo base_url('/gestion_exemplaires'); ?>">Gestion des exemplaires</a></li>
        <li><a href="<?php echo base_url('/gestion_emprunts'); ?>">Gestion des emprunts</a></li>
        <li><a href="<?php echo base_url('/gestion_demandes'); ?>">Gestion des demandes</a></li>
    </ul>
</div>
<div id="content">
    <div class="container">
        <div class="h1Cont">
            <h1>Gestion des abonnés</h1>
        </div>
        <?php if (isset($message)) : ?>
            <div id="message"><?= $message ?></div>
        <?php endif; ?>
        <div>
            <form action="<?php echo base_url('/abonne/update/' . $abonne['matricule_abonne']); ?>" method="post">
                <label for="matricule_abonne">Matricule :</label>
                <input type="number" id="nom" name='matricule_abonne' value="<?php echo $abonne['matricule_abonne']; ?>"><br>

                <label for="nom">Nom :</label>
                <input type="text" id="nom" name='nom_abonne' value="<?php echo $abonne['nom_abonne']; ?>"><br>

                <label for="date_naissance">Date de naissance :</label>
                <input type="text" id="date_naissance" name='date_naissance_abonne' value="<?php echo $abonne['date_naissance_abonne']; ?>"><br>

                <label for="date_adhesion">Date d'adhésion :</label>
                <input type="text" id="date_adhesion" name='date_adhesion_abonne' value="<?php echo $abonne['date_adhesion_abonne']; ?>"><br>

                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name='adresse_abonne' ] value="<?php echo $abonne['adresse_abonne']; ?>"><br>

                <label for="telephone">Téléphone :</label>
                <input type="text" id="telephone" name='telephone_abonne' value="<?php echo $abonne['telephone_abonne']; ?>"><br>

                <label for="csp">CSP :</label>
                <input type="text" id="csp" name='CSP_abonne' value="<?php echo $abonne['CSP_abonne']; ?>"><br>

                <input class="bouton" type="submit" value="Modifier">
            </form>

            <form id="deleteForm" action="<?php echo base_url('/abonne/delete/' . $abonne['matricule_abonne']); ?>" method="post">
                <button class="bouton" id="deleteButton">Supprimer</button>
            </form>

            <div id="confirmationModal" style="display: none;">
                <p>Etes-vous sûr de vouloir supprimer cet abonné ?</p>
                <button class="bouton" id="confirmDelete">Oui</button>
                <button class="bouton" id="cancelDelete">Non</button>
            </div>
        </div>
    </div>
</div>