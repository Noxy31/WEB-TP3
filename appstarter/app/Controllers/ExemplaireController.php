<?php

namespace App\Controllers;

class ExemplaireController extends BaseController
{
    public function index()
    {
        $gestionExemplaireModel = new \App\Models\ExemplaireModel();
        $exemplaires = $gestionExemplaireModel->getExemplaire();
        
        $data = [
            'exemplaires' => $exemplaires
        ];

        $template =
            view('templates/gestionHeader.php') .
            view('gestionExemplaires.php', $data) .
            view('templates/footer.php');

        return $template;
    }

    public function add() {   
        $exemplaireModel = new \App\Models\ExemplaireModel();

        $codeCatalogue = $this->request->getPost('codeCatalogue');
        $nomEditeur = $this->request->getPost('nomEditeur');
        $codeUsure = $this->request->getPost('codeUsure');
        $dateAcquisition = $this->request->getPost('dateAcquisition');
        $emplacementRayon = $this->request->getPost('emplacementRayon');

        $exemplaireId = $exemplaireModel->addExemplaire($codeCatalogue, $nomEditeur, $codeUsure, $dateAcquisition, $emplacementRayon);

        return redirect()->to(base_url('/gestion_exemplaires'));
    }
}