<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoryGroup extends Migration
{
    public function up()
    {
        // Build the fields
        $fields =[
            'category_group_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'auto_increment'=>true,
                'null'=>false
            ],
            'category_group_name'=>[
                'type'=>'VARCHAR',
                'constraint'=>100,
                'null'=>false
            ],
        ];
        // generate table
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('category_group_id');
        $this->forge->createTable('category_group');
    }

    public function down()
    {
        $this->forge->dropTable('category_group');
    }
}
