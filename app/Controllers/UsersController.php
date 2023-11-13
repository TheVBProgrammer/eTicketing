<?php

namespace App\Controllers;

use App\Components\CategoriesHelper;
use App\Controllers\BaseController;

class UsersController extends BaseController
{
    public function index()
    {
        $cat_helper=new CategoriesHelper();
        $records=$cat_helper->getAllUsers();
        return view('management/index',['records'=>$records]);
    }
    public function update(){
        if($this->request->getPost()){
            $data= $this->request->getJSON();

        }
        return view('management/register');
    }
}
