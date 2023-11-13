<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddOffice extends Migration
{
    public function up()
    {
        // Build the fields
        $fields =[
            'office_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'auto_increment'=>true,
                'null'=>false
            ],
            'office_name'=>[
                'type'=>'VARCHAR',
                'constraint'=>100,
                'null'=>false
            ],
            'office_code'=>[
                'type'=>'VARCHAR',
                'constraint'=>10,
                'null'=>false
            ],
            'office_type_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'null'=>false
            ],
            'description'=>[
                'type'=>'VARCHAR',
                'constraint'=>100,
                'null'=>false
            ]
        ];
        // generate table
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('office_id');
        $this->forge->addUniqueKey('office_name');
        $this->forge->createTable('office');
    }

    public function down()
    {
        $this->forge->dropTable('office');
    }
}
