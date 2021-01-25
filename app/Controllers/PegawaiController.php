<?php

namespace App\Controllers;

class PegawaiController extends BaseController
{

    public function index()
    {
        $pegawai = $this->model->getAllDataArray('VIEW_PEGAWAI');
        $data = [
            'title' => 'PEGAWAI',
            'header_title' => 'Page Pegawai',
            'crumb1' => 'Master Data',
            'crumb2' => 'Pegawai',
            'sidebar' => 1,
            'dataset' => $pegawai,
        ];
        return view('admin/contents/pegawai', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'TAMBAH PEGAWAI',
            'header_title' => 'Page Pegawai',
            'crumb1' => 'Master Data',
            'crumb2' => 'Pegawai',
            'back' => true,
            'valid' => $this->validation,
            'sidebar' => 1,
            'link_back' => route_to('view_pegawai')
        ];
        return view('admin/contents/add/add-pegawai', $data);
    }


    public function save()
    {

        if (!$this->validate([
            'nama' => [
                'label' => 'Nama pegawai',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ], 'telp' => [
                'label' => 'No. Telp',
                'rules' => 'required|numeric|max_length[13]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus berupa angka',
                    'max_length' => '{field} tidak boleh lebih dari 13 angka',
                ]
            ], 'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah tersedia',
                ]
            ], 'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ], 'password1' => [
                'label' => 'Ulangi password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'matches' => 'Password tidak sama',
                ]
            ], 'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('valid', $this->validation);
        };


        // SAVE DATA TO USER
        $id_rand = strtoupper(random_string('alnum', 4));

        $data = [
            'id_user' => $id_rand,
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'level' => 'pegawai'
        ];

        // SAVE DATA TO PEGAWAI
        $this->model->insertData('user', $data);

        $data = [
            'id_pegawai' => $id_rand,
            'nama_pegawai' => $this->request->getVar('nama'),
            'no_telp' => $this->request->getVar('telp'),
            'jenis_kelamin' => $this->request->getVar('jenis'),
            'alamat' => $this->request->getVar('alamat')
        ];

        $this->model->insertData('pegawai', $data);

        session()->setFlashData('pesan', 'Data pegawai berhasil disimpan');
        return redirect()->to(route_to('view_pegawai'));
    }


    public function delete($id)
    {
        $this->model->deleteData('user', ['id_user' => $id]);
        $this->model->deleteData('pegawai', ['id_pegawai' => $id]);
        session()->setFlashData('pesan', 'Data pegawai berhasil dihapus');
        return redirect()->to(route_to('view_pegawai'));
    }


    public function edit($id)
    {
        $data_user = $this->model->getDataWhereArray('user', ['id_user' => $id]);
        $data_pegawai = $this->model->getDataWhereArray('pegawai', ['id_pegawai' => $id]);
        $query = array_merge($data_user[0], $data_pegawai[0]);

        $data = [
            'title' => 'UBAH PEGAWAI',
            'header_title' => 'Page Pegawai',
            'crumb1' => 'Master Data',
            'crumb2' => 'Pegawai',
            'back' => true,
            'sidebar' => 1,
            'valid' => $this->validation,
            'link_back' => route_to('view_pegawai'),
            'dataset' => $query
        ];
        return view('admin/contents/edit/edit-pegawai', $data);
    }


    public function update()
    {
        if (!$this->validate([
            'nama' => [
                'label' => 'Nama pegawai',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ], 'telp' => [
                'label' => 'No. Telp',
                'rules' => 'required|numeric|max_length[13]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus berupa angka',
                    'max_length' => '{field} tidak boleh lebih dari 13 angka',
                ]
            ], 'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[user.username,id_user,' . $this->request->getVar('id') . ']',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah tersedia',
                ]
            ], 'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ], 'password1' => [
                'label' => 'Ulangi password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'matches' => 'Password tidak sama',
                ]
            ], 'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('valid', $this->validation);
        };


        // SAVE DATA TO USER

        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'level' => 'pegawai'
        ];

        // SAVE DATA TO PEGAWAI
        $this->model->updateData('user', 'id_user', $this->request->getVar('id'), $data);

        $data = [
            'nama_pegawai' => $this->request->getVar('nama'),
            'no_telp' => $this->request->getVar('telp'),
            'jenis_kelamin' => $this->request->getVar('jenis'),
            'alamat' => $this->request->getVar('alamat')
        ];

        $this->model->updateData('pegawai', 'id_pegawai', $this->request->getVar('id'), $data);

        session()->setFlashData('pesan', 'Data pegawai berhasil diubah');
        return redirect()->to(route_to('view_pegawai'));
    }
}
