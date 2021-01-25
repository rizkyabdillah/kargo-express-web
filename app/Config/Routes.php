<?php

namespace Config;


$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('LoginController');
$routes->setDefaultMethod('index');

$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

// $routes->get('/', 'Home::index');

$routes->group('admin', function ($routes) {

	$routes->get('/', 'LoginController::loginAdmin', [
		'as' => 'login_admin',
		'filter' => 'is_login_admin'
	]);

	$routes->post('/', 'LoginController::authAdmin', [
		'as' => 'auth_admin',
		'filter' => 'is_login_admin'
	]);

	$routes->get('invoice/(:any)', 'IndexController::invoice/$1', ['as' => 'invoice']);

	$routes->get('dashboard', 'LoginController::dashboards', [
		'as' => 'view_dashboard',
		'filter' => 'login_admin'
	]);

	$routes->group('pegawai', ['filter' => 'login_admin'], function ($routes) {
		$routes->get('/', 'PegawaiController::index', ['as' => 'view_pegawai']);
		$routes->get('add', 'PegawaiController::add', ['as' => 'view_add_pegawai']);
		$routes->post('save', 'PegawaiController::save', ['as' => 'save_pegawai']);
		$routes->delete('(:any)', 'PegawaiController::delete/$1', ['as' => 'delete_pegawai']);
		$routes->get('(:any)', 'PegawaiController::edit/$1', ['as' => 'view_edit_pegawai']);
		$routes->post('/', 'PegawaiController::update', ['as' => 'update_pegawai']);
	});

	$routes->group('pelanggan', ['filter' => 'login_admin'], function ($routes) {
		$routes->get('/', 'PelangganController::index', ['as' => 'view_pelanggan']);
		$routes->get('add', 'PelangganController::add', ['as' => 'view_add_pelanggan']);
		$routes->post('save', 'PelangganController::save', ['as' => 'save_pelanggan']);
		$routes->delete('(:any)', 'PelangganController::delete/$1', ['as' => 'delete_pelanggan']);
		$routes->get('(:any)', 'PelangganController::edit/$1', ['as' => 'view_edit_pelanggan']);
		$routes->post('/', 'PelangganController::update', ['as' => 'update_pelanggan']);
	});

	$routes->group('kota', ['filter' => 'login_admin'], function ($routes) {
		$routes->get('/', 'KotaController::index', ['as' => 'view_kota']);
		$routes->get('add', 'KotaController::add', ['as' => 'view_add_kota']);
		$routes->post('save', 'KotaController::save', ['as' => 'save_kota']);
		$routes->delete('(:any)', 'KotaController::delete/$1', ['as' => 'delete_kota']);
		$routes->get('(:any)', 'KotaController::edit/$1', ['as' => 'view_edit_kota']);
		$routes->post('/', 'KotaController::update', ['as' => 'update_kota']);
	});

	$routes->group('jenis', ['filter' => 'login_admin'], function ($routes) {
		$routes->get('/', 'JenisController::index', ['as' => 'view_jenis']);
		$routes->get('add', 'JenisController::add', ['as' => 'view_add_jenis']);
		$routes->post('save', 'JenisController::save', ['as' => 'save_jenis']);
		$routes->delete('(:any)', 'JenisController::delete/$1', ['as' => 'delete_jenis']);
		$routes->get('(:any)', 'JenisController::edit/$1', ['as' => 'view_edit_jenis']);
		$routes->post('/', 'JenisController::update', ['as' => 'update_jenis']);
	});

	$routes->group('order', ['filter' => 'login_admin'], function ($routes) {
		$routes->get('/', 'OrderController::index', ['as' => 'view_order']);
		$routes->get('add', 'OrderController::add', ['as' => 'view_add_order']);
		$routes->post('save', 'OrderController::save', ['as' => 'save_order']);
		$routes->get('addlanjut', 'OrderController::addLanjut', ['as' => 'view_add_orderlanjut']);
		$routes->post('savelanjut', 'OrderController::saveLanjut', ['as' => 'save_orderlanjut']);
		$routes->delete('(:any)', 'OrderController::delete/$1', ['as' => 'delete_order']);
		$routes->post('/', 'OrderController::updateStatus', ['as' => 'update_status']);
	});

	$routes->group('jalur', ['filter' => 'login_admin'], function ($routes) {
		$routes->group('detail', function ($routes) {
			$routes->get('add/(:any)', 'DetailJalurController::add/$1', ['as' => 'view_add_detail']);
			$routes->post('save', 'DetailJalurController::save', ['as' => 'save_detail']);
			$routes->delete('(:any)', 'DetailJalurController::delete/$1', ['as' => 'delete_detail']);
			$routes->get('(:any)/(:any)', 'DetailJalurController::edit/$1/$2', ['as' => 'view_edit_detail']);
			$routes->post('/', 'DetailJalurController::update', ['as' => 'update_detail']);
			$routes->get('(:any)', 'DetailJalurController::index/$1', ['as' => 'view_detail']);
		});
		$routes->get('/', 'JalurController::index', ['as' => 'view_jalur']);
		$routes->get('add', 'JalurController::add', ['as' => 'view_add_jalur']);
		$routes->post('save', 'JalurController::save', ['as' => 'save_jalur']);
		$routes->delete('(:any)', 'JalurController::delete/$1', ['as' => 'delete_jalur']);
		$routes->get('(:any)', 'JalurController::edit/$1', ['as' => 'view_edit_jalur']);
		$routes->post('/', 'JalurController::update', ['as' => 'update_jalur']);
	});

	$routes->get('logout', 'LoginController::logout', ['as' => 'logout_admin']);
	$routes->get('bcrypt/(:any)', 'LoginController::getBcrypt/$1');
});


