<?php

namespace App\Controllers;

class AbonneController extends BaseController
{
    public function index()
    {
        $gestionAboModel = model(\App\Models\AbonneModel::class);
        $abonnes = $gestionAboModel->getAbonnes();
        $data['abonnes'] = $abonnes; // On passe les livres sur la vue
        //var_dump($abonnes);
        $template =
            view('templates/gestionHeader.php') .
            view('gestionLivres.php', $data) .
            view('templates/footer.php');
        return $template;
    }
}