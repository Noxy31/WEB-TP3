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

    public function getAllowedFields()
    {
        return $this->allowedFields;
    }

    public function getLivres()
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

    public function addLivre($titreLivre, $auteur, $themeLivre, $motCle)
    {
        $this->insert(['titre_livre' => $titreLivre, 'theme_livre' => $themeLivre]); // creation du livre dans la bdd
        $livreId = $this->insertID();

        $auteurModel = new AuteurModel(); // creation de l'auteur dans la bdd
        $auteurId = $auteurModel->getOrCreateAuteur($auteur);

        $ecritModel = new EcritModel(); // crée la relation dans la table ecrit
        $ecritModel->insertEcrit($livreId, $auteurId);

        $motcleModel = new MotcleModel(); // crée les mots clés dans motcle
        $motsCleArray = explode(',', $motCle);
        foreach ($motsCleArray as $motCle) {
            $motCleId = $motcleModel->getOrCreateMotCle($motCle);

            if ($motCleId !== 0) { // vérifie si l'id du mot-clé est différent de 0
                $associeModel = new AssocieModel(); // crée la relation livre-motclé
                $associeModel->insertAssocie($livreId, $motCleId);
            }
        }

        return $livreId;
    }

    public function searchByTitle($term)
    {
        $results = $this->like('titre_livre', $term)->findAll();
        if (!is_array($results)) {
            $results = [];
        }
        $formattedResults = [];
        foreach ($results as $result) {
            $formattedResults[] = ['titre_livre' => $result['titre_livre']];
        }

        return $formattedResults;
    }
}
