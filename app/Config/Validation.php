<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
    public $siswa = [
		'nis' => 'required|integer',
		'nama' => 'required|string',
		'jk' => 'required|string',
		'ttl' => 'required',
		'alamat' => 'required',
		'email' => 'required',
		'phone' => 'required',
		'kelas_id' => 'required',
	];

    public $siswa_errors = [
		'nis' => [
			'required' => 'NIS wajib diisi',
			'integer' => 'NIS hanya dapat diisi angka',
		],
		'nama' => [
			'required' => 'Nama Siswa wajib diisi',
			'string' => 'Nama Siswa hanya dapat diisi huruf',
		],
		'jk' => [
			'required' => 'Jenis Kelamin wajib diisi',
			'string' => 'Jenis Kelamin hanya dapat diisi huruf',
		],
		'ttl' => [
			'required' => 'Tempat & Tanggal Lahir Lahir wajib diisi',
		],
        'alamat' => [
            'required' => 'Alamat wajib diisi',
        ],
		'email' => [
			'required' => 'Email wajib diisi',
		],
		'phone' => [
			'required' => 'No telepon wajib diisi',
		],
        'kelas_id' => [
			'required' => 'Kelas wajib diisi',
		],
	];

    public $kelas = [
		'nama' => 'required',
		'jumlah' => 'required',
		'total' => 'required',
	];

    public $kelas_errors = [
		'nama' => [
			'required' => 'Nama Kelas wajib diisi',
		],
		'jumlah' => [
			'required' => 'Jumlah wajib diisi',
		],
        'total' => [
            'required' => 'Total wajib diisi',
        ],
	];

    public $mapel = [
		'mapel' => 'required',
		'kelas' => 'required',
	];

    public $mapel_errors = [
		'mapel' => [
			'required' => 'Mata Pelajaran wajib diisi',
		],
        'kelas' => [
            'required' => 'Kelas wajib diisi',
        ],
	];

	public $guru = [
		'nama' => 'required|string',
		'jk' => 'required|string',
		'ttl' => 'required',
		'alamat' => 'required',
		'subject' => 'required',
		'phone' => 'required',
		'email' => 'required',
	];

    public $guru_errors = [
		'nama' => [
			'required' => 'Nama Siswa wajib diisi',
			'string' => 'Nama Siswa hanya dapat diisi huruf',
		],
		'jk' => [
			'required' => 'Jenis Kelamin wajib diisi',
			'string' => 'Jenis Kelamin hanya dapat diisi huruf',
		],
		'ttl' => [
			'required' => 'Tempat & Tanggal Lahir Lahir wajib diisi',
		],
        'alamat' => [
            'required' => 'Alamat wajib diisi',
        ],
		'subject' => [
			'required' => 'Subject wajib diisi',
		],
		'phone' => [
			'required' => 'No telepon wajib diisi',
		],
		'email' => [
			'required' => 'Email wajib diisi',
		],
	];
}
