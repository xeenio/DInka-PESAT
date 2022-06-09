<?php namespace App\Models;

use CodeIgniter\Model;

class MapelModel extends Model
{
    protected $table = "mapel";
    protected $allowedFields = [
        'mapel',
        'kelas',
        ];
}