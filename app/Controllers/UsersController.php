<?php

namespace App\Controllers;

use App\Components\CategoriesHelper;
use App\Controllers\BaseController;
use App\Models\AuthIdentities;
use App\Models\User;

class UsersController extends BaseController
{
    public function index()
    {
        $cat_helper=new CategoriesHelper();
        $records=$cat_helper->getAllUsers();
        return view('management/index',['records'=>$records]);
    }
    public function update($id=null){
        if($this->request->getPost()){
            $data= $this->request->getPost();
            //echo "<pre>";
            //var_dump($data);
            //echo "</pre>";
            //exit;
            //Update user data
            $user=new User();
            unset($data->id);
            $user->update($id,$data);
            // Password if there are password entered
            if($data['password']!=''){
                $auth_identities=new AuthIdentities();
                $newPassword=$data['password'];
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $auth_data=[
                    'secret2'=>$hashedPassword
                ];
                $auth_identities->update($id,$auth_data);
            }
            // redirect
            return redirect()->to('/management/users');
        }
        $user=new User();
        $model=$user->select("*")
            ->join('auth_identities','auth_identities.user_id=users.id')
            ->where('users.id',$id)->findAll()[0];
        //echo "<pre>";
        //var_dump($model);
        //echo "</pre>";
        //exit;
        return view('management/register',['model'=>$model]);
    }
}
