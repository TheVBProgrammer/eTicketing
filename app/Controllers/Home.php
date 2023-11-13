<?php

namespace App\Controllers;

use CodeIgniter\Shield\Entities\User;

class Home extends BaseController
{
    public function index(): string
    {
        if(auth()->loggedIn()){
            $view='home/index';
        }else{
            $view='home/visitor';
        }
        return view($view);
    }
}
