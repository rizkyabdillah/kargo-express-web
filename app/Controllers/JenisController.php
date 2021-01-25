<?php

namespace App\Controllers;

class JenisController extends BaseController
{

    public function index()
    {
        $barang = $this->model->getAllDataArray('jenis_barang');
        $data = [
            'title' => 'Jenis Barang',
            'header_title' => 'Page Jenis Barang',
            'crumb1' => 'Master Data',
            'crumb2' => 'Barang',
            'sidebar' => 5,
            'dataset' => $barang,
        ];
        return view('admin/contents/jenis-barang', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'TAMBAH barang',
            'header_title' => 'Page Jenis Barang',
            'crumb1' => 'Master Data',
            'crumb2' => 'barang',
            'back' => true,
            'valid' => $this->validation,
            'sidebar' => 5,
            'link_back' => route_to('view_jenis')
        ];
        return view('admin/contents/add/add-jenis', $data);
    }


    public function save()
    {

        if (!$this->validate([
            'jenis' => [
                'label' => 'Jenis barang',
                'rules' => 'required|is_unique[jenis_barang.jenis_barang]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah tersedia'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('valid', $this->validation);
        };


        // SAVE DATA TO JENIS BARANG
        $id_rand = strtoupper(random_string('alnum', 4));

        $data = [
            'id_jenis' => $id_rand,
            'jenis_barang' => ucfirst($this->request->getVar('jenis'))
        ];

        $this->model->insertData('jenis_barang', $data);

        session()->setFlashData('pesan', 'Data jenis barang berhasil disimpan');
        return redirect()->to(route_to('view_jenis'));
    }


    public function delete($id)
    {
        $this->model->deleteData('jenis_barang', ['id_jenis' => $id]);
        session()->setFlashData('pesan', 'Data jenis barang berhasil dihapus');
        return redirect()->to(route_to('view_jenis'));
    }


    public function edit($id)
    {
        $dataset = $this->model->getDataWhereArray('jenis_barang', ['id_jenis' => $id]);

        $data = [
            'title' => 'UBAH JENIS BARANG',
            'header_title' => 'Page Jenis Barang',
            'crumb1' => 'Master Data',
            'crumb2' => 'barang',
            'back' => true,
            'sidebar' => 5,
            'valid' => $this->validation,
            'link_back' => route_to('view_jenis'),
            'dataset' => $dataset[0]
        ];
        return view('admin/contents/edit/edit-jenis', $data);
    }


    public function update()
    {
        if (!$this->validate([
            'jenis' => [
                'label' => 'Jenis barang',
                'rules' => 'required|is_unique[jenis_barang.jenis_barang,id_jenis,' . $this->request->getVar('id') . ']',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah tersedia'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('valid', $this->validation);
        };

        $data = [
            'jenis_barang' => ucfirst($this->request->getVar('jenis'))
        ];


        $this->model->updateData('jenis_barang', 'id_jenis', $this->request->getVar('id'), $data);

        session()->setFlashData('pesan', 'Data jenis barang berhasil diubah');
        return redirect()->to(route_to('view_jenis'));
    }
}
