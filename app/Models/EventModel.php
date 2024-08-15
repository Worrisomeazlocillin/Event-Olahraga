<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'description', 'date', 'location', 
        'registration_start', 'registration_end'
    ];
}
