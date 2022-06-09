<?php namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = "guru";
    protected $allowedFields = [
        'nis',
        'nama',
        'jk',
        'ttl',
        'alamat',
        'subject',
        'phone',
        'email',
    ];
}