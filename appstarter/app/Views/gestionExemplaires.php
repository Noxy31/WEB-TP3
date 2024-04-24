<div id="topbar">
    <ul>
        <li class="btn"><a href="<?php echo base_url('/gestion_abonnes'); ?>">Gestion des abonnés</a></li>
        <li><a href="<?php echo base_url('/gestion_livres'); ?>">Gestion des livres</a></li>
        <li><a href="<?php echo base_url('/gestion_exemplaires'); ?>">Gestion des exemplaires</a></li>
        <li><a href="<?php echo base_url('/gestion_emprunts'); ?>">Gestion des emprunts</a></li>
        <li><a href="#">Gestion des demandes</a></li>
    </ul>
</div>
<div id="content">
    <div class="container">
        <div class="h1Cont">
            <h1>Gestion des exemplaires</h1>
        </div>
        <div>
            <button class="bouton" id="btnAddExemplaire">Ajouter un exemplaire</button>
            <script>
                document.getElementById('btnAddExemplaire').addEventListener('click', function() { // Fonction pour faire apparaitre le formulaire d'ajout
                    document.getElementById('formAddExemplaire').style.display = 'block';
                    this.style.display = 'none';
                });
            </script>
            <div id="formAddExemplaire" style="display: none;">
                <form action="<?= base_url('/exemplaires/add') ?>" method="post">
                    <label for="titre_livre">Livre :</label>
                    <input type="text" id="titre_livre" name="titre_livre"><br>
                    <script>
                        setupAutocomplete('titre_livre', '<?= base_url('exemplaires/suggestions') ?>', 'titre_livre');
                    </script>

                    <label for="nomEditeur">Nom de l'Éditeur :</label>
                    <input type="text" id="nomEditeur" name="nomEditeur"><br>

                    <label for="codeUsure">Code d'Usure :</label>
                    <select id="codeUsure" name="codeUsure">
                        <option value="NEUF">NEUF</option>
                        <option value="TRES BON">TRES BON</option>
                        <option value="BON">BON</option>
                        <option value="MOYEN">MOYEN</option>
                        <option value="DEGRADE">DEGRADE</option>
                    </select><br>

                    <label for="dateAcquisition">Date d'Acquisition :</label>
                    <input type="date" id="dateAcquisition" name="dateAcquisition"><br>

                    <label for="emplacementRayon">Emplacement Rayon :</label>
                    <input type="text" id="emplacementRayon" name="emplacementRayon"><br>

                    <input class="bouton" type="submit" value="Valider">
                </form>
            </div>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Cote Exemplaire</th>
                        <th>Titre</th>
                        <th>Éditeur</th>
                        <th>Code Usure</th>
                        <th>Date Acquisition</th>
                        <th>Emplacement Rayon</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($exemplaires as $exemplaire) : ?>
                        <tr>
                            <td><?= $exemplaire['cote_exemplaire'] ?></td>
                            <td><?= $exemplaire['titre_livre'] ?></td>
                            <td><?= $exemplaire['nom_editeur'] ?></td>
                            <td><?= $exemplaire['code_usure'] ?></td>
                            <td><?= $exemplaire['date_acquisition'] ?></td>
                            <td><?= $exemplaire['emplacement_rayon'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</div>