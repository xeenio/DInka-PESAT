<?php

namespace App\Controllers;

use App\Models\KelasModel;
use CodeIgniter\Controller;

class Kelas extends Controller
{
    public function index()
    {
        $model = new KelasModel();
        $pager = \Config\Services::pager();
        $data['kelas'] = $model->orderBy('id', 'ASC')->findAll();
        return view('kelas/index', $data);
    }
    public function add() 
	{
        $this->session= \Config\Services::session();
		if(!isset($_SESSION['inputs'])){
            $data = array(
                'nama'=> '',
                'jumlah'=>  '',
                'total'=>  '',
            );
            session()->setFlashdata('inputs', $data);
        }
        $model = new KelasModel();
        $data1 = [
            'kelas' => $model->orderBy('id', 'ASC')->findAll(),
        ];
		return view ('/kelas/add', $data1);
	}
	public function save() 
	{
		helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'jumlah' => $this->request->getPost('jumlah'),
            'total' => $this->request->getPost('total'),
        );

        if($validation->run($data, 'kelas')) {
            $model = new KelasModel();
            $model->insert($data);
            session()->setFlashdata('success', 'Berhasil Menyimpan Data Kelas' . $this->request->getPost('kelas'));
            return redirect()->to(base_url('kelas'));
        }else{
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('/kelas/add'));
        }
	}

	public function edit($id){
		$this->session= \Config\Services::session();
		if(!isset($_SESSION['inputs'])){
			$data = array(
                'nama'=> '',
                'jumlah'=>  '',
                'total'=>  '',
			);
			session()->setFlashdata('inputs', $data);
		}
		$model = new KelasModel();
        $data1 = [
            'kelas' => $model->orderBy('id', 'ASC')->findAll(),
        ];
		return view ('/kelas/add', $data1);
	}

    public function update() 
	{
		helper(['form', 'url']);
        $id = $this->request->getPost('id') ;
        $validation = \Config\Services::validation();
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'jumlah' => $this->request->getPost('jumlah'),
            'total' => $this->request->getPost('total'),
        );

        if($validation->run($data, 'kelas')) {
            $model = new KelasModel();
            $model->update($id, $data);
            session()->setFlashdata('success', 'Berhasil Mengupdate Data Kelas' . $this->request->getPost('kelas'));
            return redirect()->to(base_url('/kelas'));
        }else{
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('/kelas/edit/', $id));
        }
	}

    public function hapus($id)
    {
        $model = new KelasModel();
        $model->where('id', $id)->delete();
        session()->setFlashdata('success', 'Berhasil Menghapus Data Kelas');
        return redirect()->to(base_url('/kelas'));
    }
}
?>