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
            <h1>Gestion des livres</h1>
        </div>
        <div>
            <button class="bouton" id="btnAddLivre">Ajouter un livre</button>
            <script>
                document.getElementById('btnAddLivre').addEventListener('click', function() { // Fonction pour faire apparaitre le formulaire d'ajout
                    document.getElementById('formAddLivres').style.display = 'block';
                    this.style.display = 'none';
                });
            </script>
            <div id="formAddLivres" style="display: none;">
                <form action="<?= base_url('/livres/add') ?>" method="post">
                    <label for="titreLivres">Titre :</label>
                    <input type="text" id="titreLivre" name="titreLivre"><br>

                    <label for="auteur">Auteur :</label>
                    <input type="text" id="auteur" name="auteur"><br>

                    <label for="themeLivre">Thèmes :</label>
                    <input type="text" id="themeLivre" name="themeLivre"><br>

                    <label for="motcle">Mots-Clé :</label>
                    <input type="text" id="motcle" name="motcle"><br>

                    <input class="bouton" type="submit" value="Valider">
                </form>
            </div>
        </div>
        <form class="search" method="GET" action="<?php echo base_url('/gestion_livres'); ?>">
                <input type="text" name="search" placeholder="Rechercher un livre">
                <button class="bouton-search" type="submit">Rechercher</button>
            </form>
        <?php $resultsFound = false; ?>
        <div>
            <?php foreach ($livres as $livre) : ?>
                <?php if (empty($_GET['search']) || strpos(strtolower($livre['titre_livre']), strtolower($_GET['search'])) !== false) : ?>
                    <?php $resultsFound = true; ?>
                    <?php break; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php if (!$resultsFound && !empty($_GET['search'])) : ?>
                <p>Aucun résultat ne correspond à cette recherche</p>
            <?php else : ?>
                <table>
                    <thead>
                        <tr>
                            <th>Code Catalogue</th>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Thèmes</th>
                            <th>Mots Clé</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($livres as $livre) : ?>
                            <?php if (empty($_GET['search']) || strpos(strtolower($livre['titre_livre']), strtolower($_GET['search'])) !== false) : ?>
                                <tr>
                                    <td><?= $livre['code_catalogue'] ?></td>
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
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>