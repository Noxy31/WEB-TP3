<?php

namespace App\Controllers;

use App\Models\AbonneModel;

class DemandesController extends AbstractController
{
    protected $classModel = AbonneModel::class;
    protected $template = 'gestionDemandes';
    protected $return = '/gestion_demandes';
    protected $demandesModel;

    public function list()
    {
        $abonneModel = model(AbonneModel::class);
        $demandes = $abonneModel->getAbonnes();

        $data['demandes'] = $demandes;

        return $this->index($data);
    }

    public function delete($code_catalogue)
    {
        return parent::delete($code_catalogue);
    }

}