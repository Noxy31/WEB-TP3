<?php
namespace App\Models;

use CodeIgniter\Model;

class AbonneModel extends Model {
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



    public function getAbonnes() {
        return $this->findAll();
    }
}

