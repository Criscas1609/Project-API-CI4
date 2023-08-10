<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFoodTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'location' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'instruction' => [
                'type' => 'TEXT'
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status' => [
                'type' => 'BOOLEAN',
            ],
            
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('food');
    }

    public function down()
    {
        $this->forge->dropTable('food');
    }
}
