<?php

namespace App\Controllers;

use App\Models\AbonneModel;

class AbonneController extends AbstractController
{
    protected $classModel = AbonneModel::class;
    protected $template = 'gestionAbo';
    protected $templateDetail = 'detailAbo';
    protected $return = '/gestion_abonnes';
    protected $data = 'abonnes';

    
    public function list()
    {
        $gestionAboModel = model($this->classModel);
        $abonnes = $gestionAboModel->findAll();
        $data = [
            'abonnes' => $abonnes
        ];

        return $this->index($data);
    }

    public function delete($matricule_abonne)
    {
        return parent::delete($matricule_abonne);
    }

    
}
