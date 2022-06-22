<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Items extends Migration
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
            'return_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'sku' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'amount' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'created_date datetime default current_timestamp',
            'updated_date datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('items');
    }

    public function down()
    {
        $this->forge->dropTable('items');
    }
}
