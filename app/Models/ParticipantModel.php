<?php

namespace App\Models;

use CodeIgniter\Model;

class ParticipantModel extends Model
{
    protected $table      = 'participants';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'event_id', 'name', 'email', 'phone', 'umur', 'alamat',
        'tempat_tanggal_lahir', 'jenis_kelamin' // Pastikan ini ada
    ];
}
