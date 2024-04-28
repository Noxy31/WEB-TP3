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
            return view('FailedRequest');
        }
        return view('SuccessRequest');
    }

    public function mesEmprunts()
    {
        $session = session();
        $this->template = 'abonneEmprunts';
        $matricule_abonne = $session->get('matricule');
        $empruntsModel = new \App\Models\EmpruntsModel();
        $emprunts = $empruntsModel->getEmpruntsWithLivresByMatricule($matricule_abonne);
        $data['emprunts'] = $emprunts;
        return $this->index($data);
    }
}
