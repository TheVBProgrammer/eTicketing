<?php

namespace App\Controllers;

use App\Components\CategoriesHelper;
use App\Controllers\BaseController;
use App\Models\AuthGroupUsers;
use App\Models\Ticket;
use App\Models\User;
use CodeIgniter\HTTP\Response;
use App\Components\ComponentHelper;

class SupportController extends BaseController
{
    public function index()
    {
        $cat_helper=new CategoriesHelper();
        $comp_helper=new ComponentHelper();
        // checks if the current user is an admin
        $is_admin=$comp_helper->CheckCurrentRole('admin');
        if($is_admin){
            $records=$cat_helper->getAllTickets();
        }else{
            $user_id=auth()->user()->id;
            $records=$cat_helper->getAllTickets($user_id);
        }

        return view('support/index',['records'=>$records,'is_admin'=>$is_admin]);
    }
    public function generate_form(){
        $data=[
            'firstname'=>'',
            'lastname'=>'',
            'email'=>'',
            'priority_id'=>1,
            'office_id'=>1,
            'description'=>'',
            'remarks'=>'',
            'category_id'=>1,
            'status_id'=>1,
            'user_id'=>auth()->id(),
            'ticket_number'=>date("Y-m-his"),
            'created_at'=>date("Y-m-d h:i:s")
        ];
        return view('support/create',['data'=>$data]);
    }
    public function generate_edit_form($id=null){
        $ticket=new Ticket();
        $data=$ticket->find($id);
        return view('support/update',['data'=>$data]);
    }
    /**
     * @throws \ReflectionException
     */
    public function update($id=null){
        $ticket=new Ticket();
        $data =$this->request->getPost();
        //echo "<pre>";
        //var_dump($data);
        //echo "</pre>";
        //exit;
        unset($data->ticket_id);
        // Validate
        if(!$ticket->validate($data)){
            $response = array(
                'status' => 'error',
                'error' => true,
                'messages' => $ticket->errors()
            );
            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)->setJSON($response);
        }
        if(!$ticket->update($id,$data)){
            $response = array(
                'status' => 'error',
                'error' => true,
                'messages' => $ticket->errors()
            );
            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)->setJSON($response);
        }
        // redirect
        return redirect()->to('/tracking/support/tickets');
    }
    public function remove_group($id,$group){
        $auth_group_users=new AuthGroupUsers();
        $group_user=$auth_group_users->where('user_id',$id)
            ->where('group',$group)
            ->findAll();
        //->builder()->getCompiledSelect();
        //remove
        $group_id=$group_user[0]['id'];
        $auth_group_users->delete($group_id);
        // redirect
        return redirect()->to('/management/roles/assign');
    }
    public function save_group($id,$group){
        $auth_group_users=new AuthGroupUsers();
        $query=$auth_group_users->where('user_id',$id)
            ->where('group',$group)
            ->findAll();
            //->builder()->getCompiledSelect();
        if(!$query){
            $data=[
                'user_id'=>$id,
                'group'=>$group,
                'created_at'=>date("Y-m-d h:i:s")
            ];
            $auth_group_users->insert($data);
        }
        // redirect
        return redirect()->to('/management/roles/assign');
    }
    public function create(){
        $ticket=new Ticket();
        $data=$this->request->getPost();
        //echo "<pre>";
        //var_dump($data);
        //echo "</pre>";
        //exit;
        if(!$ticket->validate($data)){
            $response = array(
                'status' => 'error',
                'error' => true,
                'messages' => $ticket->errors()
            );
            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)->setJSON($response);
        }
        // Insert record
        if(!$ticket->insert($data)){
            $response = array(
                'status' => 'error',
                'error' => true,
                'messages' => $ticket->errors()
            );
            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)->setJSON($response);
        }
        // redirect
        return redirect()->to('/tracking/support/tickets');
    }
}
