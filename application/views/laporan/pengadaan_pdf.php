<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $judul ?></title>
<style>

body{
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}
#customers {
  border-collapse: collapse;
  width: 100%;
  
}

#customers td {
  border: 0px solid $#ddd;
  padding: 8px;
  font-size: 12px;
}
#customers th{
  padding: 8px;
  font-size: 12px;
}


#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #858796;
  color: white;
}
</style>
</head>
<body>
<table border="0" width="100%">
    <tr>
        <td align="center"><h1>Laporan Pengadaan</h1></td>
    </tr>
    <tr>
        <td align="center">
            <?php if($tglawal == '' || $tglakhir == ''): ?>
                <h6>Semua Tanggal</h6>
            <?php else: ?>
                <h6><?= tgl_indo($tglawal) ?> - <?= tgl_indo($tglakhir) ?></h6>
            <?php endif; ?>
            
        </td>
    </tr>
</table>
<br>
<table id="customers">
  <tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Judul Buku</th>
    <th>Asal Buku</th>
    <th>Jumlah</th>
    <th>Ket</th>
  </tr>
      <?php $no=1; foreach ($data as $p) { ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= tgl_indo($p->tgl) ?></td>
          <td><?= $p->judul ?></td>
          <td><?= $p->asal_buku ?></td>
          <td><?= $p->jml ?></td>
          <td><?= $p->ket ?></td>
        </tr>
      <?php } ?>
</table>

</body>
</html>
