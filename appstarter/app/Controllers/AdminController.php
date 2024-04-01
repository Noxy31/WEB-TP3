<?php


namespace App\Controllers;

class AdminController extends BaseController
{
    public function index()
    {
        $template =
            view('templates/adminHeader.php') .
            view('admin_home.php') .
            view('templates/footer.php');
        return $template;
    }
}