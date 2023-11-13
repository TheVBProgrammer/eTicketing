<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Auth implements FilterInterface
{

    /**
     * @inheritDoc
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        helper('auth');
        if(!auth()->loggedIn()){
            return redirect()->to(base_url('login'));
        }
    }

    /**
     * @inheritDoc
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // TODO: Implement after() method.
    }
}