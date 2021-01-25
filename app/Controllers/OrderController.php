<?php

namespace App\Controllers;

class OrderController extends BaseController
{

  public function index()
  {
    $transaksi = $this->model->getAllDataArray('VIEW_TRANSAKSI_DASHBOARD');
    $data = [
      'title' => 'Order Kargo',
      'header_title' => 'Page Order Kargo',
      'crumb1' => 'Transaksi',
      'crumb2' => 'Order Kargo',
      'sidebar' => 6,
      'dataset' => $transaksi,
    ];
    return view('admin/contents/order-kargo', $data);
  }

  public function add()
  {
    $data_kota = $this->model->getAllDataArray('kota');
    $data_jenis = $this->model->getAllDataArray('jenis_barang');
    $data = [
      'datakota' => $data_kota,
      'datajenis' => $data_jenis,
      'valid' => $this->validation,
      'title' => 'Order Kargo',
      'header_title' => 'Page Order Kargo',
      'crumb1' => 'Transaksi',
      'crumb2' => 'Order Kargo',
      'sidebar' => 6,
      'back' => true,
      'link_back' => route_to('view_order')
    ];
    return view('admin/contents/add/add-order', $data);
  }

  public function addLanjut()
  {
    $jalur = $this->model->getRowDataArray('jalur', [
      'id_kota_awal' => session()->get('data_order')['jalur']['kota_pengirim'],
      'id_kota_tujuan' => session()->get('data_order')['jalur']['kota_penerima'],
    ]);

    $datakargo = $this->model->getDataWhereArray('VIEW_DETAIL_JALUR', ['id_jalur' => $jalur['id_jalur']]);
    $pelanggan = $this->model->getAllDataArray('pelanggan');

    $data = [
      'pelanggan' => $pelanggan,
      'valid' => $this->validation,
      'datakargo' => $datakargo,
      'id_jalur' => $jalur['id_jalur'],
      'title' => 'Order Kargo',
      'header_title' => 'Page Order Kargo',
      'crumb1' => 'Transaksi',
      'crumb2' => 'Order Kargo',
      'sidebar' => 6,
      'back' => true,
      'link_back' => route_to('view_order')
    ];
    return view('admin/contents/add/add-orderlanjut', $data);
  }


