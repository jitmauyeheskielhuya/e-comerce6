<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PembelianModel;
// use CodeIgniter\I18n\Time;
use CodeIgniter\HTTP\IncomingRequest;

class Pelanggan extends BaseController
{
  protected $BarangModel;
  protected $pembelianModel;

  public $api_key = "bfe7d1ce6c12d2dde8e8a2df42dbcb2f";

  public function __construct()
  {
    $this->BarangModel = new BarangModel();
    $this->pembelianModel = new PembelianModel();
    helper('number');
    helper('form');
    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = 'SB-Mid-server-yzB1hCmarPWIlsMcXVV3gMjv';
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;


    // Add new notification url(s) alongside the settings on Midtrans Dashboard Portal (MAP)
    \Midtrans\Config::$appendNotifUrl = "http://localhost:8080/pelanggan/cekmidtrans";
    // Use new notification url(s) disregarding the settings on Midtrans Dashboard Portal (MAP)
    \Midtrans\Config::$overrideNotifUrl = "http://localhost:8080/pelanggan/cekmidtrans";



  }

  public function layout_pelanggan()
  {
    $data = [
      'barang' => $this->BarangModel->get_barang(),
      'cart' => \Config\Services::cart(),
    ];

    return view('pelanggan/home_pelanggan', $data);
  }

  // crud shopping cart
  public function cek()
  {
    $cart = \Config\Services::cart();
    $response = $cart->contents();
    echo '<pre>';
    print_r($response);
    echo '</pre>';
  }

  // Insert shopping cart
  public function add()
  {
    $token = '';
    $cart = \Config\Services::cart();
    $cart->insert(array(
      'id'      => $this->request->getPost('id'),
      'qty'     => 1,
      'price'   => $this->request->getPost('price'),
      'name'    => $this->request->getPost('name'),
      'options' => array(
        'gambar' => $this->request->getPost('gambar'),
        'ukuran' => $this->request->getPost('ukuran'),
        'motif' => $this->request->getPost('motif'),
      )
    ));
    session()->setFlashdata('pesan', 'Barang Berhasil Dimasukan Keranjang !!!');
    return redirect()->to(base_url('pelanggan/cart'));
  }

  // Clear the shopping cart
  public function clear()
  {
    $cart = \Config\Services::cart();
    $cart->destroy();
  }


  public function ongkir()
  {
    $asal_kota = $this->request->getPost('asal');
    $tujuan_kota = $this->request->getPost('tujuan');
    $berat = $this->request->getPost('berat');
    $kurir = $this->request->getPost('kurir');

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "origin=" . $asal_kota . "&destination=" . $tujuan_kota . "&weight=" . $berat . "&courier=" . $kurir,
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: " . $this->api_key,
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    if ($err) {
      // echo "cURL Error #:" . $err;
      $data['hasil'] = array('error' => true);
    } else {
      // echo $response;
      $data['hasil'] = json_decode($response);
    };


    return view('pelanggan/view_cart/index', [$data]);
  }
  
  public function cart()
  {
    // menampilkan kota dari API RajaOngkir
    $data['token'] = null;
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "key: " . $this->api_key,
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    if ($err) {
      // echo "cURL Error #:" . $err;
      $kota = array('error' => true);
    } else {
      // echo $response;
      $kota = json_decode($response);
    };

    $cek = \Config\Services::cart();
    $cek = (count($cek->contents()));
    if ($cek == 0) {
      session()->setFlashdata('pesan', 'Data Keranjang Masih Kosong !!!');
      return redirect()->to(base_url('pelanggan'));
    }
    $data = [
      'barang' => $this->BarangModel->get_barang(),
      'cart' => \Config\Services::cart(),
      'kota' => $kota,
      'token' => null
    ];

    if (isset($_POST['submit'])) {
      $asal_kota = $this->request->getPost('asal');
      $tujuan_kota = $this->request->getPost('tujuan');
      $berat = $this->request->getPost('berat');
      $kurir = $this->request->getPost('kurir');

      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=" . $asal_kota . "&destination=" . $tujuan_kota . "&weight=" . $berat . "&courier=" . $kurir,
        CURLOPT_HTTPHEADER => array(
          "content-type: application/x-www-form-urlencoded",
          "key: " . $this->api_key,
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);
      if ($err) {
        // echo "cURL Error #:" . $err;
        $data['hasil'] = array('error' => true);
      } else {
        // echo $response;
        $data['hasil'] = json_decode($response);
      };
    }

    if (isset($_POST['snap'])) {
      $db      = \Config\Database::connect();
      $Totalharga = $this->request->getPost('Totalharga');
      $id_order = time();
      $builder = $db->table('users');
      $builder->select('*');
      $builder->where('users.id', user()->id);
      $query = $builder->get()->getResultArray();
      $nama_depan = $query[0]['nama_depan'];
      $nama_belakang = $query[0]['nama_belakang'];
      $email = $query[0]['email'];
      $ponsel = $query[0]['no_hp'];
      $enable_payments = array('bri_va', 'bca_va');


      $item1_details = array(
        'id' => $id_order . '77',
        'price' => (int)$Totalharga,
        'quantity' => 1,
        'name' => 'Total Pembayaran',
      );

      $item_details = array($item1_details);
      $params = array(
        'transaction_details' => array(
          'order_id' => $id_order,
          'gross_amount' => (int)$Totalharga,
        ),
        'customer_details' => array(
          'first_name' => $nama_depan,
          'last_name' => $nama_belakang,
          'email' => $email,
          'phone' => $ponsel,
        ),
        // Optional
        'item_details' => $item_details,

        'enabled_payments' => $enable_payments
      );

      $snapToken = \Midtrans\Snap::getSnapToken($params);
      $token = $snapToken;
      $data = [
        // proses bukti pembelian
        'id_pembelian' => $id_order,
        'id_user' => user()->id,
        'total_harga' => $Totalharga,
        'token' => $token
      ];
      $this->pembelianModel->save($data);
      $cart = \Config\Services::cart();
      // $cart->destroy();
      $data = [
        'barang' => $this->BarangModel->get_barang(),
        'cart' => \Config\Services::cart(),
        'kota' => $kota,
        'token' => $token
      ];
      $cart->destroy();
      return redirect()->to('https://app.sandbox.midtrans.com/snap/v2/vtweb/' . $token);
    }


    return view('pelanggan/view_cart/index', $data);
    session()->setFlashdata('pesan', 'Brhasil Update');
    return redirect()->to(base_url('pelanggan/cart'));
  }


