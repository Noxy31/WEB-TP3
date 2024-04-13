<?php

namespace App\Controllers;

class LivresController extends BaseController
{
    public function index()
    {
        //$gestionLivresModel = model(\App\Models\LivresModel::class);
        // $livres = $gestionLivresModel->getLivres();
        // $data['lives'] = $livres; // On passe les livres sur la vue
        //var_dump($livres);
        $template =
            view('templates/gestionHeader.php') .
            view('gestionLivres.php') .
            view('templates/footer.php');
        return $template;
    }
}