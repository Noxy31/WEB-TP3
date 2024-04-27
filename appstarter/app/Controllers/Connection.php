<?php

namespace App\Controllers;

class Connection extends BaseController
{
    public function index()
    {
        $template =
            view('templates/gestionHeader.php') .
            view('login_form.php') .
            view('templates/footer.php');
        return $template;
    }

    private function loginUser(?object $user = null)
    {
        $session = session();
        if (isset($user)) {
            $session->set([
                'username' => $user->nom_abonne,
                'matricule' => $user->matricule_abonne,
                'role' => 'user',
                'loggedIn' => true
            ]);
        } else {
            $session->set([
                'username' => 'Administrator',
                'role' => 'admin',
                'loggedIn' => true
            ]);
        }
        return redirect()->to("home");
    }

    public function attemptLogin()
    {
        $abonneModel = new \App\Models\AbonneModel();
        $values = $this->request->getPost(['login', 'password']);
        if (
            !empty($values) && $values['login'] == APP_ADMIN_LOGIN &&
            $values['password'] == APP_ADMIN_PASSWORD
        ) {
            return $this->loginUser();
        }
        $rechercheAbonne = $abonneModel->getAbonneByMatricule($values['login']);
        if ($rechercheAbonne !== null) {
            if ($rechercheAbonne->nom_abonne === $values['password']) {
                return $this->loginUser($rechercheAbonne);
            }
        }

        return redirect()->to('login');
    }
}
