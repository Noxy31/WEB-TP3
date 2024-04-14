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

    public function getOrCreateMotCle($motCle)
    {
        $motcle = $this->where('motCle', $motCle)->first(); // verifie si le mot clé existe

        if ($motcle) {
            return $motcle['id_motCle']; // retourne l'id si il existe deja
        }

        $this->insert(['motCle' => $motCle]); // retourne le nouvel id et l'ajoute la bdd si il existe pas 
        return $this->insertID();
    }
}