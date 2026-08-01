<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEpisodesTable extends Migration
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
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'null'       => true,
            ],
            'episode_no' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            // Embed URL dari penyedia layanan streaming resmi (yang punya izin/API)
            'video_url' => [
                'type' => 'TEXT',
            ],
            // Nama provider resmi, contoh: "CrunchyrollEmbed", "MuseAsiaAPI", dll
            'video_provider' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'duration' => [
                // dalam detik
                'type'       => 'INT',
                'constraint' => 6,
                'null'       => true,
            ],
            'release_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey(['anime_id', 'episode_no']); // 1 anime tidak boleh punya episode_no ganda
        $this->forge->addForeignKey('anime_id', 'animes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('episodes');
    }

    public function down()
    {
        $this->forge->dropTable('episodes');
    }
}