$routes->group('/', function ($routes) {
	$routes->get('', 'IndexController::index', ['as' => 'index']);

	$routes->get('daftar', 'LoginController::daftar', [
		'as' => 'daftar',
		'filter' => 'is_login_user'
	]);

	$routes->post('daftar', 'LoginController::daftarUser', [
		'as' => 'daftar_user',
		'filter' => 'is_login_user'
	]);

	$routes->get('login', 'LoginController::loginUser', [
		'as' => 'login_user',
		'filter' => 'is_login_user'
	]);

	$routes->post('login', 'LoginController::authUser', [
		'as' => 'auth_user',
		'filter' => 'is_login_user'
	]);

	$routes->get('produk', 'IndexController::produk', ['as' => 'produk']);
	$routes->get('tentang', 'IndexController::tentang', ['as' => 'tentang']);

	$routes->post('cekresi', 'IndexController::cekResi', ['as' => 'cekresi']);
	$routes->get('resi', 'IndexController::resi', ['as' => 'resi']);
	$routes->post('cekharga', 'IndexController::cekHarga', ['as' => 'cekharga']);

	$routes->get('dashboard', 'LoginController::dashboard', [
		'as' => 'dashboard',
		'filter' => 'login_user'
	]);

	$routes->post('ubah', 'LoginController::ubahUser', [
		'as' => 'ubah_user',
		'filter' => 'login_user'
	]);

	$routes->get('logout', 'LoginController::logoutUser', [
		'as' => 'logout_user',
		'filter' => 'login_user'
	]);

	$routes->post('cek1', 'IndexController::cekPertama', [
		'as' => 'cek_pertama',
		'filter' => 'login_user'
	]);

	$routes->get('order', 'IndexController::order', [
		'as' => 'order',
		'filter' => 'login_user'
	]);

	$routes->get('orderlanjut', 'IndexController::orderLanjut', [
		'as' => 'order_lanjut',
		'filter' => 'login_user'
	]);

	$routes->post('orderlanjut', 'IndexController::orderFix', [
		'as' => 'order_fix',
		'filter' => 'login_user'
	]);
});

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
