<?php

namespace App\Controllers;

use App\Models\AbonneModel;

class DemandesController extends AbstractController
{
    protected $classModel = AbonneModel::class;
    protected $template = 'gestionDemandes';
    protected $return = '/gestion_demandes';
    protected $demandesModel;

    public function list()
    {
        $abonneModel = model(AbonneModel::class);
        $demandes = $abonneModel->getAbonnes();
        usort($demandes, function ($a, $b) { // Passage des données string en time pour les date de demandes
            if ($a['code_catalogue'] == $b['code_catalogue']) {
                return strtotime($a['date_demande']) - strtotime($b['date_demande']);
            }
            return $a['code_catalogue'] - $b['code_catalogue'];
        });
        $data['demandes'] = $demandes;
        return $this->index($data);
    }

    public function mesDemandes() // Fonction pour afficher la page des demandes d'un abonné
    {
        $session = session();
        $this->template = 'abonneDemandes';
        $matricule_abonne = $session->get('matricule');
        $demandesModel = new \App\Models\AbonneModel();
        $demandes = $demandesModel->getDemandesByMatricule($matricule_abonne);
        $data['demandes'] = $demandes;
        return $this->index($data);
    }

    public function delete($code_catalogue) // Fonction pour supprimer une demande
    {
        $demandeModel = new \App\Models\AbonneModel();
        $success = $demandeModel->deleteDemande($code_catalogue);

        if (!$success) {
            return view('FailedRequest');
        }

        return view('SuccessRequest');
    }
}
