<?php

namespace App\Controllers;

use App\Models\AbonneModel;

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

    public function detail($code_catalogue)
    {
        $livresModel = new \App\Models\LivresModel();
        $exemplairesModel = new \App\Models\ExemplaireModel();
        $empruntsModel = new \App\Models\EmpruntsModel();

        $livre = $livresModel->find($code_catalogue);

        $exemplaires = $exemplairesModel->where('code_catalogue', $code_catalogue)->findAll();

        $emprunts = $empruntsModel->findAll();

        $data = [
            'livre' => $livre,
            'exemplaires' => $exemplaires,
            'emprunts' => $emprunts
        ];
        $session = session();
        $template = view('templates/gestionHeader.php', [
            'loggedIn' => $session->get('loggedIn'),
            'name' => $session->get('username')
        ]) .
            view(('detailLivres'), $data) .
            view('templates/footer.php');
        return $template;
    }

    public function faireDemandeEmprunt()
    {
        $code_catalogue = $this->request->getPost('code_catalogue');
        $session = session();
        $matricule_abonne = $session->get('matricule');
        $livreModel = new \App\Models\LivresModel();
        $success = $livreModel->faireDemandeEmprunt($matricule_abonne, $code_catalogue);
        if (!$success) {
            return view('ImpossibleRequest');
        }

        return view('SuccessRequest');
    }


    public function add()
    {
        $livresModel = new \App\Models\LivresModel();

        $titreLivre = $this->request->getPost('titreLivre');
        $auteur = $this->request->getPost('auteur');
        $themeLivre = $this->request->getPost('themeLivre');
        $motCle = $this->request->getPost('motcle');

        $livreId = $livresModel->addLivre($titreLivre, $auteur, $themeLivre, $motCle);

        return view('SuccessRequest');
    }
}
