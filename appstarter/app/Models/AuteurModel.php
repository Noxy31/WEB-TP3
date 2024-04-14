<?php

namespace App\Models;

use CodeIgniter\Model;

class AuteurModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'auteur';
    protected $primaryKey = 'id_auteur';
    protected $allowedFields = [
        'nom_auteur',
    ];

    public function getAuteur()
    {
        return $this->findAll();
    }
}