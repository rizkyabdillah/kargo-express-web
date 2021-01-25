<?php

namespace App\Controllers;

class DetailJalurController extends BaseController
{

    public function index($id)
    {
        $jalur = $this->model->getDataWhereArray('VIEW_DETAIL_JALUR', ['id_jalur' => $id]);
        $data = [
            'title' => 'Detail Jalur',
            'header_title' => 'Page Detail Jalur',
            'crumb1' => 'Master Data',
            'crumb2' => 'Jalur',
            'sidebar' => 4,
            'dataset' => $jalur,
            'back' => true,
            'id' => $id,
            'link_back' => route_to('view_jalur'),
        ];
        return view('admin/contents/detail-jalur', $data);
    }

    public function add($id)
    {
        $kargo = $this->model->getAllDataArray('kargo');
        $data = [
            'title' => 'TAMBAH DETAIL JALUR',
            'header_title' => 'Page Detail Jalur',
            'crumb1' => 'Master Data',
            'crumb2' => 'Jalur',
            'back' => true,
            'valid' => $this->validation,
            'sidebar' => 4,
            'kargo' => $kargo,
            'id' => $id,
            'link_back' => route_to('view_detail', $id)
        ];
        return view('admin/contents/add/add-detail', $data);
    }


    public function save()
    {

        if (!$this->validate([
            'harga' => [
                'label' => 'Harga',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('valid', $this->validation);
        };


        $cek_detail = $this->model->getRowDataArray('detail_jalur', [
            'id_jalur' => $this->request->getVar('id'),
            'id_kargo' => $this->request->getVar('id_kargo')
        ]);

        if ($cek_detail) {
            session()->setFlashData('pesan', 'Kargo tersebut sudah terdaftar');
            return redirect()->back()->withInput()->with('valid', $this->validation);
        } else {

            $data = [
                'id_jalur' => $this->request->getVar('id'),
                'status' => $this->request->getVar('status'),
                'id_kargo' => $this->request->getVar('id_kargo'),
                'harga' => $this->request->getVar('harga'),
            ];

            $this->model->insertData('detail_jalur', $data);
            session()->setFlashData('pesan', 'Data detail jalur berhasil disimpan');
            return redirect()->to(route_to('view_detail', $this->request->getVar('id')));
        }
    }


    public function delete($id)
    {
        $this->model->deleteData('detail_jalur', ['id_jalur' => $id, 'id_kargo' => $this->request->getVar('id_kargo')]);
        session()->setFlashData('pesan', 'Data detail jalur berhasil dihapus');
        return redirect()->to(route_to('view_detail', $id));
    }


    public function edit($id, $idk)
    {
        $kargo = $this->model->getAllDataArray('kargo');
        $dataset = $this->model->getDataWhereArray('detail_jalur', ['id_jalur' => $id, 'id_kargo' => $idk]);
        $data = [
            'title' => 'UBAH DETAIL JALUR',
            'header_title' => 'Page Detail Jalur',
            'crumb1' => 'Master Data',
            'crumb2' => 'Jalur',
            'back' => true,
            'valid' => $this->validation,
            'sidebar' => 4,
            'kargo' => $kargo,
            'dataset' => $dataset[0],
            'id' => $id,
            'link_back' => route_to('view_detail', $id)
        ];
        return view('admin/contents/edit/edit-detail', $data);
    }


    public function update()
    {
        if (!$this->validate([
            'harga' => [
                'label' => 'Harga',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('valid', $this->validation);
        };

        $data = [
            'harga' => $this->request->getVar('harga'),
            'status' => $this->request->getVar('status')
        ];

        $this->model->updateDataFilter('detail_jalur', [
            'id_jalur' => $this->request->getVar('id'),
            'id_kargo' => $this->request->getVar('idk')
        ], $data);



        session()->setFlashData('pesan', 'Data detail jalur berhasil diubah');
        return redirect()->to(route_to('view_detail', $this->request->getVar('id')));
    }
}
