<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAnimesTable extends Migration
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
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 170,
            ],
            'synopsis' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'poster' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'banner' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'type' => [
                // TV, Movie, OVA, ONA, Special
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'default'    => 'TV',
            ],
            'status' => [
                // ongoing, completed
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'default'    => 'ongoing',
            ],
            'release_year' => [
                'type'       => 'SMALLINT',
                'constraint' => 4,
                'null'       => true,
            ],
            'studio' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'rating' => [
                'type'       => 'DECIMAL',
                'constraint' => '3,1',
                'null'       => true,
            ],
            'total_episode' => [
                'type'       => 'INT',
                'constraint' => 5,
                'default'    => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('slug');
        $this->forge->createTable('animes');
    }

    public function down()
    {
        $this->forge->dropTable('animes');
    }
}
