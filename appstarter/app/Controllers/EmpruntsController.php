<?php

namespace App\Controllers;

use App\Models\EmpruntsModel;

class EmpruntsController extends AbstractController
{
    protected $classModel = EmpruntsModel::class;
    protected $template = 'gestionEmprunts';
    protected $return = '/gestion_emprunts';

}