<?php

namespace App\Controllers;

class LivresController extends AbstractController
{
    public function index()
    {
        $gestionLivresModel = new \App\Models\LivresModel();
        $gestionAuteurModel = new \App\Models\AuteurModel();
        $gestionMotcleModel = new \App\Models\MotcleModel();
        $gestionEcritModel = new \App\Models\EcritModel();
        $gestionAssocieModel = new \App\Models\AssocieModel();

        $livres = $gestionLivresModel->getLivres();
        $auteurs = $gestionAuteurModel->getAuteur();
        $motcle = $gestionMotcleModel->getMotcle();
        $ecrits = $gestionEcritModel->findAll();
        $associe = $gestionAssocieModel->findAll();

        $data = [
            'livres' => $livres,
            'auteurs' => $auteurs,
            'motcle' => $motcle,
            'ecrits' => $ecrits,
            'associe' => $associe,
            ];

        $template =
            view('templates/gestionHeader.php') .
            view('gestionLivres.php', $data) .
            view('templates/footer.php');

        return $template;
    }

    public function add() {   
    $livresModel = new \App\Models\LivresModel();

    $titreLivre = $this->request->getPost('titreLivre');
    $auteur = $this->request->getPost('auteur');
    $themeLivre = $this->request->getPost('themeLivre');
    $motCle = $this->request->getPost('motcle');

    $livreId = $livresModel->addLivre($titreLivre, $auteur, $themeLivre, $motCle);

    return redirect()->to(base_url('/gestion_livres'));
    }
}