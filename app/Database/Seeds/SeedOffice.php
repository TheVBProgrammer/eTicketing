<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedOffice extends Seeder
{
    public function run()
    {
        $data = [
            [
                'office_name' => 'Department of Science and Technology',
                'office_code' => 'DOST',
                'office_type_id'=>1,
                'description'=>'DOST Office Region IX'
            ],
            [
                'office_name' => 'Zamboanga City Electric Cooperative, Inc.',
                'office_code' => 'ZAMCELCO',
                'office_type_id'=>1,
                'description'=>'ZAMCELCO Cooperative under NEA'
            ],
            [
                'office_name' => 'Department of Agrarian Reform',
                'office_code' => 'DAR',
                'office_type_id'=>2,
                'description'=>'DILG-DAR'
            ]
        ];
        // Insert data into the 'office' table
        $this->db->table('office')->insertBatch($data);
    }
}
