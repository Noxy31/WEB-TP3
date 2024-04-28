<?php

namespace App\Models;

use CodeIgniter\Model;

class LivresModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'livre';
    protected $primaryKey = 'code_catalogue';
    protected $allowedFields = [
        'titre_livre',
        'theme_livre',
    ];

    public function faireDemandeEmprunt($matricule_abonne, $code_catalogue) // Méthode de gestion des demandes d'emprunt, avec vérification de son existence
    {
        $demandeExistante = $this->demandeExiste($matricule_abonne, $code_catalogue);

        if ($demandeExistante) {
            return false;
        }
        $db = db_connect();
        $builder = $db->table('demande');
        $builder->insert([
            'matricule_abonne' => $matricule_abonne,
            'code_catalogue' => $code_catalogue,
            'date_demande' => date('Y-m-d')
        ]);

        return true;
    }

    public function demandeExiste($matricule_abonne, $code_catalogue) // Méthode de vérification de l'existence d'une demande
    {
        $demande = $this->db->table('demande')
                            ->where('matricule_abonne', $matricule_abonne)
                            ->where('code_catalogue', $code_catalogue)
                            ->get()
                            ->getRow();

        return $demande !== null;
    }

    public function getAllowedFields()
    {
        return $this->allowedFields;
    }

    public function getLivres() // Récupération des livres, avec jointure sur les table ecrit, auteur, associe et motcle, et groupBy sur le code_catalogue
    {
        $livres = $this->select('livre.code_catalogue, livre.titre_livre, livre.theme_livre, auteur.nom_auteur, GROUP_CONCAT(motcle.motCle) as mots_cle')
            ->join('ecrit', 'ecrit.code_catalogue = livre.code_catalogue')
            ->join('auteur', 'auteur.id_auteur = ecrit.id_auteur')
            ->join('associe', 'associe.code_catalogue = livre.code_catalogue')
            ->join('motcle', 'motcle.id_motCle = associe.id_motcle')
            ->groupBy('livre.code_catalogue')
            ->findAll();

        return $livres;
    }

    public function addLivre($titreLivre, $auteur, $themeLivre, $motCle) // Ajout d'un nouveau livre
    {
        $this->insert(['titre_livre' => $titreLivre, 'theme_livre' => $themeLivre]);
        $livreId = $this->insertID();

        $auteurModel = new AuteurModel();
        $auteurId = $auteurModel->getOrCreateAuteur($auteur);

        $ecritModel = new EcritModel();
        $ecritModel->insertEcrit($livreId, $auteurId);

        $motcleModel = new MotcleModel();
        $motsCleArray = explode(',', $motCle);
        foreach ($motsCleArray as $motCle) {
            $motCleId = $motcleModel->getOrCreateMotCle($motCle);

            if ($motCleId !== 0) { 
                $associeModel = new AssocieModel();
                $associeModel->insertAssocie($livreId, $motCleId);
            }
        }
        return $livreId;
    }
}
