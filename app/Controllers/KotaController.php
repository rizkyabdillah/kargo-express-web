<?php

namespace App\Controllers;

class kotaController extends BaseController
{

    public function index()
    {
        $kota = $this->model->getAllDataArray('kota');
        $data = [
            'title' => 'KOTA',
            'header_title' => 'Page kota',
            'crumb1' => 'Master Data',
            'crumb2' => 'kota',
            'sidebar' => 3,
            'dataset' => $kota,
        ];
        return view('admin/contents/kota', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'TAMBAH KOTA',
            'header_title' => 'Page Kota',
            'crumb1' => 'Master Data',
            'crumb2' => 'Kota',
            'back' => true,
            'valid' => $this->validation,
            'sidebar' => 3,
            'link_back' => route_to('view_kota')
        ];
        return view('admin/contents/add/add-kota', $data);
    }


    public function save()
    {

        if (!$this->validate([
            'nama' => [
                'label' => 'Nama kota',
                'rules' => 'required|is_unique[kota.nama_kota]|alpha',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'alpha' => '{field} tidak boleh mengandung angka',
                    'is_unique' => '{field} sudah tersedia'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('valid', $this->validation);
        };


        // SAVE DATA TO USER
        $id_rand = strtoupper(random_string('alnum', 4));

        $data = [
            'id_kota' => $id_rand,
            'nama_kota' => strtoupper($this->request->getVar('nama'))
        ];

        $this->model->insertData('kota', $data);

        session()->setFlashData('pesan', 'Data kota berhasil disimpan');
        return redirect()->to(route_to('view_kota'));
    }


    public function delete($id)
    {
        $this->model->deleteData('user', ['id_user' => $id]);
        $this->model->deleteData('kota', ['id_kota' => $id]);
        session()->setFlashData('pesan', 'Data kota berhasil dihapus');
        return redirect()->to(route_to('view_kota'));
    }


    public function edit($id)
    {
        $dataset = $this->model->getDataWhereArray('kota', ['id_kota' => $id]);

        $data = [
            'title' => 'UBAH kota',
            'header_title' => 'Page kota',
            'crumb1' => 'Master Data',
            'crumb2' => 'kota',
            'back' => true,
            'sidebar' => 3,
            'valid' => $this->validation,
            'link_back' => route_to('view_kota'),
            'dataset' => $dataset[0]
        ];
        return view('admin/contents/edit/edit-kota', $data);
    }


    public function update()
    {
        if (!$this->validate([
            'nama' => [
                'label' => 'Nama kota',
                'rules' => 'required|is_unique[kota.nama_kota]|alpha',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'alpha' => '{field} tidak boleh mengandung angka',
                    'is_unique' => '{field} sudah tersedia'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('valid', $this->validation);
        };


        // SAVE DATA TO USER
        $data = [
            'nama_kota' => strtoupper($this->request->getVar('nama'))
        ];


        $this->model->updateData('kota', 'id_kota', $this->request->getVar('id'), $data);

        session()->setFlashData('pesan', 'Data kota berhasil diubah');
        return redirect()->to(route_to('view_kota'));
    }
}
