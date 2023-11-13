<?php
/* Date: November 11, 2023 10:20 PM
 * Author: Nolan F. Sunico
 * Project: eTicketing System
 * Module Class: CategoriesHelper
 * This Helper will provide functionality to eticketing system
 */
namespace App\Components;

use App\Models\Category;
use App\Models\CategoryGroup;
use App\Models\Office;
use App\Models\OfficeType;
use App\Models\Priority;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;

class CategoriesHelper
{
    /**
     * @return array
     */
    public function getAllCategories(){
        $categories=new Category();
        $categories->join('category_group','category_group.category_group_id=category.category_group_id');
        return $categories->select('*')->orderBy('category_name','ASC')->findAll();
    }

    /**
     * @return array
     */
    public function getPriority(){
        $priority=new Priority();
        return $priority->select("priority_id as id, priority as value")->orderBy('priority','ASC')->findAll();
    }
    public function getOfficeType(){
        $office_type=new OfficeType();
        return $office_type->select('office_type_id as id, office_type as value')
            ->orderBy('office_type')
            ->findAll();
    }
    /**
     * @return array
     */
    public function getPriorityByGroup($is_admin=true){
        //Get the current user_id
        $user_id=auth()->user()->id;
        $tickets=new Ticket();
        if($is_admin){ // Admin all
            return $tickets->select('tickets.priority_id, priority, count(*) AS priority_count')
                ->join('priority','priority.priority_id=tickets.priority_id')
                ->groupBy('priority_id')
                ->findAll();
        }else{
            return $tickets->select('tickets.priority_id, priority, count(*) AS priority_count')
                ->join('priority','priority.priority_id=tickets.priority_id')
                ->where('user_id',$user_id)
                ->groupBy('priority_id')
                ->findAll();
        }
    }

    /**
     * @description Get the total status count group by status_id
     * @return array
     */
    public function getStatusByGroup($is_admin=true){
        //Get the current user_id
        $user_id=auth()->user()->id;
        $tickets=new Ticket();
        if($is_admin) { // Admin all
            return $tickets->select('tickets.status_id, status, count(*) AS status_count')
                ->join('status', 'status.status_id=tickets.status_id')
                ->groupBy('status_id')
                ->findAll();
        }else{
            return $tickets->select('tickets.status_id, status, count(*) AS status_count')
                ->join('status', 'status.status_id=tickets.status_id')
                ->where('user_id',$user_id)
                ->groupBy('status_id')
                ->findAll();
        }
    }
    /**
     * @return array
     */
    public function getStatus($hide_draft=false){
        $status = new Status();
        if($hide_draft){
            $query=$status->select("status_id as id, status as value")
                ->where('status_id>',1)
                ->orderBy('status_id','ASC')
                ->findAll();
        }else{
            $query=$status->select("status_id as id, status as value")
                ->orderBy('status_id','ASC')
                ->findAll();
        }
        return $query;
    }

    /**
     * @return array
     */
    public function getOfficeSelect(){
        $office=new Office();
        return $office->select("office_id as id, office_name as value")->orderBy('office_name','ASC')->findAll();
    }
    /**
     * @return array
     */
    public function getCategory(){
        $category=new Category();
        return $category->select("*")
            ->join('category_group','category_group.category_group_id=category.category_group_id')
            ->orderBy('category_group_name','ASC')->findAll();
    }

    /**
     * @return array
     */
    public function getAllCategoryGroup(){
        $category_group=new CategoryGroup();
        //echo $category_group->select('*')->orderBy('category_group_id','ASC')->builder()->getCompiledSelect();
        //exit;
        return $category_group->select('*')->orderBy('category_group_id','ASC')->findAll();
    }

    /**
     * @return array
     */
    public function getAllOffice(){
        $office=new Office();
        $office->join('office_type','office_type.office_type_id=office.office_type_id');
        //echo $category_group->select('*')->orderBy('category_group_id','ASC')->builder()->getCompiledSelect();
        //exit;
        return $office->select('*')->orderBy('office_id','ASC')->findAll();
    }

    /**
     * @return array
     */
    public function getAllOfficeType(){
        $office_type=new OfficeType();
        return $office_type->select('*')->orderBy('office_type_id','ASC')->findAll();
    }

    /**
     * @return array
     */
    public function getAllUsers(){
        $users = new User();
        return $users->select('*')->orderBy('username','ASC')->findAll();
    }

    /**
     * @return array
     */
    public function getAllUsersSelect(){
        $users = new User();
        return $users->select('id, username as value')->orderBy('username','ASC')->findAll();
    }
    /**
     * @return array
     */
    public function getAllTickets($user_id=null){
        $tickets=new Ticket();
        if(!$user_id) {// Allow all tickets for admin role
            return $tickets->select('*, tickets.description as office_description,priority.btn_class as priority_class')
                ->join('auth_identities', 'auth_identities.user_id=tickets.user_id')
                ->join('priority', 'priority.priority_id=tickets.priority_id')
                ->join('office', 'office.office_id=tickets.office_id')
                ->join('category', 'category.category_id=tickets.category_id')
                ->join('status', 'status.status_id=tickets.status_id')
                ->orderBy('ticket_number', 'ASC')
                //->builder()->getCompiledSelect();
                ->findAll();
        }else{ // this is for his/her generated tickets only
            return $tickets->select('*, tickets.description as office_description,priority.btn_class as priority_class')
                ->join('auth_identities', 'auth_identities.user_id=tickets.user_id')
                ->join('priority', 'priority.priority_id=tickets.priority_id')
                ->join('office', 'office.office_id=tickets.office_id')
                ->join('category', 'category.category_id=tickets.category_id')
                ->join('status', 'status.status_id=tickets.status_id')
                ->where('tickets.user_id',$user_id)
                ->orderBy('ticket_number', 'ASC')
                //->builder()->getCompiledSelect();
                ->findAll();
        }
    }
}