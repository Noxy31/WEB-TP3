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
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Matricule</th>
                        <th>Nom</th>
                        <th>Date de naissance</th>
                        <th>Date d'adhésion</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>CSP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($abonnes as $abonne) : ?>
                        <tr>
                            <td><a href="<?php echo base_url('/abonne/detail/'.$abonne['matricule_abonne']); ?>"><?php echo $abonne['matricule_abonne']; ?></a></td>
                            <td><?php echo $abonne['nom_abonne']; ?></td>
                            <td><?php echo $abonne['date_naissance_abonne']; ?></td>
                            <td><?php echo $abonne['date_adhesion_abonne']; ?></td>
                            <td><?php echo $abonne['adresse_abonne']; ?></td>
                            <td><?php echo $abonne['telephone_abonne']; ?></td>
                            <td><?php echo $abonne['CSP_abonne']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>