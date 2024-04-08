<?php

namespace App\Controllers;

class AbonneController extends BaseController
{
    public function index()
    {
    $gestionAboModel = model(\App\Models\AbonneModel::class);

    $abonnes = $gestionAboModel->getAbonnes();
    var_dump($abonnes);
        $template =
            view('templates/gestionHeader.php') .
            view('gestionAbo.php') .
            view('templates/footer.php');
        return $template;
    }

    

}