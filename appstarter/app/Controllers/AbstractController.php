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
        $gestionAboModel = model($this->classModel);

        $abonnes = $gestionAboModel->findAll();
        $data['abonnes'] = $abonnes; // On passe les abonnés sur la vue
        $template =
            view('templates/gestionHeader.php') .
            view(($this->template), $data) .
            view('templates/footer.php');
        return $template;
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

        return redirect()->to(base_url($this -> return));
        return "";
    }

    public function update($matricule_abonne) // Fonction pour mettre a jour les infos des abonnés
    {
        $abonneModel = model($this->classModel);

        if ($this->request->getMethod() === 'post') {
            $data = [
                'nom_abonne' => $this->request->getPost('nom'),
                'date_naissance_abonne' => $this->request->getPost('date_naissance'),
                'date_adhesion_abonne' => $this->request->getPost('date_adhesion'),
                'adresse_abonne' => $this->request->getPost('adresse'),
                'telephone_abonne' => $this->request->getPost('telephone'),
                'CSP_abonne' => $this->request->getPost('csp')
            ];

            $abonneModel->updateAbonne($matricule_abonne, $data);

            return redirect()->to(base_url('/gestion_abonnés'));
        }

        return redirect()->to(base_url('/erreur'));
    }
    
    public function delete() 
    {

    }
}
