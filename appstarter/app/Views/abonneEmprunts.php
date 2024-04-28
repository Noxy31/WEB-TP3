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
            <h1>Mes emprunts</h1>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Livre</th>
                        <th>Date d'emprunt</th>
                        <th>Date de retour</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($emprunts as $emprunt) : ?>
                        <tr>
                            <td><?= $emprunt['titre_livre'] ?></td>
                            <td><?= $emprunt['date_emprunt'] ?></td>
                            <td><?= $emprunt['date_retour'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</div>