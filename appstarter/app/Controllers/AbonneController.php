<?php

namespace App\Controllers;

use App\Models\AbonneModel;

class AbonneController extends AbstractController
{
    protected $classModel = AbonneModel::class;
    protected $template = 'gestionAbo';
    protected $templateDetail = 'detailAbo';
    protected $return = '/gestion_abonnés';
    protected $data = [
        'nom_abonne',
        'date_naissance_abonne',
        'date_adhesion_abonne',
        'adresse_abonne',
        'telephone_abonne',
        'CSP_abonne'
    ];
    
}

