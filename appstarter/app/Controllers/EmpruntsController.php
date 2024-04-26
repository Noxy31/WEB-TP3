<?php

namespace App\Controllers;

use App\Models\EmpruntsModel;

class EmpruntsController extends AbstractController
{

    public function list()
    {
        $gestionEmpruntsModel = model($this->classModel);
        $emprunts = $gestionEmpruntsModel->findAll();

        $data['emprunts'] = $emprunts;

        return $this->index($data);
    }

    protected $classModel = EmpruntsModel::class;
    protected $template = 'gestionEmprunts';
    protected $return = '/gestion_emprunts';
}
