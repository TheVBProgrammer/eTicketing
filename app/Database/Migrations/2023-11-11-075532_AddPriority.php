<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPriority extends Migration
{
    public function up()
    {
        // Build the fields
        $fields =[
            'priority_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'auto_increment'=>true,
                'null'=>false
            ],
            'priority'=>[
                'type'=>'VARCHAR',
                'constraint'=>100,
                'null'=>false
            ],
            'icon_class'=>[
                'type'=>'VARCHAR',
                'constraint'=>50,
                'null'=>false
            ],
            'btn_class'=>[
                'type'=>'VARCHAR',
                'constraint'=>50,
                'null'=>false
            ],
        ];
        // generate table
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('priority_id');
        $this->forge->addUniqueKey('priority');
        $this->forge->createTable('priority');
    }

    public function down()
    {
        $this->forge->dropTable('priority');
    }
}
