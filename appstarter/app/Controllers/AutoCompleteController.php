<?php

namespace App\Controllers;

use App\Models\AbonneModel;
use App\Models\LivresModel;

class AutoCompleteController extends BaseController
{
    public function autocompleteAbo()
    {
        $abonneModel = new AbonneModel();
        $livresModel = new LivresModel();
        $term = $this->request->getGet('query');

        if ($term) {
            $results = $abonneModel->searchByName($term);
            return $this->response->setJSON($results);
        } else {
            return $this->response->setJSON([]);
        }
    }

    public function autocompleteLivres()
    {
        $livresModel = new LivresModel();
        $term = $this->request->getGet('query');

        if ($term) {
            $results = $livresModel->searchByTitle($term);
            return $this->response->setJSON($results);
        } else {
            return $this->response->setJSON([]);
        }
    }
}
