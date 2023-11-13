<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedPriority extends Seeder
{
    public function run()
    {
        $data = [
            [
                'priority' => 'Low',
                'icon_class'=>''
            ],
            [
                'priority' => 'Medium',
            ],
            [
                'priority' => 'High',
            ],
            [
                'priority' => 'Critical',
            ]
        ];
        // Insert data into the 'priority' table
        $this->db->table('priority')->insertBatch($data);
    }
}
