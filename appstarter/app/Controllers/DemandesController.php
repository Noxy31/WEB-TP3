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
        usort($demandes, function ($a, $b) {
            if ($a['code_catalogue'] == $b['code_catalogue']) {
                return strtotime($a['date_demande']) - strtotime($b['date_demande']);
            }
            return $a['code_catalogue'] - $b['code_catalogue'];
        });
        $data['demandes'] = $demandes;
        return $this->index($data);
    }

    public function delete($code_catalogue)
    {
        return parent::delete($code_catalogue);
    }
}
