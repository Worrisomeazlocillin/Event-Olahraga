<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEventIdToParticipant extends Migration
{
    public function up()
    {
        $this->forge->addColumn('participant', [
            'event_id' => [
                'type' => 'INT',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('participant', 'event_id');
    }
}
