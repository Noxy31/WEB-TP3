<?php

namespace App\Models;

use CodeIgniter\Model;

class AbonneModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'abonne';
    protected $primaryKey = 'matricule_abonne';
    protected $allowedFields = [
        'nom_abonne',
        'date_naissance_abonne',
        'date_adhesion_abonne',
        'adresse_abonne',
        'telephone_abonne',
        'CSP_abonne'
    ];

    public function getAllowedFields()
    {
        return $this->allowedFields;
    }

    public function getAbonneByMatricule($matricule)
    {
        return $this->find($matricule);
    }

    public function getAbonnes()
    {
        $this->select('abonne.*, demande.date_demande, demande.code_catalogue');
        $this->join('demande', 'abonne.matricule_abonne = demande.matricule_abonne');
        $this->join('livre', 'livre.code_catalogue = demande.code_catalogue');
        return $this->findAll();
    }

    public function updateAbonne($matricule_abonne, $data)
    {
        return $this->update($matricule_abonne, $data);
    }

    public function deleteAbonne($matricule_abonne)
    {
        return $this->where('matricule_abonne', $matricule_abonne)->delete();
    }

    public function searchByName($term)
    {
        $results = $this->like('nom_abonne', $term)->findAll();
        if (!is_array($results)) {
            $results = [];
        }
        $formattedResults = [];
        foreach ($results as $result) {
            $formattedResults[] = ['nom_abonne' => $result['nom_abonne']];
        }

        return $formattedResults;
    }
}
