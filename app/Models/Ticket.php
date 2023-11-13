<?php

namespace App\Models;

use CodeIgniter\Model;

class Ticket extends Model
{
    protected $table            = 'tickets';
    protected $primaryKey       = 'ticket_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id','ticket_number','firstname','lastname','email','priority_id','office_id','description','remarks','category_id','status_id','created_at','updated_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'user_id'  => 'required|integer',
        'ticket_number'  => 'min_length[3]|max_length[30]',
        'priority_id'  => 'required|integer',
        'office_id'  => 'required|integer',
        'description'  => 'min_length[3]|max_length[255]',
        'category_id'  => 'required|integer',
        'status_id'  => 'required|integer',
        'email'=>'required|valid_email',
        'created_at'=>'date'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
