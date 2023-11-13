<?php

namespace App\Controllers;

use App\Components\CategoriesHelper;
use App\Controllers\BaseController;

class CategoryGroupController extends BaseController
{
    public function index()
    {
        $cat_helper=new CategoriesHelper();
        $records=$cat_helper->getAllCategoryGroup();
        return view('master-file/catalog/category-group/index',['records'=>$records]);
    }
}
