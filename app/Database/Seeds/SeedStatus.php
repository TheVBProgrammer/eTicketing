<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedStatus extends Seeder
{
    public function run()
    {
        $data = [
            [
                'status' => 'Draft',
                'icon_class'=>'fas fa-file',
                'btn_class'=>'bg-default'
            ],
            [
                'status' => 'Pending',
                'icon_class'=>'fas fa-clock',
                'btn_class'=>'bg-info'
            ],
            [
                'status' => 'Processing',
                'icon_class'=>'fas fa-cog',
                'btn_class'=>'bg-primary'
            ],
            [
                'status' => 'Resolved',
                'icon_class'=>'fas fa-check-circle',
                'btn_class'=>'bg-success'
            ]
        ];
        // Insert data into the 'status' table
        $this->db->table('status')->insertBatch($data);
    }
}
