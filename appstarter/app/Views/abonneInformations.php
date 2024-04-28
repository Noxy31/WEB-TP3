<div id="topbar">
    <ul>
        <li class="btn"><a href="<?php echo base_url('liste_livres'); ?>">Liste des livres</a></li>
        <li><a href="<?php echo base_url('mes_emprunts'); ?>">Mes emprunts</a></li>
        <li><a href="<?php echo base_url('mes_demandes'); ?>">Mes demandes</a></li>
        <li><a href="<?php echo base_url('mes_informations'); ?>">Mes informations</a></li>
    </ul>
</div>
<div id="content">
    <div class="container">
        <div class="h1Cont">
            <h1>Mes informations</h1>
        </div>
        <div>
            <form action="<?php echo base_url('/informations/update'); ?>" method="post">
                <label for="nom">Nom* :</label>
                <input type="text" id="nom" name='nom_abonne' value="<?php echo isset($abonne['nom_abonne']) ? $abonne['nom_abonne'] : ''; ?>"><br>

                <label for="date_naissance">Date de naissance* :</label>
                <input type="text" id="date_naissance" name='date_naissance_abonne' value="<?php echo isset($abonne['date_naissance_abonne']) ? $abonne['date_naissance_abonne'] : ''; ?>"><br>

                <label for="date_adhesion">Date d'adhésion* :</label>
                <input type="text" id="date_adhesion" name='date_adhesion_abonne' value="<?php echo isset($abonne['date_adhesion_abonne']) ? $abonne['date_adhesion_abonne'] : ''; ?>"><br>

                <label for="adresse">Adresse* :</label>
                <input type="text" id="adresse" name='adresse_abonne' value="<?php echo isset($abonne['adresse_abonne']) ? $abonne['adresse_abonne'] : ''; ?>"><br>

                <label for="telephone">Téléphone* :</label>
                <input type="text" id="telephone" name='telephone_abonne' value="<?php echo isset($abonne['telephone_abonne']) ? $abonne['telephone_abonne'] : ''; ?>"><br>

                <label for="csp">CSP* :</label>
                <input type="text" id="csp" name='CSP_abonne' value="<?php echo isset($abonne['CSP_abonne']) ? $abonne['CSP_abonne'] : ''; ?>"><br>

                <input class="bouton" type="submit" value="Modifier">
                <p> * : Données requises </p>
            </form>
        </div>

    </div>

</div>