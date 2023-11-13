<?php

namespace App\Controllers;

use App\Components\CategoriesHelper;
use App\Controllers\BaseController;
use App\Models\form\OfficeModel;
use App\Models\Office;

class OfficeController extends BaseController
{
    public function index()
    {
        $cat_helper=new CategoriesHelper();
        $records=$cat_helper->getAllOffice();
        return view('master-file/catalog/offices/index',['records'=>$records]);
    }
    public function update($id=null){
        $post=$this->request->getPost();
        if($post){
            $office=new Office();
            unset($post->office_id);
            if(!$office->validate($post)){
                $response = array(
                    'status' => 'error',
                    'error' => true,
                    'messages' => $office->errors()
                );
                return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)->setJSON($response);
            }
            if(!$office->update($id,$post)){
                $response = array(
                    'status' => 'error',
                    'error' => true,
                    'messages' => $office->errors()
                );
                return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)->setJSON($response);
            }
            // redirect
            return redirect()->to('/master-file/catalog/office');
        }
        $officeModel=new OfficeModel($id);
        return view('master-file/catalog/offices/create',['officeModel'=>$officeModel]);
    }
    public function create(){
        $post=$this->request->getPost();
        if($post){
            $office=new Office();
            if(!$office->validate($post)){
                $response = array(
                    'status' => 'error',
                    'error' => true,
                    'messages' => $office->errors()
                );
                return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)->setJSON($response);
            }
            if(!$office->insert($post)){
                $response = array(
                    'status' => 'error',
                    'error' => true,
                    'messages' => $office->errors()
                );
                return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)->setJSON($response);
            }
            // redirect
            return redirect()->to('/master-file/catalog/office');
            //echo "<pre>";
            //var_dump($post);
            //echo "</pre>";
            //exit;
        }
        $officeModel=new OfficeModel();
        return view('master-file/catalog/offices/create',['officeModel'=>$officeModel]);
    }
}
