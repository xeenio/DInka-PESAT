<?php

namespace App\Controllers;

use App\Models\MapelModel;
use CodeIgniter\Controller;

class Mapel extends Controller
{
    public function index()
    {
        $model = new MapelModel();
        $pager = \Config\Services::pager();
        $data['mapel'] = $model->orderBy('id', 'ASC')->findAll();
        return view('mapel/index', $data);
    }
    public function add() 
	{
        $this->session= \Config\Services::session();
		if(!isset($_SESSION['inputs'])){
            $data = array(
                'mapel'=> '',
                'kelas'=>  '',
            );
            session()->setFlashdata('inputs', $data);
        }
		return view ('/mapel/add');
	}
	public function save() 
	{
		helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $data = array(
            'mapel' => $this->request->getPost('mapel'),
            'kelas' => $this->request->getPost('kelas'),
        );

        if($validation->run($data, 'mapel')) {
            $model = new MapelModel();
            $model->insert($data);
            session()->setFlashdata('success', 'Berhasil Menyimpan Data Mapel' . $this->request->getPost('mapel'));
            return redirect()->to(base_url('mapel'));
        }else{
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('/mapel/add'));
        }
	}

	public function edit($id){
		$this->session= \Config\Services::session();
		if(!isset($_SESSION['inputs'])){
			$data = array(
                'mapel'=> '',
                'kelas'=>  '',
			);
			session()->setFlashdata('inputs', $data);
		}
		return view ('/mapel/edit');
	}

    public function update() 
	{
		helper(['form', 'url']);
        $id = $this->request->getPost('id') ;
        $validation = \Config\Services::validation();
        $data = array(
            'mapel' => $this->request->getPost('mapel'),
            'kelas' => $this->request->getPost('kelas'),
        );

        if($validation->run($data, 'mapel')) {
            $model = new MapelModel();
            $model->update($id, $data);
            session()->setFlashdata('success', 'Berhasil Mengupdate Data Mapel' . $this->request->getPost('mapel'));
            return redirect()->to(base_url('/mapel'));
        }else{
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('/mapel/edit/', $id));
        }
	}

    public function hapus($id)
    {
        $model = new MapelModel();
        $model->where('id', $id)->delete();
        session()->setFlashdata('success', 'Berhasil Menghapus Data Mapel');
        return redirect()->to(base_url('/mapel'));
    }
}
?>