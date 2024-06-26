<?php

namespace App\Models;

use CodeIgniter\Model;

class AuteurModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'auteur';
    protected $primaryKey = 'id_auteur';
    protected $allowedFields = [
        'nom_auteur',
    ];

    public function getAuteur()
    {
        return $this->findAll();
    }

    public function getAllowedFields() {
        return $this->allowedFields;
    }

    public function getOrCreateAuteur($nomAuteur) // Récupère les données d'un auteur, le crée le cas échéant
    {
        $auteur = $this->where('nom_auteur', $nomAuteur)->first();

        if ($auteur) {
            return $auteur['id_auteur']; // verifie si l'auteur existe deja
        }

        $this->insert(['nom_auteur' => $nomAuteur]); // le cree si il existe pas
        return $this->insertID();
    }
}