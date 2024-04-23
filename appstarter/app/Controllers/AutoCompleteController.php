<?php

namespace App\Controllers;

use App\Models\AbonneModel;

class AutoCompleteController extends BaseController
{
    public function autocomplete()
{
    $abonneModel = new AbonneModel();
    $term = $this->request->getGet('query');

    if ($term) {
        $results = $abonneModel->searchByName($term);
        return $this->response->setJSON($results);
    } else {
        return $this->response->setJSON([]);
    }
}
}