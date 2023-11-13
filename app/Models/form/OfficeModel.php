<?php

namespace App\Models\form;

use App\Models\Office;

/**
 *
 */
class OfficeModel
{
    public $office_id;
    public $office_name;
    public $office_code;
    public $office_type_id;
    public $description;
    public $is_newrecord;

    public function __construct($office_id=null,$office_name=null,$office_code=null,$office_type_id=null,$description=null){
        $this->office_id=$office_id;
        if($office_id){
            $office=new Office();
            $model=$office->select("*")->where('office_id',$office_id)->find()[0];
            if($model){
                $this->is_newrecord=false;
            }else{
                $this->is_newrecord=true;
            }
            $this->office_code=$model['office_code'];
            $this->office_name=$model['office_name'];
            $this->office_type_id=$model['office_type_id'];
            $this->description=$model['description'];
        }else{
            $this->office_code=$office_code;
            $this->office_name=$office_name;
            $this->office_type_id=$office_type_id;
            $this->description=$description;
        }

    }
    public function getOffice_id(){
        return $this->office_id;
    }
    public function getOffice_name(){
        return $this->office_name;
    }
    public function getOffice_code(){
        return $this->office_code;
    }
    public function getOffice_type_id(){
        return $this->office_type_id;
    }
    public function getDescription(){
        return $this->description;
    }
}