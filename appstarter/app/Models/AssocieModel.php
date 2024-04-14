<?php

namespace App\Models;

use CodeIgniter\Model;

class AssocieModel extends Model
{
    protected $table = 'associe';
    protected $primaryKey = ['code_catalogue', 'id_motcle'];
    protected $allowedFields = ['code_catalogue', 'id_motcle'];
}