<?php

namespace App\Controllers;

class LoginController extends BaseController
{

    public function loginAdmin()
    {
        $data = [
            'valid' => $this->validation
        ];
        return view('admin/contents/login', $data);
    }

    public function loginUser()
    {
        $data = [
            'valid' => $this->validation,
            'aktif' => 5
        ];
        return view('index/contents/login', $data);
    }

    public function daftar()
    {
        $data = [
            'aktif' => 5,
            'valid' => $this->validation,
        ];
        return view('index/contents/daftar', $data);
    }

    public function dashboard()
    {

        $transaksi = $this->model->getDataWhereArray('VIEW_TRANSAKSI_DASHBOARD', [
            'id_pelanggan' => session()->get('data_login')['id_pelanggan'],
            'status <>' => 'ARRIVED',
        ]);

        $transaksi1 = $this->model->getDataWhereArray('VIEW_TRANSAKSI_DASHBOARD', [
            'id_pelanggan' => session()->get('data_login')['id_pelanggan'],
            'status' => 'ARRIVED',
        ]);

        $data_user = $this->model->getDataWhereArray('VIEW_PELANGGAN', [
            'id_pelanggan' => session()->get('data_login')['id_pelanggan']
        ]);

        $data = [
            'aktif' => 5,
            'dataset' => $transaksi,
            'dataset1' => $transaksi1,
            'data_user' => $data_user[0],
        ];
        return view('index/contents/dashboard', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(route_to('login_admin'));
    }

    public function logoutUser()
    {
        session()->destroy();
        return redirect()->to(route_to('login_user'));
    }

    public function authAdmin()
    {

        if (!$this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ], 'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ]
        ])) {
            // dd($this->validation);
            return redirect()->back()->withInput()->with('valid', $this->validation);
        } else {
            $cek_user = $this->model->getRowDataArray('user', ['username' => $this->request->getVar('username')]);
            if ($cek_user) {
                if ($cek_user['level'] !== "pelanggan") {
                    if (password_verify($this->request->getVar('password'), $cek_user['password'])) {
                        session()->set([
                            'is_login_admin' => true,
                            'data_login_peg' => $this->model->getRowDataArray('VIEW_PEGAWAI', ['id_pegawai' => $cek_user['id_user']])
                        ]);
                        return redirect()->to(route_to('view_dashboard'));
                    }
                }
            }
            session()->setFlashData('pesan', 'Username atau password anda salah!');
            return redirect()->back();
        };
    }

    public function dashboards()
    {
        $model_transaksi = $this->model->queryArray('SELECT pelanggan.nama_pelanggan, transaksi.tanggal_transaksi, transaksi.status FROM detail_transaksi, transaksi, pelanggan WHERE transaksi.no_resi = detail_transaksi.no_resi AND detail_transaksi.id_pelanggan = pelanggan.id_pelanggan');
        $count_pelanggan = $this->model->queryRowArray('SELECT COUNT(*) as count FROM pelanggan');
        $count_jalur = $this->model->queryRowArray('SELECT COUNT(*) as count FROM jalur');
        $count_transaksi = $this->model->queryRowArray('SELECT COUNT(*) as count FROM transaksi');
        $count_pegawai = $this->model->queryRowArray('SELECT COUNT(*) as count FROM VIEW_PEGAWAI');
        // return dd($model_transaksi);
        $data = [
            'title' => 'DASHBOARD',
            'header_title' => 'Page Dashboard',
            'crumb1' => 'Dashboard',
            'crumb2' => 'Dashboard',
            'sidebar' => 0,
            'transaksi' => $model_transaksi,
            'cnt_pelanggan' => $count_pelanggan,
            'cnt_jalur' => $count_jalur,
            'cnt_transaksi' => $count_transaksi,
            'cnt_pegawai' => $count_pegawai,
        ];
        return view('admin/contents/dashboard', $data);
    }

    public function getBcrypt($prefix)
    {
        # code...
        echo (password_hash($prefix, PASSWORD_BCRYPT));
    }


    public function authUser()
    {
        if (!$this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ], 'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('valid', $this->validation);
        } else {
            $cek_user = $this->model->getRowDataArray('user', ['username' => $this->request->getVar('username')]);
            if ($cek_user) {
                if ($cek_user['level'] === "pelanggan") {
                    if (password_verify($this->request->getVar('password'), $cek_user['password'])) {
                        session()->set([
                            'is_login_user' => true,
                            'data_login' => $this->model->getRowDataArray('VIEW_PELANGGAN', ['id_pelanggan' => $cek_user['id_user']])
                        ]);
                        return redirect()->to(route_to('dashboard'));
                    }
                }
            }
            session()->setFlashData('pesan', 'Username atau password anda salah!');
            return redirect()->back();
        };
    }

    public function daftarUser()
    {

        if (!$this->validate([
            'nama' => [
                'label' => 'Nama lengkap',
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'alpha_space' => '{field} harus berisi huruf',
                ]
            ], 'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'valid_email' => '{field} anda tidak benar',
                ]
            ], 'telp' => [
                'label' => 'No. telp',
                'rules' => 'required|numeric|max_length[13]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus berupa angka',
                    'max_length' => '{field} maksimal harus 13 angka',
                ]
            ], 'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah terdaftar',
                ]
            ], 'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ], 'konfirmasi' => [
                'label' => 'Konfirmasi password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'matches' => '{field} tidak tidak sama',
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('valid', $this->validation);
        } else {
            $id_rand = strtoupper(random_string('alnum', 4));

            $data = [
                'id_user' => $id_rand,
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                'level' => 'pelanggan'
            ];

            $this->model->insertData('user', $data);


            $data = [
                'id_pelanggan' => $id_rand,
                'nama_pelanggan' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'no_telp' => $this->request->getVar('telp'),
            ];

            $this->model->insertData('pelanggan', $data);

            session()->set([
                'is_login_user' => true,
                'data_login' => $this->model->getRowDataArray('VIEW_PELANGGAN', ['id_pelanggan' => $id_rand])
            ]);

            session()->setFlashData('pesan', 'Selamat akun anda telah terdaftar!');
            return redirect()->to(route_to('dashboard'));
        };
    }

    public function ubahUser()
    {

        if (!$this->validate([
            'nama' => [
                'label' => 'Nama lengkap',
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'alpha_space' => '{field} harus berisi huruf',
                ]
            ], 'telp' => [
                'label' => 'No. telp',
                'rules' => 'required|numeric|max_length[13]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus berupa angka',
                    'max_length' => '{field} maksimal harus 13 angka',
                ]
            ], 'email' => [
                'label' => 'Email',
                'rules' => 'required|is_unique[pelanggan.email, email,' . $this->request->getVar('email') . ']',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah terdaftar',
                ]
            ], 'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[user.username, username,' . $this->request->getVar('username') . ']',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah terdaftar',
                ]
            ]
        ])) {
            return redirect()->back(); //->withInput()->with('valid', $this->validation);
        } else {

            $data = [
                'username' => $this->request->getVar('username'),
            ];

            $this->model->updateData('user', 'id_user', $this->request->getVar('id'), $data);

            $data = [
                'nama_pelanggan' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'no_telp' => $this->request->getVar('telp'),
            ];

            $this->model->updateData('pelanggan', 'id_pelanggan', $this->request->getVar('id'), $data);

            session()->setFlashData('pesan', 'Data akun anda berhasil diubah!');
            return redirect()->to(route_to('dashboard'));
        };
    }
}
