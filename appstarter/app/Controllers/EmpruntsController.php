<?php

namespace App\Controllers;

use App\Models\EmpruntsModel;

class EmpruntsController extends AbstractController
{
    protected $classModel = EmpruntsModel::class;
    protected $template = 'gestionEmprunts';
    protected $return = '/gestion_emprunts';
    protected $empruntModel;

    public function __construct()
    {
        $this->empruntModel = new \App\Models\EmpruntsModel();
    }

    public function list()
    {
        $gestionEmpruntsModel = model($this->classModel);
        $emprunts = $gestionEmpruntsModel->findAll();

        $data['emprunts'] = $emprunts;

        return $this->index($data);
    }

    public function deleteEmprunts($cote_exemplaire)
    {
        $result = $this->empruntModel->deleteEmpr($cote_exemplaire);
        if (!$result) {
            return redirect()->back()->with('error', 'La suppression a échoué.');
        }
        return redirect()->to(base_url('/gestion_emprunts'))->with('success', 'Suppression réussie.');
    }
}
