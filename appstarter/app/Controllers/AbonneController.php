<?php

namespace App\Controllers;

class AbonneController extends BaseController
{
    public function index()
    {
        $gestionAboModel = model(\App\Models\AbonneModel::class);
        $abonnes = $gestionAboModel->getAbonnes();
        $data['abonnes'] = $abonnes; // On passe les abonnés sur la vue
        //var_dump($abonnes);
        $template =
            view('templates/gestionHeader.php') .
            view('gestionAbo.php', $data) .
            view('templates/footer.php');
        return $template;
    }

    public function detail($matricule_abonne) // Fonction pour récupérer le matricule des abonnés et afficher leurs infos
    {
        $abonneModel = model(\App\Models\AbonneModel::class);
        $abonne = $abonneModel->find($matricule_abonne);

        $template =
            view('templates/gestionHeader.php') .
            view('detailAbo', ['abonne' => $abonne]) .
            view('templates/footer.php');
        return $template;
    }

    public function update($matricule_abonne) // Fonction pour mettre a jour les infos des abonnés
    {
        $abonneModel = model(\App\Models\AbonneModel::class);

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

            return redirect()->to(base_url('/abonne/detail/' . $matricule_abonne));
        }

        return redirect()->to(base_url('/erreur'));
    }
}
