<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatus extends Migration
{
    public function up()
    {
        // Build the fields
        $fields =[
            'status_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'auto_increment'=>true,
                'null'=>false
            ],
            'status'=>[
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
        $this->forge->addPrimaryKey('status_id');
        $this->forge->addUniqueKey('status');
        $this->forge->createTable('status');
    }

    public function down()
    {
        $this->forge->dropTable('status');
    }
}
