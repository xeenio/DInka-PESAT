<?php

namespace App\Controllers;

use App\Models\GuruModel;
use CodeIgniter\Controller;

class Guru extends Controller
{
    public function index()
    {
        $model = new GuruModel();
        $pager = \Config\Services::pager();
        $data['guru'] = $model->orderBy('id', 'ASC')->findAll();
        return view('guru/index', $data);
    }
    public function add() 
	{
		$this->session= \Config\Services::session();
		if(!isset($_SESSION['inputs'])){
			$data = array(
			'id'=> '',
			'nama'=> '',
			'jk'=>  '',
			'ttl'=>  '',
			'alamat'=>  '',
            'subject'=>  '',
            'email'=>  '',
            'phone'=>  '',
			);
			session()->setFlashdata('inputs', $data);
		}
		return view ('/guru/add');
	}

	public function save() 
	{
		helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $data = array(
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'jk' => $this->request->getPost('jk'),
            'ttl' => $this->request->getPost('ttl'),
            'alamat' => $this->request->getPost('alamat'),
            'subject' => $this->request->getPost('subject'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
        );

        if($validation->run($data, 'guru')) {
            $model = new GuruModel();
            $model->insert($data);
            session()->setFlashdata('success', 'Berhasil Menyimpan Data Guru' . $this->request->getPost('guru'));
            return redirect()->to(base_url('guru'));
        }else{
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('/guru/add'));
        }
	}

	public function edit($id){
		$this->session= \Config\Services::session();
		if(!isset($_SESSION['inputs'])){
			$data = array(
                'id'=> '',
                'nama'=> '',
                'jk'=>  '',
                'ttl'=>  '',
                'alamat'=>  '',
                'subject'=>  '',
                'email'=>  '',
                'phone'=>  '',
			);
			session()->setFlashdata('inputs', $data);
		}
		return view ('/guru/edit');
	}

    public function update() 
	{
		helper(['form', 'url']);
        $id = $this->request->getPost('id') ;
        $validation = \Config\Services::validation();
        $data = array(
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'jk' => $this->request->getPost('jk'),
            'ttl' => $this->request->getPost('ttl'),
            'alamat' => $this->request->getPost('alamat'),
            'subject' => $this->request->getPost('subject'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
        );

        if($validation->run($data, 'guru')) {
            $model = new GuruModel();
            $model->update($id, $data);
            session()->setFlashdata('success', 'Berhasil Mengupdate Data Guru' . $this->request->getPost('guru'));
            return redirect()->to(base_url('/guru'));
        }else{
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('/guru/edit/', $id));
        }
	}

    public function hapus($id)
    {
        $model = new GuruModel();
        $model->where('id', $id)->delete();
        session()->setFlashdata('success', 'Berhasil Menghapus Data Guru');
        return redirect()->to(base_url('/guru'));
    }
}
?>