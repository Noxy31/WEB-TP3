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
            <h1>Liste des livres</h1>
            <form method="GET" action="<?php echo base_url('liste_livres'); ?>">
                <input type="text" name="search" placeholder="Rechercher un livre">
                <button type="submit">Rechercher</button>
            </form>
        </div>
        <div>
            <?php 
            $resultsFound = false;
            ?>
            <?php if ($livres && count($livres) > 0) : ?>
                <?php foreach ($livres as $livre) :
                    if (empty($_GET['search']) || strpos(strtolower($livre['titre_livre']), strtolower($_GET['search'])) !== false) :
                        $resultsFound = true;
                    endif;
                endforeach; ?>
                <?php if ($resultsFound) : ?>
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
                            <?php foreach ($livres as $livre) :
                                if (empty($_GET['search']) || strpos(strtolower($livre['titre_livre']), strtolower($_GET['search'])) !== false) :
                            ?>
                                <tr class="ligne-tableau" onclick="window.location='<?php echo base_url('/livres/detail/' . $livre['code_catalogue']); ?>'">
                                    <td><?= $livre['titre_livre'] ?></td>
                                    <td><?= $livre['nom_auteur'] ?></td>
                                    <td><?= $livre['theme_livre'] ?></td>
                                    <td>
                                        <?php
                                        $motsCleArray = explode(',', $livre['mots_cle']);
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
                            <?php endif; endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            <?php endif; ?>
            <?php if (!$resultsFound && !empty($_GET['search'])) : ?>
                <p>Aucun résultat ne correspond à cette recherche</p>
            <?php endif; ?>
        </div>
    </div>
</div>