<div id="topbar">
    <ul>
        <li class="btn"><a href="<?php echo base_url('/gestion_abonnés'); ?>">Gestion des abonnés</a></li>
        <li><a href="<?php echo base_url('/gestion_livres'); ?>">Gestion des livres</a></li>
        <li><a href="#">Gestion des exemplaires</a></li>
        <li><a href="#">Gestion des emprunts</a></li>
        <li><a href="#">Gestion des retours</a></li>
        <li><a href="#">Gestion des demandes</a></li>
    </ul>
</div>
<div id="content">
    <div class="container">
        <div class="h1Cont">
            <h1>Gestion des Livres</h1>
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
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom"><br>

                    <label for="date_naissance">Date de naissance (YYYY-MM-DD) :</label>
                    <input type="text" id="date_naissance" name="date_naissance"><br>

                    <label for="date_adhesion">Date d'adhésion (YYYY-MM-DD) :</label>
                    <input type="text" id="date_adhesion" name="date_adhesion"><br>

                    <label for="adresse">Adresse :</label>
                    <input type="text" id="adresse" name="adresse"><br>

                    <label for="telephone">Téléphone :</label>
                    <input type="text" id="telephone" name="telephone"><br>

                    <label for="csp">CSP :</label>
                    <input type="text" id="csp" name="csp"><br>

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
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>

</div>

</div>