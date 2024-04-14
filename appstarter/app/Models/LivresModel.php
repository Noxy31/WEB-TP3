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

    public function getLivres()
    {
        $livres = $this->select('livre.*, auteur.nom_auteur, GROUP_CONCAT(motcle.motCle) as mots_cle')
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
        $auteurModel = new AuteurModel();
        $associeModel = new AssocieModel();
        $motcleModel = new MotcleModel();


        $auteurId = $auteurModel->getOrCreateAuteur($auteur);


        $data = [
            'titre_livre' => $titreLivre,
            'theme_livre' => $themeLivre,
        ];
        $this->insert($data);
        $livreId = $this->insertID();
        $associeModel->insert(['code_catalogue' => $livreId, 'id_auteur' => $auteurId]);
        $motsCleArray = explode(',', $motCle);
        foreach ($motsCleArray as $motCle) {
            $motCleId = $motcleModel->getOrCreateMotCle($motCle);
            $associeModel->insert(['code_catalogue' => $livreId, 'id_motcle' => $motCleId]);
        }

        return $livreId;
    }
}
