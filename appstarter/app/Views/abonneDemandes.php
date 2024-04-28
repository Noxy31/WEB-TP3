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
            <h1>Mes demandes d'emprunt</h1>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Livre</th>
                        <th>Date de Demande</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($demandes as $demande) : ?>
                        <tr>
                            <td><?= $demande['titre_livre'] ?></td>
                            <td><?= $demande['date_demande'] ?></td>
                            <td><form action="<?= base_url('/demandes/delete/' . $demande['code_catalogue']) ?>" method="post">
                                    <input type="submit" value="Supprimer la demande">
                                </form></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</div>