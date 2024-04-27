<div id="topbar">
    <ul>
        <li class="btn"><a href="<?php echo base_url('liste_livres'); ?>">Liste des livres</a></li>
        <li><a href="<?php echo base_url(''); ?>">Mes emprunts</a></li>
        <li><a href="<?php echo base_url(''); ?>">Mes demandes</a></li>
        <li><a href="<?php echo base_url(''); ?>">Mes informations</a></li>
    </ul>
</div>
<div id="content">
    <div class="container">
        <div class="h1Cont">
            <h1>Liste des livres</h1>
            <!-- Ajout du formulaire de recherche -->
            <form method="GET" action="<?php echo base_url('liste_livres'); ?>">
                <input type="text" name="search" placeholder="Rechercher un livre">
                <button type="submit">Rechercher</button>
            </form>
        </div>
        <div>
            <?php 
            // Initialisation de la variable $resultsFound
            $resultsFound = false;
            ?>
            <!-- Vérifier s'il y a des résultats -->
            <?php if ($livres && count($livres) > 0) : ?>
                <?php foreach ($livres as $livre) :
                    // Vérifie si la recherche correspond au titre du livre
                    if (empty($_GET['search']) || strpos(strtolower($livre['titre_livre']), strtolower($_GET['search'])) !== false) :
                        $resultsFound = true;
                    endif;
                endforeach; ?>
                
                <!-- Afficher le tableau uniquement s'il y a des résultats -->
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
                                // Vérifie si la recherche correspond au titre du livre
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
            
            <!-- Si aucun résultat n'a été trouvé, afficher un message -->
            <?php if (!$resultsFound && !empty($_GET['search'])) : ?>
                <p>Aucun résultat ne correspond à cette recherche</p>
            <?php endif; ?>
        </div>
    </div>
</div>