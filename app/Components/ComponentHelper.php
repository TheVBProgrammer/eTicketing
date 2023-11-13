<?php

namespace App\Components;

class ComponentHelper
{
    /**
     * @param string $id
     * @param array $data
     * @param null $defaultVal
     * @param string $placeholder
     * @param bool $isrequired
     * @return string
     */
    public function generateSelect(string $id, array $data, $defaultVal=null, string $placeholder='Select Item', bool $isrequired=true,bool $is_readonly=false){
        if($isrequired){
            $required='required';
        }else{
            $required='';
        }
        if($is_readonly){
            $readonly='readonly';
        }else{
            $readonly='';
        }
        $select="<select class='form-control custom-select' $readonly name='$id' id='$id' $required>";
        $select.="<option value=''>$placeholder</option>";
        foreach($data as $item){
            if($item["id"]==$defaultVal){
                $selected='selected';
            }else{
                $selected='';
            }
            $select.="<option value='$item[id]' $selected>$item[value]</option>";
        }
        $select.="</select>";
        return $select;
    }

    /**
     * @param $default_category_id
     * @return string
     */
    public function generateCategorySelect($id,$default_category_id,$is_required=true,bool $is_readonly=false){
        $cat_comp =new CategoriesHelper();
        $data=$cat_comp->getCategory();

        if($is_required){
            $required='required';
        }else{
            $required='';
        }
        if($is_readonly){
            $readonly='readonly';
        }else{
            $readonly='';
        }
        $select="<select class='form-control custom-select' $readonly name='$id' id='$id' $required>";
        $select.="<option value=''>Select Category</option>";
        $prev_category_group="";
        foreach($data as $item){
            $category_group=$item['category_group_name'];
            if($prev_category_group!=$category_group){
                $select.="<optgroup label='$item[category_group_name]'>$item[category_group_name]</optgroup>";
                $prev_category_group=$category_group;
            }
            if($item["category_id"]==$default_category_id){
                $selected='selected';
            }else{
                $selected='';
            }
            $select.="<option value='$item[category_id]' $selected>$item[category_name]</option>";
        }
        $select.="</select>";
        return $select;
    }

    /**
     * @param $role
     * @return bool
     */
    public function CheckCurrentRole($role): bool
    {
        $userRoles=auth()->user()->getGroups();
        $result=false;
        if (in_array($role, $userRoles))
        {
            //'User that specific role.';
            $result=true;
        }
        return $result;
    }
}