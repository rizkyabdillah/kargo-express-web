<?php

namespace App\Controllers;

class JalurController extends BaseController
{

    public function index()
    {
        $jalur = $this->model->getAllDataArray('VIEW_JALUR');
        $data = [
            'title' => 'jalur',
            'header_title' => 'Page Jalur',
            'crumb1' => 'Master Data',
            'crumb2' => 'Jalur',
            'sidebar' => 4,
            'dataset' => $jalur,
        ];
        return view('admin/contents/jalur', $data);
    }

    public function add()
    {
        $data_kota = $this->model->getAllDataArray('kota');
        $data = [
            'title' => 'TAMBAH jalur',
            'header_title' => 'Page jalur',
            'crumb1' => 'Master Data',
            'crumb2' => 'jalur',
            'back' => true,
            'valid' => $this->validation,
            'sidebar' => 4,
            'datakota' => $data_kota,
            'link_back' => route_to('view_jalur')
        ];
        return view('admin/contents/add/add-jalur', $data);
    }


    public function save()
    {

        if (!$this->validate([
            'kota_tujuan' => [
                'label' => 'Kota Tujuan',
                'rules' => 'required|not_matches[kota_awal]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'not_matches' => '{field} tidak boleh sama'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('valid', $this->validation);
        };


        $cek_jalur = $this->model->getRowDataArray('jalur', [
            'id_kota_awal' => $this->request->getVar('kota_awal'),
            'id_kota_tujuan' => $this->request->getVar('kota_tujuan')
        ]);

        if ($cek_jalur) {
            session()->setFlashData('pesan', 'Kota awal dan kota tujuan sudah terdaftar');
            return redirect()->back()->withInput()->with('valid', $this->validation);
        } else {

            $id_rand = strtoupper(random_string('alnum', 4));

            $data = [
                'id_jalur' => $id_rand,
                'id_kota_awal' => $this->request->getVar('kota_awal'),
                'id_kota_tujuan' => $this->request->getVar('kota_tujuan')
            ];

            $this->model->insertData('jalur', $data);

            session()->setFlashData('pesan', 'Data jalur berhasil disimpan');
            return redirect()->to(route_to('view_jalur'));
        }
    }


    public function delete($id)
    {
        $this->model->deleteData('jalur', ['id_jalur' => $id]);
        session()->setFlashData('pesan', 'Data jalur berhasil dihapus');
        return redirect()->to(route_to('view_jalur'));
    }


    public function edit($id)
    {
        $data_kota = $this->model->getAllDataArray('kota');
        $dataset = $this->model->getDataWhereArray('jalur', ['id_jalur' => $id]);
        $data = [
            'title' => 'UBAH jalur',
            'header_title' => 'Page jalur',
            'crumb1' => 'Master Data',
            'crumb2' => 'jalur',
            'back' => true,
            'valid' => $this->validation,
            'sidebar' => 4,
            'datakota' => $data_kota,
            'dataset' => $dataset[0],
            'link_back' => route_to('view_jalur')
        ];

        return view('admin/contents/edit/edit-jalur', $data);
    }


    public function update()
    {
        if (!$this->validate([
            'kota_tujuan' => [
                'label' => 'Kota Tujuan',
                'rules' => 'required|not_matches[kota_awal]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'not_matches' => '{field} tidak boleh sama'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('valid', $this->validation);
        };

        $cek_jalur = $this->model->getRowDataArray('jalur', [
            'id_kota_awal' => $this->request->getVar('kota_awal'),
            'id_kota_tujuan' => $this->request->getVar('kota_tujuan'),
            'id_jalur <>' => $this->request->getVar('id')
        ]);

        if ($cek_jalur) {
            session()->setFlashData('pesan', 'Kota awal dan kota tujuan sudah terdaftar');
            return redirect()->back()->withInput()->with('valid', $this->validation);
        } else {
            $data = [
                'id_kota_awal' => $this->request->getVar('kota_awal'),
                'id_kota_tujuan' => $this->request->getVar('kota_tujuan'),
            ];

            $this->model->updateData('jalur', 'id_jalur', $this->request->getVar('id'), $data);

            session()->setFlashData('pesan', 'Data jalur berhasil diubah');
            return redirect()->to(route_to('view_jalur'));
        }
    }
}
