<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class RolesController extends BaseController
{
    public function index()
    {
        if($this->request->getPost()){
            $data=$this->request->getPost();
            $user=new User();
            $item=$user->find($data['user_id']);
            $data['username']=$item['username'];
        }else{
            $data=[
                'user_id'=>null,
                'username'=>null
            ];
        }
        //echo "<pre>";
        //var_dump($data);
        //echo "</pre>";
        //exit;
        return view('management/roles',['data'=>$data]);
    }
}
