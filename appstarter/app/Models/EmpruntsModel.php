<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpruntsModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = ['emprunte'];
    protected $primaryKey = ['cote_exemplaire', 'date_emprunt'];
    protected $allowedFields = [
        'cote_exemplaire',
        'date_emprunt',
        'matricule_abonne',
        'date_retour',
        'estRenouvele'
    ];

    public function getAllowedFields()
    {
        return $this->allowedFields;
    }

    public function deleteEmpr($cote_exemplaire) // Suppression d'un emprunt
    {
        try {
            $this->where('cote_exemplaire', $cote_exemplaire)->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getEmpruntsWithLivresByMatricule($matricule_abonne) // Récupération des emprunts de l'abonne connecté
    {
        return $this->select('emprunte.*, livre.titre_livre')
            ->join('exemplaire', 'exemplaire.cote_exemplaire = emprunte.cote_exemplaire')
            ->join('livre', 'livre.code_catalogue = exemplaire.code_catalogue')
            ->where('emprunte.matricule_abonne', $matricule_abonne)
            ->findAll();
    }

    public function isEmpruntExists($cote_exemplaire) // Fonction de vérification de l'existence d'un emprunt pour un abonné
    {
        return $this->where('cote_exemplaire', $cote_exemplaire)->countAllResults() > 0;
    }
}
