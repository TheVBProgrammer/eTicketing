<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTickets extends Migration
{
    public function up()
    {
        // Build the fields
        $fields =[
            'ticket_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'auto_increment'=>true,
                'null'=>false
            ],
            'user_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
                'null'=>false
            ],
            'ticket_number'=>[
                'type'=>'VARCHAR',
                'constraint'=>30,
                'null'=>false
            ],
            'firstname'=>[
                'type'=>'VARCHAR',
                'constraint'=>30,
                'null'=>false
            ],
            'lastname'=>[
                'type'=>'VARCHAR',
                'constraint'=>30,
                'null'=>false
            ],
            'priority_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'null'=>false
            ],
            'office_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'null'=>false
            ],
            'description'=>[
                'type'=>'TEXT',
                'null'=>false
            ],
            'remarks'=>[
                'type'=>'TEXT',
                'null'=>true
            ],
            'category_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'null'=>false
            ],
            'status_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'null'=>false
            ],
            'created_at'=>[
                'type'=>'DATETIME',
                'null'=>true
            ],
            'updated_at'=>[
                'type'=>'DATETIME',
                'null'=>true
            ],
        ];
        // generate table
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('ticket_id');
        $this->forge->addUniqueKey(['user_id','ticket_number']);
        //Disable Checking
        $this->db->disableForeignKeyChecks();
        // Add Foreign Keys
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('priority_id', 'priority', 'priority_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('office_id', 'office', 'office_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('category_id', 'category', 'category_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('status_id', 'status', 'status_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tickets');
        // Turn on again
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('tickets');
    }
}
