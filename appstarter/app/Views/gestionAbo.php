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
            <h1>Gestion des abonnés</h1>
        </div>
        <div>
            <button class="bouton" id="btnAddAbonne">Ajouter un abonné</button>
            <script>
                document.getElementById('btnAddAbonne').addEventListener('click', function() { // Fonction pour faire apparaitre le formulaire d'ajout
                    document.getElementById('formAddAbonne').style.display = 'block';
                    this.style.display = 'none';
                });
            </script>
            <div id="formAddAbonne" style="display: none;">
                <form action="<?= base_url('/abonne/add') ?>" method="post">
                    <label for='nom_abonne'>Nom :</label>
                    <input type="text" id='nom_abonne' name="nom_abonne"><br>

                    <label for='date_naissance_abonne'>Date de naissance :</label>
                    <input type="date" id='date_naissance_abonne' name='date_naissance_abonne'><br>

                    <label for='date_adhesion_abonne'>Date d'adhésion :</label>
                    <input type="date" id='date_adhesion_abonne' name='date_adhesion_abonne'><br>

                    <label for='adresse_abonne'>Adresse :</label>
                    <input type="text" id='adresse_abonne' name='adresse_abonne'><br>

                    <label for='telephone_abonne'>Téléphone :</label>
                    <input type="text" id='telephone_abonne' name='telephone_abonne'><br>

                    <label for='CSP_abonne'>CSP :</label>
                    <select id='CSP_abonne' name='CSP_abonne'><br>
                        <option value="Employé">Employé</option>
                        <option value="Cadre">Cadre</option>
                        <option value="Ouvrier">Ouvrier</option>
                        <option value="Retraité">Retraité</option>
                        <option value="Etudiant">Etudiant</option>
                        <option value="Artisan/Commercant/Chef d'entreprise">Artisan/Commercant/Chef d'entreprise</option>
                    </select><br>
                    <input class="bouton" type="submit" value="Valider">
                </form>
            </div>
            <form class="search" method="GET" action="<?php echo base_url('/gestion_abonnes'); ?>">
                <input type="text" name="search" placeholder="Rechercher un abonné">
                <button class="bouton-search" type="submit">Rechercher</button>
            </form>
        </div>
        <?php $resultsFound = false; ?>
        <div>
            <?php foreach ($abonnes as $abonne) : ?>
                <?php if (empty($_GET['search']) || strpos(strtolower($abonne['nom_abonne']), strtolower($_GET['search'])) !== false) : ?>
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
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Date de naissance</th>
                            <th>Date d'adhésion</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>CSP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($abonnes as $abonne) : ?>
                            <?php if (empty($_GET['search']) || strpos(strtolower($abonne['nom_abonne']), strtolower($_GET['search'])) !== false) : ?>
                                <tr class="ligne-tableau" onclick="window.location='<?php echo base_url('/abonne/detail/' . $abonne['matricule_abonne']); ?>'">
                                    <td><?php echo $abonne['matricule_abonne']; ?></td>
                                    <td><?php echo $abonne['nom_abonne']; ?></td>
                                    <td><?php echo $abonne['date_naissance_abonne']; ?></td>
                                    <td><?php echo $abonne['date_adhesion_abonne']; ?></td>
                                    <td><?php echo $abonne['adresse_abonne']; ?></td>
                                    <td><?php echo $abonne['telephone_abonne']; ?></td>
                                    <td><?php echo $abonne['CSP_abonne']; ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>