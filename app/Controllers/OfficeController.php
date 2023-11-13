<?php

namespace App\Controllers;

use App\Components\CategoriesHelper;
use App\Controllers\BaseController;
use App\Models\Office;

class OfficeController extends BaseController
{
    public function index()
    {
        $cat_helper=new CategoriesHelper();
        $records=$cat_helper->getAllOffice();
        return view('master-file/catalog/offices/index',['records'=>$records]);
    }
    public function create(){
        $office=new Office();

        return view('master-file/catalog/offices/create',['office'=>$office]);
    }
}
