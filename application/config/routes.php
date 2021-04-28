<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home/index';

$route['home'] = 'Home/index';
$route['setting'] = 'Setting/index';
$route['profile'] = 'Profile/index';
$route['buku'] = 'Buku/index';
$route['anggota'] = 'Anggota/index';
$route['kategori'] = 'Kategori/index';
$route['penerbit'] = 'Penerbit/index';
$route['pengadaan'] = 'Pengadaan/index';
$route['rak'] = 'Rak/index';
$route['boq'] = 'Boq/index';
$route['login'] = 'Login/index';
$route['peminjaman'] = 'Peminjaman/index';
$route['pengembalian'] = 'Pengembalian/index';
//user
$route['user'] = 'User/index';
//laporan
$route['lapengadaan'] = 'Laporan/pengadaan';
$route['lapeminjaman'] = 'Laporan/peminjaman';


$route['(:any)'] = 'gagal/index/$1';
$route['404_override'] = 'Gagal/index';
$route['translate_uri_dashes'] = FALSE;
