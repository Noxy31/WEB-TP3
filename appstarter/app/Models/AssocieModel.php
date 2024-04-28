<?php

namespace App\Models;

use CodeIgniter\Model;

class AssocieModel extends Model
{
    protected $table = 'associe';
    protected $primaryKey = ['code_catalogue', 'id_motcle'];
    protected $allowedFields = ['code_catalogue', 'id_motcle'];

    public function insertAssocie($codeCatalogue, $idMotCle) // Insertion dans la table associe
    {
        return $this->insert(['code_catalogue' => $codeCatalogue, 'id_motcle' => $idMotCle]);
    }

    public function getAllowedFields() {
        return $this->allowedFields;
    }
}