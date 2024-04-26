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
        <div>
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
                        <tr>
                            <td><?= $livre['code_catalogue'] ?></td>
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