  public function save()
  {
    if (!$this->validate([

      // PENERIMA
      'nama_pengirim' => [
        'label' => 'Nama pengirim',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} masih kosong',
        ]
      ], 'telp_pengirim' => [
        'label' => 'Telp. pengirim',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} masih kosong',
        ]
      ], 'kodep_pengirim' => [
        'label' => 'Kode pos',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} masih kosong',
        ]
      ], 'kota_pengirim' => [
        'label' => 'Kota pengirim',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus dipilih',
        ]
      ], 'alamat_pengirim' => [
        'label' => 'Alamat pengirim',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} masih kosong',
        ]
      ],

      // PENGIRIM
      'nama_penerima' => [
        'label' => 'Nama penerima',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} masih kosong',
        ]
      ], 'telp_penerima' => [
        'label' => 'Telp. penerima',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} masih kosong',
        ]
      ], 'kodep_penerima' => [
        'label' => 'Kode pos',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} masih kosong',
        ]
      ], 'kota_penerima' => [
        'label' => 'Kota penerima',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus dipilih',
        ]
      ], 'alamat_penerima' => [
        'label' => 'Alamat penerima',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} masih kosong',
        ]
      ],

      // BARANG
      'nama_barang' => [
        'label' => 'Nama barang',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} masih kosong',
        ]
      ], 'jenis_barang' => [
        'label' => 'Jenis barang',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus dipilih',
        ]
      ], 'berat' => [
        'label' => 'Berat',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} masih kosong',
        ]
      ], 'keterangan' => [
        'label' => 'Keterangan barang',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} masih kosong',
        ]
      ]
    ])) {
      return redirect()->back()->withInput()->with('valid', $this->validation);
    } else {
      $data_pengirim = array(
        'nama_pengirim' => $this->request->getVar('nama_pengirim'),
        'no_telp' => $this->request->getVar('telp_pengirim'),
        'alamat' => $this->request->getVar('alamat_pengirim'),
        'kode_pos' => $this->request->getVar('kodep_pengirim'),
      );

      $data_penerima = array(
        'nama_penerima' => $this->request->getVar('nama_penerima'),
        'no_telp' => $this->request->getVar('telp_penerima'),
        'alamat' => $this->request->getVar('alamat_penerima'),
        'kode_pos' => $this->request->getVar('kodep_penerima'),
      );

      $data_barang = array(
        'nama_barang' => $this->request->getVar('nama_barang'),
        'id_jenis' => $this->request->getVar('jenis_barang'),
        'berat' => $this->request->getVar('berat'),
        'keterangan' => $this->request->getVar('keterangan'),
      );

      $data_jalur = array(
        'kota_pengirim' => $this->request->getVar('kota_pengirim'),
        'kota_penerima' => $this->request->getVar('kota_penerima'),
      );

      $data = array(
        'pengirim' => $data_pengirim,
        'penerima' => $data_penerima,
        'barang' => $data_barang,
        'jalur' => $data_jalur,
      );

      session()->set(['data_order' => $data]);
      // return dd($data);
      return redirect()->to(route_to('view_add_orderlanjut'));
    }
  }

  public function saveLanjut()
  {
    if (!$this->validate([

      'id_pelanggan' => [
        'label' => 'Nama pelanggan',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus dipilih',
        ]
      ], 'metode' => [
        'label' => 'Metode pembayaran',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus dipilih',
        ]
      ], 'id_kargo' => [
        'label' => 'Kargo',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus dipilih',
        ]
      ]
    ])) {
      return redirect()->back()->withInput(); //->with('valid', $this->validation);
    } else {
      $id_pengirim = array('id_pengirim' => strtoupper(random_string('alnum', 4)));
      $id_penerima = array('id_penerima' => strtoupper(random_string('alnum', 4)));
      $id_barang = array('id_barang' => strtoupper(random_string('alnum', 4)));
      $no_resi = array('no_resi' => 'EX' . random_string('numeric', 5));

      $data = array_merge($id_pengirim, session()->get('data_order')['pengirim']);
      $this->model->insertData('info_pengirim', $data);

      $data = array_merge($id_penerima, session()->get('data_order')['penerima']);
      $this->model->insertData('info_penerima', $data);

      $data = array_merge($id_barang, session()->get('data_order')['barang']);
      $this->model->insertData('info_barang', $data);

      $data = [
        'tanggal_transaksi' => date('Y-m-d'),
        'tanggal_diterima' => '',
        'id_kargo' => substr($this->request->getVar('id_kargo'), 0, 4),
        'id_jalur' => $this->request->getVar('id_jalur'),
        'tanggal_penjemputan' => date('Y-m-d', strtotime($this->request->getVar('tanggal_jemput'))),
        'metode_pembayaran' => $this->request->getVar('metode'),
        'status' => 'NOT PAID',
      ];

      $data = array_merge($no_resi, $id_pengirim, $id_penerima, $id_barang, $data);
      $this->model->insertData('transaksi', $data);

      $id_pelanggan = $this->request->getVar('id_pelanggan');

      $count_order = $this->model->queryRowArray("SELECT COUNT(*) as count FROM detail_transaksi WHERE id_pelanggan ='" . $id_pelanggan . "'");

      $data = array_merge($no_resi, [
        'id_pelanggan' => $id_pelanggan,
        'diskon' => (($count_order['count'] > 0) ? "TIDAK" : "YA")
      ]);



      $data_pelanggan = $this->model->getRowDataArray('pelanggan', ['id_pelanggan' => $id_pelanggan]);
      $total = substr($this->request->getVar('id_kargo'), 4) * session()->get('data_order')['barang']['berat'];

      $total_diskon = (($count_order['count'] > 0) ? $total : $total - 20000);

      $metode_pembayaran = $this->request->getVar('metode') ===  'CASH' ?
        '<b>CASH</b><br />
                Silahkan kirim email kembali foto nota pembayaran anda.' :
        '<b>TRANSFER</b><br />BRI
                (8788-283-83727127)<br />
                AN. Rizky Abdillah';

      $this->sendMail(
        $data_pelanggan['email'],
        'Invoice & Pembayaran kargo Express.com',
        '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                  <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <meta name="viewport" content="width=320, initial-scale=1" />
                    <title>Invoice</title>
                    <style type="text/css">
                      #outlook a {
                        padding: 0;
                      }

                      .ReadMsgBody {
                        width: 100%;
                      }

                      .ExternalClass {
                        width: 100%;
                      }

                      .ExternalClass,
                      .ExternalClass p,
                      .ExternalClass span,
                      .ExternalClass font,
                      .ExternalClass td,
                      .ExternalClass div {
                        line-height: 100%;
                      }

                      body,
                      table,
                      td,
                      p,
                      a,
                      li,
                      blockquote {
                        -webkit-text-size-adjust: 100%;
                        -ms-text-size-adjust: 100%;
                      }

                      table,
                      td {
                        mso-table-lspace: 0pt;
                        mso-table-rspace: 0pt;
                      }

                      img {
                        -ms-interpolation-mode: bicubic;
                      }

                      html,
                      body,
                      .body-wrap,
                      .body-wrap-cell {
                        margin: 0;
                        padding: 0;
                        background: #ffffff;
                        font-family: Arial, Helvetica, sans-serif;
                        font-size: 14px;
                        color: #464646;
                        text-align: left;
                      }

                      img {
                        border: 0;
                        line-height: 100%;
                        outline: none;
                        text-decoration: none;
                      }

                      table {
                        border-collapse: collapse !important;
                      }

                      td,
                      th {
                        text-align: left;
                        font-family: Arial, Helvetica, sans-serif;
                        font-size: 14px;
                        color: #464646;
                        line-height: 1.5em;
                      }

                      b a,
                      .footer a {
                        text-decoration: none;
                        color: #464646;
                      }

                      a.blue-link {
                        color: blue;
                        text-decoration: underline;
                      }

                      td.center {
                        text-align: center;
                      }

                      .left {
                        text-align: left;
                      }

                      .body-padding {
                        padding: 24px 40px 40px;
                      }

                      .border-bottom {
                        border-bottom: 1px solid #d8d8d8;
                      }

                      table.full-width-gmail-android {
                        width: 100% !important;
                      }

                      .header {
                        font-weight: bold;
                        font-size: 16px;
                        line-height: 16px;
                        height: 16px;
                        padding-top: 19px;
                        padding-bottom: 7px;
                      }

                      .header a {
                        color: #464646;
                        text-decoration: none;
                      }

                      .footer a {
                        font-size: 12px;
                      }
                    </style>

                    <style type="text/css" media="only screen and (max-width: 650px)">
                      @media only screen and (max-width: 650px) {
                        * {
                          font-size: 16px !important;
                        }

                        table[class*="w320"] {
                          width: 320px !important;
                        }

                        td[class="mobile-center"],
                        div[class="mobile-center"] {
                          text-align: center !important;
                        }

                        td[class*="body-padding"] {
                          padding: 20px !important;
                        }

                        td[class="mobile"] {
                          text-align: right;
                          vertical-align: top;
                        }
                      }
                    </style>
                  </head>
                  <body
                    style="
                      padding: 0;
                      margin: 0;
                      display: block;
                      background: #ffffff;
                      -webkit-text-size-adjust: none;
                    "
                  >
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                      <tr>
                        <td
                          valign="top"
                          align="left"
                          width="100%"
                          style="
                            background: repeat-x
                              url(https://www.filepicker.io/api/file/al80sTOMSEi5bKdmCgp2)
                              #f9f8f8;
                          "
                        >
                          <center>
                            <table
                              class="w320 full-width-gmail-android"
                              bgcolor="#f9f8f8"
                              background="https://www.filepicker.io/api/file/al80sTOMSEi5bKdmCgp2"
                              style="background-color: transparent"
                              cellpadding="0"
                              cellspacing="0"
                              border="0"
                              width="100%"
                            >
                              <tr>
                                <td width="100%" height="48" valign="top">
                                  <table
                                    class="full-width-gmail-android"
                                    cellspacing="0"
                                    cellpadding="0"
                                    border="0"
                                    width="100%"
                                  >
                                    <tr>
                                      <td class="header center" width="100%">
                                        <a href="#"> Express.com </a>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>

                            <table
                              cellspacing="0"
                              cellpadding="0"
                              width="100%"
                              bgcolor="#ffffff"
                            >
                              <tr>
                                <td align="center">
                                  <center>
                                    <table
                                      class="w320"
                                      cellspacing="0"
                                      cellpadding="0"
                                      width="500"
                                    >
                                      <tr>
                                        <td class="body-padding mobile-padding">
                                          <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                              <td
                                                class="left"
                                                style="padding-bottom: 20px; text-align: left"
                                              >
                                                <b>Invoice:</b> ' . $no_resi['no_resi'] . '
                                              </td>
                                            </tr>
                                            <tr>
                                              <td
                                                class="left"
                                                style="padding-bottom: 40px; text-align: left"
                                              >
                                                Hi ' . $data_pelanggan['nama_pelanggan'] . ',<br />
                                                Orderan kargomu berhasil terdaftar, harap
                                                lakukan pembayaran dan konfirmasi kembali kepada
                                                email kami :<br /><br />
                                                METODE PEMBAYARAN : ' . $metode_pembayaran . '
                                              </td>
                                            </tr>
                                          </table>

                                          <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                              <td>
                                                <b>Nama Barang</b>
                                              </td>
                                              <td>
                                                <b>Berat</b>
                                              </td>
                                              <td>
                                                <b>Total</b>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td class="border-bottom" height="5"></td>
                                              <td class="border-bottom" height="5"></td>
                                              <td class="border-bottom" height="5"></td>
                                            </tr>
                                            <tr>
                                              <td style="padding-top: 5px">
                                                ' . session()->get('data_order')['barang']['nama_barang'] . '
                                              </td>
                                              <td style="padding-top: 5px">
                                                ' . session()->get('data_order')['barang']['berat'] . 'KG
                                              </td>
                                              <td style="padding-top: 5px" class="mobile">
                                                Rp. ' . number_format($total_diskon, 2, '.', ',') .  '
                                              </td>
                                            </tr>
                                          </table>

                                          <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                              <td
                                                class="mobile-center"
                                                align="left"
                                                style="padding: 40px 0"
                                              >
                                                <div class="mobile-center" align="left">
                                                  <a
                                                    href="http://localhost:8080/admin/invoice/' . $no_resi['no_resi'] . '"
                                                    style="
                                                      background-color: #41cc00;
                                                      background-image: url(https://www.filepicker.io/api/file/N8GiNGsmT6mK6ORk00S7);
                                                      border: 1px solid #407429;
                                                      border-radius: 4px;
                                                      color: #ffffff;
                                                      display: inline-block;
                                                      font-family: sans-serif;
                                                      font-size: 17px;
                                                      font-weight: bold;
                                                      text-shadow: -1px -1px #47a54b;
                                                      line-height: 38px;
                                                      text-align: center;
                                                      text-decoration: none;
                                                      width: 190px;
                                                      -webkit-text-size-adjust: none;
                                                      mso-hide: all;"
                                                    >Lihat Invoice</a
                                                  >
                                                </div>
                                              </td>
                                            </tr>
                                          </table>

                                          <table cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                              <td class="left" style="text-align: left">
                                                Terima Kasih,
                                              </td>
                                            </tr>
                                          </table>
                                        </td>
                                      </tr>
                                    </table>
                                  </center>
                                </td>
                              </tr>
                            </table>

                            <table
                              class="w320"
                              bgcolor="#E5E5E5"
                              cellpadding="0"
                              cellspacing="0"
                              border="0"
                              width="100%"
                            >
                              <tr>
                                <td style="border-top: 1px solid #b3b3b3" align="center">
                                  <center>
                                    <table
                                      class="w320"
                                      cellspacing="0"
                                      cellpadding="0"
                                      width="500"
                                      bgcolor="#E5E5E5"
                                    >
                                      <tr>
                                        <td>
                                          <table
                                            cellpadding="0"
                                            cellspacing="0"
                                            width="100%"
                                            bgcolor="#E5E5E5"
                                          >
                                            <tr>
                                              <td
                                                class="center"
                                                style="padding: 25px; text-align: center"
                                              >
                                                Hubungi Email Kami
                                                <b><a href="#">cs@Express.com</a></b>
                                                jika anda memiliki pertanyaan.
                                              </td>
                                            </tr>
                                          </table>
                                        </td>
                                      </tr>
                                    </table>
                                  </center>
                                </td>
                              </tr>
                              <tr>
                                <td
                                  style="
                                    border-top: 1px solid #b3b3b3;
                                    border-bottom: 1px solid #b3b3b3;
                                  "
                                  align="center"
                                >
                                  <center>
                                    <table
                                      class="w320"
                                      cellspacing="0"
                                      cellpadding="0"
                                      width="500"
                                      bgcolor="#E5E5E5"
                                    >
                                      <tr>
                                        <td
                                          align="center"
                                          style="padding: 25px; text-align: center"
                                        >
                                          <table
                                            cellspacing="0"
                                            cellpadding="0"
                                            width="100%"
                                            bgcolor="#E5E5E5"
                                          >
                                            <tr>
                                              <td class="center footer" style="font-size: 12px">
                                                <a href="#">Contact Us</a
                                                >&nbsp;&nbsp;|&nbsp;&nbsp;
                                                <span class="footer-group">
                                                  <a href="#">Facebook</a
                                                  >&nbsp;&nbsp;|&nbsp;&nbsp;
                                                  <a href="#">Twitter</a
                                                  >&nbsp;&nbsp;|&nbsp;&nbsp;
                                                  <a href="#">Support</a>
                                                </span>
                                              </td>
                                            </tr>
                                          </table>
                                        </td>
                                      </tr>
                                    </table>
                                  </center>
                                </td>
                              </tr>
                            </table>
                          </center>
                        </td>
                      </tr>
                    </table>
                  </body>
                </html>
                '
      );

      $prefix = (($count_order['count'] > 0) ? "" : "Selamat anda mendapatkan diskon free ongkir!, ");

      $this->model->insertData('detail_transaksi', $data);

      session()->setFlashData('pesan1', 'Data order kargo berhasil disimpan, ' . $prefix . 'silahkan cek email pelanggan untuk detail pembayaran');
      return redirect()->to(route_to('view_order'));
    }
  }

  public function updateStatus()
  {
    $this->model->updateData('transaksi', 'no_resi', $this->request->getVar('no_resi'), [
      'status' => $this->request->getVar('status')
    ]);

    session()->setFlashData('pesan', 'Status berhasil diubah');
    return redirect()->to(route_to('view_order'));
  }

  public function delete($no_resi)
  {
    $data = $this->model->getRowDataArray('transaksi', ['no_resi' => $no_resi]);

    $this->model->deleteData('info_barang', ['id_barang' => $data['id_barang']]);
    $this->model->deleteData('info_penerima', ['id_penerima' => $data['id_penerima']]);
    $this->model->deleteData('info_pengirim', ['id_pengirim' => $data['id_pengirim']]);
    $this->model->deleteData('transaksi', ['no_resi' => $data['no_resi']]);
    $this->model->deleteData('detail_transaksi', ['no_resi' => $data['no_resi']]);


    session()->setFlashData('pesan', 'Data order berhasil dihapus');
    return redirect()->to(route_to('view_order'));
  }

  public function sendMail($penerima, $judul, $isi_pesan)
  {
    $this->email->setFrom('rizkyaks@gmail.com', 'CS Kargo Expresss');
    $this->email->setTo($penerima);

    $this->email->setSubject($judul);
    $this->email->setMessage($isi_pesan);

    if (!$this->email->send()) {
      return false;
    } else {
      return true;
    }
  }
}
