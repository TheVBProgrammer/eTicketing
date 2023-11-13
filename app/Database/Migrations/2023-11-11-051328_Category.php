<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
{
    public function up()
    {
        // Build the fields
        $fields =[
            'category_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'auto_increment'=>true,
                'null'=>false
            ],
            'category_group_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'null'=>false
            ],
            'category_name'=>[
                'type'=>'VARCHAR',
                'constraint'=>100,
                'null'=>false
            ],
        ];
        // generate table
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('category_id');
        $this->forge->addUniqueKey('category_name');
        $this->forge->createTable('category');
    }

    public function down()
    {
        $this->forge->dropTable('category');
    }
}
