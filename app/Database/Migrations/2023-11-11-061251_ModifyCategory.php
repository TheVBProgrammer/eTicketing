<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyCategory extends Migration
{
    public function up()
    {
        // Add the foreign key column if it doesn't exist
        if (! $this->db->fieldExists('category_group_id', 'category')) {
            $this->forge->addColumn('category', [
                'category_group_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                ],
            ]);
        }
        // Add foreign key
        $this->forge->addForeignKey('category_group_id', 'category', 'category_group_id','CASCADE', 'CASCADE');
    }

    public function down()
    {
        // Remove foreign key
        $this->forge->dropForeignKey('category', 'tbl_category_ibfk_1');
    }
}
