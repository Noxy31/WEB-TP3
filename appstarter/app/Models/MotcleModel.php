<?php

namespace App\Models;

use CodeIgniter\Model;

class MotcleModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'motcle';
    protected $primaryKey = 'id_motCle';
    protected $allowedFields = [
        'motCle',
    ];

    public function getMotcle()
    {
        return $this->findAll();
    }
}