<?php

namespace App\Controllers;

use App\Components\CategoriesHelper;
use App\Controllers\BaseController;

class OfficeTypeController extends BaseController
{
    public function index()
    {
        $cat_helper=new CategoriesHelper();
        $records=$cat_helper->getAllOfficeType();
        return view('master-file/catalog/office-type/index',['records'=>$records]);
    }
}
