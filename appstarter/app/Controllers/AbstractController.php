<?php

namespace App\Controllers;

abstract class AbstractController extends BaseController
{
    protected $classModel = "";
    protected $template = "";
    protected $templateDetail = "";
    protected $return = "";

    public function index()
    {
        $data = $this->getData();
        $template =
            view('templates/gestionHeader.php') .
            view(($this->template), $data) .
            view('templates/footer.php');
        return $template;
    }

    protected function getData()
    {
        $model = model($this->classModel);
        switch ($this->template) {
            case 'gestionAbo':
                $abonnes = $model->findAll();
                $data['abonnes'] = $abonnes;
                break;
            case 'gestionEmprunts':
                $emprunts = $model->findAll();
                $data['emprunts'] = $emprunts;
                break;
            case 'gestionLivres':
                $livres = $model->findAll();
                $data['livres'] = $livres;
                break;
            default:
                $data = [];
                break;
        }
        
        return $data;
    }
    public function detail($matricule_abonne) // Fonction pour récupérer le matricule des abonnés et afficher leurs infos
    {
        $abonneModel = model($this->classModel);
        $abonne = $abonneModel->find($matricule_abonne);

        $template =
            view('templates/gestionHeader.php') .
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
        $abonneModel->insert($data);

        return redirect()->to(base_url($this->return));
    }

    public function update($matricule_abonne) // Fonction pour modifier/mettre à jour
    {
        $abonneModel = model($this->classModel);
        $fields = $abonneModel->getAllowedFields();
        foreach ($fields as $field) {
            $data[$field] = $this->request->getPost($field);
        }
        $abonneModel->updateAbonne($matricule_abonne, $data);

        return redirect()->to(base_url($this->return));
    }

    public function delete($matricule_abonne) // Fonction pour supprimer
    {
        $abonneModel = model($this->classModel);
        $abonneModel->deleteAbonne($matricule_abonne);
        return redirect()->to(base_url($this->return));
    }

}
