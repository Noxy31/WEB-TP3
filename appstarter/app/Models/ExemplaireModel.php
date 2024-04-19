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

    public function getExemplaire()
    {
        $exemplaires = $this->select('exemplaire.cote_exemplaire, exemplaire.code_catalogue, livre.titre_livre, exemplaire.nom_editeur, exemplaire.code_usure, exemplaire.date_acquisition, exemplaire.emplacement_rayon')
            ->join('livre', 'livre.code_catalogue = exemplaire.code_catalogue')
            ->findAll();

        return $exemplaires;
    }

    public function addExemplaire($codeCatalogue, $nomEditeur, $codeUsure, $dateAcquisition, $emplacementRayon)
    {
        return $this->insert([
            'nom_editeur' => $nomEditeur,
            'code_usure' => $codeUsure,
            'date_acquisition' => $dateAcquisition,
            'emplacement_rayon' => $emplacementRayon,
            'code_catalogue' => $codeCatalogue,
        ]);
    }
}
