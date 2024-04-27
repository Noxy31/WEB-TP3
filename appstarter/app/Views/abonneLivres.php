<div id="topbar">
    <ul>
        <li class="btn"><a href="<?php echo base_url('liste_livres'); ?>">Liste des livres</a></li>
        <li><a href="<?php echo base_url(''); ?>">Historique des emprunts</a></li>
        <li><a href="<?php echo base_url(''); ?>">Mes informations</a></li>
    </ul>
</div>
<div id="content">
    <div class="container">
        <div class="h1Cont">
            <h1>Liste des livres</h1>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Thèmes</th>
                        <th>Mots Clé</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($livres as $livre) : ?>
                        <tr>
                            <td><?= $livre['titre_livre'] ?></td>
                            <td><?= $livre['nom_auteur'] ?></td>
                            <td><?= $livre['theme_livre'] ?></td>
                            <td>
                                <?php
                                $motsCleArray = explode(',', $livre['mots_cle']);  // Permet de séparer les mots clés
                                $lastKey = count($motsCleArray) - 1;
                                foreach ($motsCleArray as $key => $motCle) :
                                    echo $motCle;
                                    if ($key !== $lastKey) {
                                        echo ', ';
                                    }
                                endforeach;
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</div>