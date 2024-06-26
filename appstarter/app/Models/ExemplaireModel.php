<?php

namespace App\Models;

use CodeIgniter\Model;

class ExemplaireModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'exemplaire';
    protected $primaryKey = 'cote_exemplaire';
    protected $allowedFields = [
        'nom_editeur',
        'code_usure',
        'date_acquisition',
        'emplacement_rayon',
        'code_catalogue',
    ];

    public function getAllowedFields()
    {
        return $this->allowedFields;
    }

    public function getExemplaire() // Récupération d'un exemplaire, avec jointure sur livre, en excluant les exemplaire dégrdés
    {
        $exemplaires = $this->select('exemplaire.cote_exemplaire, livre.titre_livre, exemplaire.nom_editeur, exemplaire.code_usure, exemplaire.date_acquisition, exemplaire.emplacement_rayon')
            ->join('livre', 'livre.code_catalogue = exemplaire.code_catalogue')
            ->where('exemplaire.code_usure !=', 'DEGRADE')
            ->findAll();

        return $exemplaires;
    }

    public function addExemplaire($codeCatalogue, $nomEditeur, $codeUsure, $dateAcquisition, $emplacementRayon) // Ajout d'un exemplaire
    {
        return $this->insert([
            'nom_editeur' => $nomEditeur,
            'code_usure' => $codeUsure,
            'date_acquisition' => $dateAcquisition,
            'emplacement_rayon' => $emplacementRayon,
            'code_catalogue' => $codeCatalogue,
        ]);
    }

    public function getPourcentagesParEtat() // Fonction de récupération des exemplaire, avec jointure sur la table livre pour récupérer le titre du livre, et transformation des résultats de la requête en pourcentage sur leurs code_usure (ce commentaire est bien trop long)
    {
        $query = $this->select('livre.titre_livre, 
                            SUM(CASE WHEN exemplaire.code_usure = "NEUF" THEN 1 ELSE 0 END) as count_neuf,
                            SUM(CASE WHEN exemplaire.code_usure = "TRES BON" THEN 1 ELSE 0 END) as count_tres_bon,
                            SUM(CASE WHEN exemplaire.code_usure = "BON" THEN 1 ELSE 0 END) as count_bon,
                            SUM(CASE WHEN exemplaire.code_usure = "MOYEN" THEN 1 ELSE 0 END) as count_moyen,
                            SUM(CASE WHEN exemplaire.code_usure = "DEGRADE" THEN 1 ELSE 0 END) as count_degrade,
                            COUNT(*) as total_exemplaires')
            ->join('livre', 'livre.code_catalogue = exemplaire.code_catalogue')
            ->groupBy('livre.titre_livre');
        $results = $query->findAll();

        foreach ($results as &$row) {
            $totalExemplaires = $row['total_exemplaires'];
            $row['pourcentage_neuf'] = round(($row['count_neuf'] / $totalExemplaires) * 100, 2);
            $row['pourcentage_tres_bon'] = round(($row['count_tres_bon'] / $totalExemplaires) * 100, 2);
            $row['pourcentage_bon'] = round(($row['count_bon'] / $totalExemplaires) * 100, 2);
            $row['pourcentage_moyen'] = round(($row['count_moyen'] / $totalExemplaires) * 100, 2);
            $row['pourcentage_degrade'] = round(($row['count_degrade'] / $totalExemplaires) * 100, 2);
            unset($row['total_exemplaires'], $row['count_neuf'], $row['count_tres_bon'], $row['count_bon'], $row['count_moyen'], $row['count_degrade']);
        }
        return $results;
    }
}
