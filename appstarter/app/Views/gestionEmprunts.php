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
            <h1>Gestion des emprunts</h1>
        </div>
        <div>
            <button class="bouton" id="btnAddEmprunt">Ajouter un emprunt</button>
            <script>
                document.getElementById('btnAddEmprunt').addEventListener('click', function() { // Fonction pour faire apparaitre le formulaire d'ajout
                    document.getElementById('formAddEmprunt').style.display = 'block';
                    this.style.display = 'none';
                });
            </script>
            <div id="formAddEmprunt" style="display: none;">
                <form action="<?= base_url('/emprunts/add') ?>" method="post">
                    <label for="nom_abonne">Nom de l'abonné :</label>
                    <input type="text" id="nom_abonne" name="nom_abonne"><br>
                    <script>
                        setupAutocomplete('nom_abonne', '<?= base_url('/emprunts/suggestions') ?>');
                    </script>

                    <label for='cote_exemplaire'>Cote exemplaire :</label>
                    <input type="text" id='cote_exemplaire' name='cote_exemplaire'><br>

                    <label for='date_emprunt'>Date d'emprunt :</label>
                    <input type="date" id='date_emprunt' name='date_emprunt'><br>

                    <label for='date_retour'>Date de retour prévu :</label>
                    <input type="date" id='date_retour' name='date_retour'><br>

                    <label for='estRenouvele'>Renouvellement :</label>
                    <select id='estRenouvele' name='estRenouvele'><br>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select><br>

                    <input class="bouton" type="submit" value="Valider">
                </form>
            </div>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Matricule</th>
                        <th>Cote Exemplaire</th>
                        <th>Date d'Emprunt</th>
                        <th>Date de Retour</th>
                        <th>Renouvellement</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($emprunts as $emprunt) : ?>
                        <tr>
                            <td><?php echo $emprunt['matricule_abonne']; ?></td>
                            <td><?php echo $emprunt['cote_exemplaire']; ?></td>
                            <td><?php echo $emprunt['date_emprunt']; ?></td>
                            <td><?php echo $emprunt['date_retour']; ?></td>
                            <td><?php echo $emprunt['estRenouvele']; ?></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</div>