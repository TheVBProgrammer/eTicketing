<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterOffice extends Migration
{
    public function up()
    {
        // Add the foreign key column if it doesn't exist
        if (! $this->db->fieldExists('office_type_id', 'office')) {
            $this->forge->addColumn('office', [
                'office_type_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                ],
            ]);
        }
        // Add foreign key
        $this->forge->addForeignKey('office_type_id', 'office', 'office_type_id','CASCADE', 'CASCADE');
    }

    public function down()
    {
        // Remove foreign key
        $this->forge->dropForeignKey('office','tbl_office_type_ibfk_1');
    }
}
