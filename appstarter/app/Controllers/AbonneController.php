<?php

namespace App\Controllers;

class AbonneController extends BaseController
{
    public function index()
    {
    $gestionAboModel = model(\App\Models\AbonneModel::class);
    $abonnes = $gestionAboModel->getAbonnes();
    $data['abonnes'] = $abonnes; // Passer les abonnés à la vue
    //var_dump($abonnes);
        $template =
            view('templates/gestionHeader.php') .
            view('gestionAbo.php', $data) .
            view('templates/footer.php');
        return $template;
    }

    

}