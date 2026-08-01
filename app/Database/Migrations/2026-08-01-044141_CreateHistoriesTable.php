<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHistoriesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'episode_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'watched_duration' => [
                // detik terakhir ditonton, untuk fitur "lanjutkan nonton"
                'type'       => 'INT',
                'constraint' => 6,
                'default'    => 0,
            ],
            'last_watched_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey(['user_id', 'episode_id']); // update baris yg sama tiap nonton ulang
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('episode_id', 'episodes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('histories');
    }

    public function down()
    {
        $this->forge->dropTable('histories');
    }
}
