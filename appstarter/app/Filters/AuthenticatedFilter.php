<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthenticatedFilter implements FilterInterface
{
    public function before(RequestInterface $request, $args = null)
    {
        $session = session();
        if ($session->has('loggedIn') && $session->get('loggedIn') == true) {
            return $request;
        } else {
            return redirect()->to('login');
        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $args = null)
    {

    }
}