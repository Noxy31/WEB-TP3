<?php


namespace App\Controllers;

class GestionAbo extends BaseController
{
    public function index()
    {
        $template =
            view('templates/gestionHeader.php') .
            view('gestionAbo.php') .
            view('templates/footer.php');
        return $template;
    }
}