<?php

namespace App\Controllers;

use App\Models\AbonneModel;

class AbonneController extends AbstractController
{
    protected $classModel = AbonneModel::class;
    protected $template = 'gestionAbo';
    protected $templateDetail = 'detailAbo';
    protected $return = '/gestion_abonnés';
}
