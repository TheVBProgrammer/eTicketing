<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddOfficeType extends Migration
{
    public function up()
    {
        // Build the fields
        $fields =[
            'office_type_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'auto_increment'=>true,
                'null'=>false
            ],
            'office_type'=>[
                'type'=>'VARCHAR',
                'constraint'=>50,
                'null'=>false
            ]
        ];
        // generate table
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('office_type_id');
        $this->forge->addUniqueKey('office_type');
        $this->forge->createTable('office_type');
    }

    public function down()
    {
        $this->forge->dropTable('office_type');
    }
}
