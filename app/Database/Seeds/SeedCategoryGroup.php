<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedCategoryGroup extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category_group_name' => 'IT Support',
            ],
            [
                'category_group_name' => 'Facilities Management',
            ],
            [
                'category_group_name' => 'Customer Service',
            ],
            [
                'category_group_name' => 'Human Resources',
            ],
            [
                'category_group_name' => 'Finance',
            ],
            [
                'category_group_name' => 'Website/App Support',
            ],
            [
                'category_group_name' => 'Health and Safety',
            ],
            [
                'category_group_name' => 'Educational Services',
            ],
            [
                'category_group_name' => 'Transporationt Services',
            ],
            [
                'category_group_name' => 'Public Relations',
            ]
        ];
            // Insert data into the 'category_group' table
            $this->db->table('category_group')->insertBatch($data);
    }
}
