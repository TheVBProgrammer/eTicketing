<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Components\CategoriesHelper;

class CategoriesController extends BaseController
{
    public function index()
    {
        $cat_helper=new CategoriesHelper();
        $records=$cat_helper->getAllCategories();
        return view('master-file/catalog/categories/index',['records'=>$records]);
    }

}
