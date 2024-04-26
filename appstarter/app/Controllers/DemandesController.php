<?php

namespace App\Controllers;

use App\Models\AbonneModel;

class DemandesController extends AbstractController
{
    protected $classModel = AbonneModel::class;
    protected $template = 'gestionDemandes';
    protected $return = '/gestion_demandes';

    public function list()
    {
        $abonneModel = model(AbonneModel::class);
        $demandes = $abonneModel->getAbonnes();

        $data['demandes'] = $demandes;

        return $this->index($data);
    }

}