  public function proses()
  {
    $nama_depan = $this->request->getVar('nama_depan');
    $nama_belakang = $this->request->getVar('nama_belakang');
    $email = $this->request->getVar('email');
    $ponsel = $this->request->getVar('ponsel');
    $nominal = $this->request->getVar('nominal');
    $id_order = time();


    $params = array(
      'transaction_details' => array(
        'order_id' => $id_order,
        'gross_amount' => $nominal,
      ),
      'customer_details' => array(
        'first_name' => $nama_depan,
        'last_name' => $nama_belakang,
        'email' => $email,
        'phone' => $ponsel,
      ),
    );
    $snapToken = \Midtrans\Snap::getSnapToken($params);
    $token = $snapToken;
    $data = [
      // proses bukti pembelian
      'id_pembelian' => $id_order,
      'nama_depan' => $nama_depan,
      'nama_belakang' => $nama_belakang,
      'email' => $email,
      'ponsel' => $ponsel,
      'nominal' => $nominal,
      'token' => $token
    ];
    $this->pembelianModel->save($data);
    return redirect()->to(base_url('pelanggan/pembelian'));

  }

  public function delete($rowid)
  {
    $cart = \Config\Services::cart();
    $cart->remove($rowid);
    session()->setFlashdata('pesan', 'Barang Berhasil Di update !!!');
    return redirect()->to(base_url('pelanggan/cart'));
  }

  public function pembelian()
  {



    $cek = $this->pembelianModel->get_pembelian();
    $hasil = $cek->getResult();

    // foreach ($hasil as $h) {
    //   $notif =  \Midtrans\Transaction::status('9cfcfbad-9df9-4256-8d4c-bea0ffbb2b38');

    // var_dump($notif);
    // $transaction_status = $notif->transaction_status;
    // $fraud = $notif->fraud_status;
    // }


    // $status = \Midtrans\Transaction::status('9cfcfbad-9df9-4256-8d4c-bea0ffbb2b38');
    // var_dump($status);



    $data = [
      'barang' => $this->BarangModel->get_barang(),
      'cart' => \Config\Services::cart(),
      'tagihan' => $this->pembelianModel->get_pembelian(),
    ];


    return view('pelanggan/view_cart/pembelian', $data);
  }



  public function transaksi()
  {
    // // Set your Merchant Server Key
    // \Midtrans\Config::$serverKey = 'SB-Mid-server-yzB1hCmarPWIlsMcXVV3gMjv';
    // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    // \Midtrans\Config::$isProduction = false;
    // // Set sanitization on (default)
    // \Midtrans\Config::$isSanitized = true;
    // // Set 3DS transaction for credit card to true
    // \Midtrans\Config::$is3ds = true;

    // $params = [
    //   'transaction_details' => array(
    //     'order_id' => rand(),
    //     'gross_amount' => 500000,
    //   )
    // ];

    // $data = [
    //   'snapToken' => \Midtrans\Snap::getSnapToken($params)
    // ];

    // return view('pelanggan/view_cart/transaksi', $data);
  }

  // public function save2()
  // {
  //   $validation = \Config\Services::validation();

  //   $data = [
  //     'Totalharga' => $this->request->getPost('Totalharga'),

  //   ];
  //   return redirect()->to(base_url('/pelanggan/pembelian'));
  // }

  public function save1($id_pembelian)
  {
    $data = [
      'Totalharga' => $this->request->getPost('Totalharga'),
    ];
    // return view('/pelanggan/cart', $data);
    return redirect()->to(base_url('pelanggan/pembelian'));
  }

  public function savetotal($id_pembelian)
  {
    $validation = \Config\Services::validation();


    $data = [
      'totalharga' => $this->request->getPost('Totalharga'),

    ];

    $this->pembelianModel->update_produk($data, $id_pembelian);
    // session()->setFlashdata('success', 'Data Berhasil Diupdate !!!');
    return redirect()->to(base_url('pelanggan/pembelian'));
  }


  public function smart()
  {
    $data = [
      'barang' => $this->BarangModel->get_barang(),
      'cart' => \Config\Services::cart(),

    ];

    return view('pelanggan/smart', $data);
  }

  public function cekmidtrans()
  {
  }

}
