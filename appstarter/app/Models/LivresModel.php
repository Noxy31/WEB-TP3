<?php

namespace App\Models;

use CodeIgniter\Model;

class LivresModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'livre';
    protected $primaryKey = 'code_catalogue';
    protected $allowedFields = [
        'titre_livre',
        'theme_livre',
    ];

    public function getLivres()
    {
        return $this->findAll();
    }
}