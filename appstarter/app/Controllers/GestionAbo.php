<?php

namespace App\Controllers;

class GestionAbo extends BaseController
{
    public function index()
    {
    $gestionAboModel = model(\App\Models\AbonneModel::class);
    var_dump($gestionAboModel);
    $gestionAboModel->select();
        $template =
            view('templates/gestionHeader.php') .
            view('gestionAbo.php') .
            view('templates/footer.php');
        return $template;
    }

    

}