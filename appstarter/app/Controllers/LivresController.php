<?php

namespace App\Controllers;

class LivresController extends BaseController
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

        $session = session();
        $template = '';
        if ($session->has('role') && $session->get('role') == 'admin') {
            $template =
            view('templates/gestionHeader.php', [
                'loggedIn' => $session->get('loggedIn'),
                'name' => $session->get('username')
            ]) .
                view('gestionLivres.php', $data) .
                view('templates/footer.php');
        } else {
            $template =
                view('templates/gestionHeader.php', [
                    'loggedIn' => $session->get('loggedIn'),
                    'name' => $session->get('username')
                ]) .
                view('abonneLivres.php', $data) .
                view('templates/footer.php');
        }

        return $template;
    }

    public function add()
    {
        $livresModel = new \App\Models\LivresModel();

        $titreLivre = $this->request->getPost('titreLivre');
        $auteur = $this->request->getPost('auteur');
        $themeLivre = $this->request->getPost('themeLivre');
        $motCle = $this->request->getPost('motcle');

        $livreId = $livresModel->addLivre($titreLivre, $auteur, $themeLivre, $motCle);

        return redirect()->to(base_url('/gestion_livres'));
    }
}
