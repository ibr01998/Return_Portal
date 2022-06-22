<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customers extends Migration
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
            'firstname' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'lastname' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'street' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'number' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'zip' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'country_iso2' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_date datetime default current_timestamp',
            'updated_date datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('customers_info');
    }

    public function down()
    {
        $this->forge->dropTable('customer_info');
    }
}
