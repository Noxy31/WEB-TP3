<?php

namespace App\Controllers;

class Connection extends BaseController
{
    public function index(): string
    {
        return view('login_form');
    }

    public function attemptLogin(): string
    {
        $values = $this->request->getPost(['login', 'password']);
        if (
            !empty($values) && $values['login'] == APP_ADMIN_LOGIN &&
            $values['password'] == APP_ADMIN_PASSWORD
        ) {
            return redirect()->to('/admin_home');
        } else {
            return "On a pas réussi à se connecter !";
        }
    }
}
