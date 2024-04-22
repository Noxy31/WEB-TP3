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

    public function getAllowedFields() {
        return $this->allowedFields;
    }

    public function getAbonneByMatricule($matricule) {
        return $this->find($matricule);
    }

    public function getAbonnes() {
        return $this->findAll();
    }

    public function updateAbonne($matricule_abonne, $data) {
        return $this->update($matricule_abonne, $data);
    }

    public function deleteAbonne($matricule_abonne) {
        return $this->where('matricule_abonne', $matricule_abonne)->delete();
    }
}
