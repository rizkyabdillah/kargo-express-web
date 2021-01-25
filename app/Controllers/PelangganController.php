<?php

namespace App\Controllers;

class PelangganController extends BaseController
{

    public function index()
    {
        $pelanggan = $this->model->getAllDataArray('VIEW_PELANGGAN');
        $data = [
            'title' => 'PELANGGAN',
            'header_title' => 'Page Pelanggan',
            'crumb1' => 'Master Data',
            'crumb2' => 'Pelanggan',
            'sidebar' => 2,
            'dataset' => $pelanggan,
        ];
        return view('admin/contents/pelanggan', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'TAMBAH PELANGGAN',
            'header_title' => 'Page Pelanggan',
            'crumb1' => 'Master Data',
            'crumb2' => 'pelanggan',
            'back' => true,
            'valid' => $this->validation,
            'sidebar' => 2,
            'link_back' => route_to('view_pelanggan')
        ];
        return view('admin/contents/add/add-pelanggan', $data);
    }


    public function save()
    {

        if (!$this->validate([
            'nama' => [
                'label' => 'Nama pelanggan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ], 'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[pelanggan.email]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'valid_email' => '{field} tidak valid',
                    'is_unique' => '{field} tersebut sudah terdaftar'
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
            ], 'gambar' => [
                'label' => 'Gambar',
                'rules' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'file harus berupa gambar',
                ]
            ]
        ])) {
            return redirect()->back()->withInput(); //->with('valid', $this->validation);
        };


        // SAVE DATA TO USER
        $id_rand = strtoupper(random_string('alnum', 4));

        $file = $this->request->getFile('gambar');

        $nama_gambar = $file->getRandomName();

        $file->move(ROOTPATH . 'public/assets/img', $nama_gambar);

        $data = [
            'id_user' => $id_rand,
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'level' => 'pelanggan'
        ];

        // SAVE DATA TO pelanggan
        $this->model->insertData('user', $data);

        $data = [
            'id_pelanggan' => $id_rand,
            'nama_pelanggan' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'no_telp' => $this->request->getVar('telp'),
            'gambar' => $nama_gambar
        ];

        $this->model->insertData('pelanggan', $data);

        session()->setFlashData('pesan', 'Data pelanggan berhasil disimpan');
        return redirect()->to(route_to('view_pelanggan'));
    }


    public function delete($id)
    {
        $this->model->deleteData('user', ['id_user' => $id]);
        $this->model->deleteData('pelanggan', ['id_pelanggan' => $id]);
        $data = $this->model->getAllDataArray('detail_transaksi', ['id_pelanggan' => $id]);
        for ($i = 0; $i < count($data); $i++) {
            $data1 = $this->model->getRowDataArray('transaksi', ['no_resi' => $data[$i]['no_resi']]);
            if ($data1) {
                $this->model->deleteData('info_barang', ['id_barang' => $data1['id_barang']]);
                $this->model->deleteData('info_penerima', ['id_penerima' => $data1['id_penerima']]);
                $this->model->deleteData('info_pengirim', ['id_pengirim' => $data1['id_pengirim']]);
                $this->model->deleteData('transaksi', ['no_resi' => $data1['no_resi']]);
                $this->model->deleteData('detail_transaksi', ['no_resi' => $data1['no_resi']]);
            }
        }

        session()->setFlashData('pesan', 'Data pelanggan berhasil dihapus');
        return redirect()->to(route_to('view_pelanggan'));
    }


    public function edit($id)
    {
        $data_user = $this->model->getDataWhereArray('user', ['id_user' => $id]);
        $data_pelanggan = $this->model->getDataWhereArray('pelanggan', ['id_pelanggan' => $id]);
        $query = array_merge($data_user[0], $data_pelanggan[0]);

        $data = [
            'title' => 'UBAH PELANGGAN',
            'header_title' => 'Page pelanggan',
            'crumb1' => 'Master Data',
            'crumb2' => 'pelanggan',
            'back' => true,
            'sidebar' => 2,
            'valid' => $this->validation,
            'link_back' => route_to('view_pelanggan'),
            'dataset' => $query
        ];
        return view('admin/contents/edit/edit-pelanggan', $data);
    }


    public function update()
    {
        if (!$this->validate([
            'nama' => [
                'label' => 'Nama pelanggan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ], 'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[pelanggan.email, email,' . $this->request->getVar('email') . ']',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'valid_email' => '{field} tidak valid',
                    'is_unique' => '{field} tersebut sudah terdaftar'
                ]
            ],  'telp' => [
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
            ], 'gambar' => [
                'label' => 'Gambar',
                'rules' => 'max_size[gambar,2048]|is_image[gambar]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'file harus berupa gambar',
                ]
            ]
        ])) {
            return redirect()->back()->withInput(); //->with('valid', $this->validation);
        };

        $empty_gambar = $this->request->getFile('gambar') == "";

        $file = $this->request->getFile('gambar');
        $nama_gambar = $file->getRandomName();

        if (!$empty_gambar) {
            $file->move(ROOTPATH . 'public/assets/img', $nama_gambar);
        }

        // SAVE DATA TO USER
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'level' => 'pelanggan'
        ];


        $this->model->updateData('user', 'id_user', $this->request->getVar('id'), $data);

        // SAVE DATA TO pelanggan
        $data = [
            'nama_pelanggan' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'no_telp' => $this->request->getVar('telp'),
        ];

        if (!$empty_gambar) {
            $data['gambar'] = [$nama_gambar];
        }

        $this->model->updateData('pelanggan', 'id_pelanggan', $this->request->getVar('id'), $data);

        session()->setFlashData('pesan', 'Data pelanggan berhasil diubah');
        return redirect()->to(route_to('view_pelanggan'));
    }
}
