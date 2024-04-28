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
            <h1>Gestion des demandes</h1>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Matricule</th>
                        <th>Code Catalogue</th>
                        <th>Date de la demande</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($demandes as $demande) : ?>
                        <tr>
                            <td><?php echo $demande['matricule_abonne']; ?></td>
                            <td><?php echo $demande['code_catalogue']; ?></td>
                            <td><?php echo $demande['date_demande']; ?></td>
                            <td>
                                <form action="<?= base_url('/demandes/delete/' . $demande['code_catalogue']) ?>" method="post">
                                    <input type="submit" value="Supprimer la demande">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</div>