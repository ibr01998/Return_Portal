<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Returns extends Migration
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
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'shop_id' => [
              'type' => 'INT',
              'constraint' => 5,
              'unsigned' => true,
            ],
            'order_id' => [
              'type' => 'INT',
              'constraint' => 5,
              'unsigned' => true,
            ],
            'return_reason' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'shipping_type' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['rejected', 'pending', 'accepted'],
                'default' => 'pending',
            ],
            'rejection_reason' => [
                'type' => 'Text',
                'null' => true
            ],
            'created_date datetime default current_timestamp',
            'updated_date datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('returns');
    }

    public function down()
    {
        $this->forge->dropTable('returns');
    }
}
