<?php

namespace App\Controllers;

abstract class AbstractController extends BaseController
{
    protected $classModel = "";
    protected $template = "";
    protected $templateDetail = "";
    protected $return = "";
    protected $templateInfos = '';

    public function index($data = [])
    {
        $session = session();
        $template =
            view('templates/gestionHeader.php', [
                'loggedIn' => $session->get('loggedIn'),
                'name' => $session->get('username')
            ]) .
            view(($this->template), $data) .
            view('templates/footer.php');
        return $template;
    }

    public function detail($matricule_abonne) // Fonction pour récupérer le matricule des abonnés et afficher leurs infos
    {
        $abonneModel = model($this->classModel);
        $abonne = $abonneModel->find($matricule_abonne);

        $session = session();
        $template =
            view('templates/gestionHeader.php', [
                'loggedIn' => $session->get('loggedIn'),
                'name' => $session->get('username')
            ]) .
            view(($this->templateDetail), ['abonne' => $abonne]) .
            view('templates/footer.php');
        return $template;
    }

    public function infos() // fonction pour récupérer les informations de l'abonne sur sa page mes informations
    {
        $abonneModel = model($this->classModel);
        $session = session();
        $matricule_abonne = $session->get('matricule');
        $abonne = $abonneModel->find($matricule_abonne);
        $template = 'abonneInformations';
        $view =
            view('templates/gestionHeader.php', [
                'loggedIn' => $session->get('loggedIn'),
                'name' => $session->get('username')
            ]) .
            view($template, ['abonne' => $abonne]) .
            view('templates/footer.php');
        return $view;
    }

    public function add() // Fonction pour ajouter
    {
        $abonneModel = model($this->classModel);
        $data = array();
        $fields = $abonneModel->getAllowedFields();
        foreach ($fields as $field) {
            $data[$field] = $this->request->getPost($field);
        }
        $success = $abonneModel->insert($data);
        return view('SuccessRequest');
    }

    public function update($matricule_abonne)
    {
        $abonneModel = model($this->classModel);
        if (!$this->request->getPost()) {
            return view('FailedRequest');
        }
        $postData = $this->request->getPost();
        $requiredFields = ['nom_abonne', 'date_naissance_abonne', 'date_adhesion_abonne', 'adresse_abonne', 'telephone_abonne', 'CSP_abonne'];
        foreach ($requiredFields as $field) {
            if (!isset($postData[$field]) || empty(trim($postData[$field]))) {
                return view('FailedRequest');
            }
        }
        $success = $abonneModel->updateAbonne($matricule_abonne, $postData);
        if (!$success) {
            return redirect()->to('gestion_abonnes');
        }
        return redirect()->to('gestion_abonnes');
    }

    public function updateInfos()
    {
        $data = $this->request->getPost();
        $validationRules = [
            'nom_abonne' => 'required',
            'date_naissance_abonne' => 'required',
            'date_adhesion_abonne' => 'required',
            'adresse_abonne' => 'required',
            'telephone_abonne' => 'required',
            'CSP_abonne' => 'required'
        ];
        if (!$this->validate($validationRules)) {
            return view('ValidationRules');
        }
        $abonneModel = model($this->classModel);
        $session = session();
        $matricule_abonne = $session->get('matricule');
        $success = $abonneModel->updateAbonne($matricule_abonne, $data);
        if (!$success) {
            return view('FailedRequest');
        }
        return view('SuccessRequest');
    }

    public function delete($primaryKey)
    {
        $model = model($this->classModel);
        if (!$model->find($primaryKey)) {
            return redirect()->to('gestion_abonnes');
        }
        $model->delete($primaryKey);
        return redirect()->to('gestion_abonnes');
    }
}
