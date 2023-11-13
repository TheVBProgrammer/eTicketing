<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedOfficeType extends Seeder
{
    public function run()
    {
        $data = [
            [
                'office_type' => 'Office',
            ],
            [
                'office_type' => 'Department',
            ],
            [
                'office_type' => 'Division',
            ],
            [
                'office_type' => 'Section',
            ]
        ];
        // Insert data into the 'office_type' table
        $this->db->table('office_type')->insertBatch($data);
    }
}
