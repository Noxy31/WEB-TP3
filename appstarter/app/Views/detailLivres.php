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
            <?php if ($livre) : ?>
                <h1>Exemplaires de <?= $livre['titre_livre'] ?></h1>
            <?php else : ?>
                <h1>Exemplaires de livre</h1>
            <?php endif; ?>
        </div>
        <div>
            <form method="post" action="/faire_demande_emprunt">
                <input type="hidden" name="code_catalogue" value="<?php echo $livre['code_catalogue']; ?>">
                <button class='bouton' type="submit">Faire une demande d'emprunt</button>
            </form>
            <?php if ($exemplaires && count($exemplaires) > 0) : ?>
                <table>
                    <thead>
                        <tr>
                            <th>Edition</th>
                            <th>Emplacement</th>
                            <th>Disponibilité</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($exemplaires as $exemplaire) : ?>
                            <tr>
                                <td><?= $exemplaire['nom_editeur'] ?></td>
                                <td><?= $exemplaire['emplacement_rayon'] ?></td>
                                <td>
                                    <?php
                                    $emprunte = false;
                                    foreach ($emprunts as $emprunt) {
                                        if ($emprunt['cote_exemplaire'] === $exemplaire['cote_exemplaire']) {
                                            $emprunte = true;
                                            break;
                                        }
                                    }
                                    if ($emprunte) {
                                        echo "Non";
                                    } else {
                                        echo "Oui";
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>Aucun exemplaire trouvé pour ce livre.</p>
            <?php endif; ?>
        </div>
    </div>
</div>