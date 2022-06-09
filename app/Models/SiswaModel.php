<?php namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = "siswa";
    protected $allowedFields = [
        'nis',
        'nama',
        'jk',
        'ttl',
        'alamat',
        'phone',
        'email',
        'kelas_id'
    ];
}