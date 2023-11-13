<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedCategory extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category_group_id' => 1,
                'category_name' => 'Software Issues',
            ],
            [
                'category_group_id' => 1,
                'category_name' => 'Hardware Issues',
            ],
            [
                'category_group_id' => 1,
                'category_name' => 'Network Issues',
            ],
            [
                'category_group_id' => 2,
                'category_name' => 'Maintenance Request',
            ],
            [
                'category_group_id' => 2,
                'category_name' => 'Cleanliness Issues',
            ],
            [
                'category_group_id' => 2,
                'category_name' => 'Security Concerns',
            ],
            [
                'category_group_id' => 3,
                'category_name' => 'Billing Inquiries',
            ],
            [
                'category_group_id' => 3,
                'category_name' => 'Product Feedback',
            ],
            [
                'category_group_id' => 3,
                'category_name' => 'General Inquiries',
            ],
            [
                'category_group_id' => 4,
                'category_name' => 'Leave Request',
            ],
            [
                'category_group_id' => 4,
                'category_name' => 'Employee Relations',
            ],
            [
                'category_group_id' => 4,
                'category_name' => 'Training and development',
            ],
            [
                'category_group_id' => 5,
                'category_name' => 'Invoices Issues',
            ],
            [
                'category_group_id' => 5,
                'category_name' => 'Expense Claims',
            ],
            [
                'category_group_id' => 5,
                'category_name' => 'Budget Inquiries',
            ],
            [
                'category_group_id' => 6,
                'category_name' => 'Login Problems',
            ],
            [
                'category_group_id' => 6,
                'category_name' => 'Navigation Assistance',
            ],
            [
                'category_group_id' => 6,
                'category_name' => 'Bug Reports',
            ],
            [
                'category_group_id' => 7,
                'category_name' => 'Incident Reporting',
            ],
            [
                'category_group_id' => 7,
                'category_name' => 'Safety Concerns',
            ],
            [
                'category_group_id' => 7,
                'category_name' => 'Emergency Evacuation',
            ],
        ];
        // Insert data into the 'category' table
        $this->db->table('category')->insertBatch($data);
    }
}
