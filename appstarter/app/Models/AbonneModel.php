<?php

namespace App\Models;

use CodeIgniter\Model;

class AbonneModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'abonne';
    protected $primaryKey = 'matricule_abonne';
    protected $matricule = 'matricule_abonne';
    protected $allowedFields = [
        'matricule_abonne',
        'nom_abonne',
        'date_naissance_abonne',
        'date_adhesion_abonne',
        'adresse_abonne',
        'telephone_abonne',
        'CSP_abonne'
    ];

    public function getAllowedFields() // Récupère les champs autorisés
    {
        return $this->allowedFields;
    }

    public function getAbonneByMatricule($matricule) // Récupère un abonné grace a son matricule
    {
        $result = $this->find($matricule);
        if ($result !== null) {
            return (object) $result;
        }
        return null;
    }

    public function getAbonnes() // Récupère les abonnés, dans l'espace abonné avec une jointure sur la table demande et sur la table livre
    {
        $this->select('abonne.*, demande.date_demande, demande.code_catalogue');
        $this->join('demande', 'abonne.matricule_abonne = demande.matricule_abonne');
        $this->join('livre', 'livre.code_catalogue = demande.code_catalogue');
        return $this->findAll();
    }

    public function getDemandesByMatricule($matricule_abonne) // Même qu'au dessus mais pour les abonnés puisque le matricule est récupérable dans le matricule se trouvant dans l'url
    {
        return $this->select('abonne.*, demande.date_demande, demande.code_catalogue, livre.titre_livre')
            ->join('demande', 'abonne.matricule_abonne = demande.matricule_abonne')
            ->join('livre', 'livre.code_catalogue = demande.code_catalogue')
            ->where('demande.matricule_abonne', $matricule_abonne)
            ->findAll();
    }

    public function updateAbonne($matricule_abonne, $data) // Mise a jour d'un abonné
    {
        return $this->update($matricule_abonne, $data);
    }

    public function deleteAbonne($matricule_abonne) // Suppression d'un abonné
    {
        return $this->where('matricule_abonne', $matricule_abonne)->delete();
    }

    public function deleteDemande($code_catalogue) // Suppressiond d'une demande
    {
        return $this->db->table('demande')->where('code_catalogue', $code_catalogue)->delete();
    }
}
