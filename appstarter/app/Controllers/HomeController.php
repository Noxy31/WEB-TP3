<?php

namespace App\Controllers;

class HomeController extends AbstractController
{
    protected $template = '';

    public function home()
    {
        $session = session();
        if ($session->has('role') && $session->get('role') == 'user') {
            $this->template = 'abonne_home';
        } elseif ($session->has('role') && $session->get('role') == 'admin') {
            $this->template = 'admin_home';
        } else {
            return redirect()->to('login');
        }

        return $this->index();
    }
}
