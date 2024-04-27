<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SubscriberFilter extends AuthenticatedFilter
{
    public function before(RequestInterface $request, $args = null)
    {
        $session = session();
        if ($session->has('role') && $session->get('role') == 'user') {
            return $request;
        } else {
            return redirect()->to('login');
        }
    }
}