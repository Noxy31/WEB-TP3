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

    public function getOrCreateMotCle($motCle) // Récupération ou création d'un mot clé
    {
        $motcle = $this->where('motCle', $motCle)->first();

        if ($motcle) {
            return $motcle['id_motCle'];
        }

        $this->insert(['motCle' => $motCle]);
        return $this->insertID();
    }
}