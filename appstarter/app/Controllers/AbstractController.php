<?php

namespace App\Controllers;

abstract class AbstractController extends BaseController
{
    protected $classModel = "";
    protected $template = "";
    protected $templateDetail = "";
    protected $return = "";

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

    public function add() // Fonction pour ajouter
{
    $abonneModel = model($this->classModel);
    $data = array();
    $fields = $abonneModel->getAllowedFields();
    foreach ($fields as $field) {
        $data[$field] = $this->request->getPost($field);
    }
    $success = $abonneModel->insert($data);
    if (!$success) {
        return view('FailedRequest');
    }

    return view('SuccessRequest');
}

    public function update($matricule_abonne) // Fonction pour modifier/mettre à jour
    {
        $abonneModel = model($this->classModel);
        $fields = $abonneModel->getAllowedFields();
        foreach ($fields as $field) {
            $data[$field] = $this->request->getPost($field);
        }
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
            return view('FailedRequest');
        }
        $model->delete($primaryKey);
        return view('SuccessRequest');
    }
}
