<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpruntsModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = ['emprunte'];
    protected $primaryKey = ['cote_exemplaire', 'date_emprunt'];
    protected $allowedFields = [
        'matricule_abonne',
        'date_retour',
        'estRenouvele'
    ];

    public function getAllowedFields()
    {
        return $this->allowedFields;
    }

    public function updateEmprunts($cote_exemplaire, $date_emprunt, $data)
    {
        return $this->update($cote_exemplaire, $date_emprunt, $data);
    }

    public function deleteEmprunts($date_emprunt)
    {
        return $this->where('date_emprunt', $date_emprunt)->delete();
    }

}
