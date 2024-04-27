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
            <h1>Detail des exemplaires</h1>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Livre</th>
                    <th>NEUF (%)</th>
                    <th>TRES BON (%)</th>
                    <th>BON (%)</th>
                    <th>MOYEN (%)</th>
                    <th>DEGRADE (%)</th>
                </tr>
            </thead>
            <h2>Les livres qui possèdent plus de 50% d'exemplaires dont l'état est bon ou infèrieur sont affichés en rouge.</h2>
            <tbody>
                <?php foreach ($pourcentagesParEtat as $pourcentage) : ?>
                    <?php
                    $badState = ($pourcentage['pourcentage_bon'] + $pourcentage['pourcentage_moyen'] + $pourcentage['pourcentage_degrade']) > 50;
                    ?>
                    <tr <?= $badState ? 'class="bad-state"' : 'class="good-state"' ?>>
                        <td><?= $pourcentage['titre_livre'] ?></td>
                        <td><?= $pourcentage['pourcentage_neuf'] . '%' ?></td>
                        <td><?= $pourcentage['pourcentage_tres_bon'] . '%' ?></td>
                        <td><?= $pourcentage['pourcentage_bon'] . '%' ?></td>
                        <td><?= $pourcentage['pourcentage_moyen'] . '%' ?></td>
                        <td><?= $pourcentage['pourcentage_degrade'] . '%' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>
</div>