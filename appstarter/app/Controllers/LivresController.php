<?php

namespace App\Controllers;

class LivresController extends BaseController
{
    public function index()
    {
        //$gestionAboModel = model(\App\Models\LivresModel::class);
        // $abonnes = $gestionAboModel->getAbonnes();
        // $data['abonnes'] = $abonnes; // On passe les livres sur la vue
        //var_dump($abonnes);
        $template =
            view('templates/gestionHeader.php') .
            view('gestionLivres.php') .
            view('templates/footer.php');
        return $template;
    }
}