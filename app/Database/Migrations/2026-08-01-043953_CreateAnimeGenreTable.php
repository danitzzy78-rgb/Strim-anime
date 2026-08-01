<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAnimeGenreTable extends Migration
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
            'anime_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'genre_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey(['anime_id', 'genre_id']); // cegah duplikat pasangan
        $this->forge->addForeignKey('anime_id', 'animes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('genre_id', 'genres', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('anime_genre');
    }

    public function down()
    {
        $this->forge->dropTable('anime_genre');
    }
}
