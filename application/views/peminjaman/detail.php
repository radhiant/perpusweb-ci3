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

	// variabel pecahkan 1 = tanggal
	// variabel pecahkan 0 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
<?php foreach($data as $d): ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                <a href="<?= base_url() ?>peminjaman" class="btn btn-md btn-circle btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                &nbsp;
                <h1 class="h2 mb-0 text-gray-800">Detail Peminjaman</h1>
            </div>

            <h4 class="h4 mb-0 text-gray-800">Di Input oleh : <?= $d->usr_input ?></h4>

        </div>

    <div class="col-lg-12 mb-4">

        <div class="row">

            <div class="col-lg-4">
            
                <div class="card border-bottom-primary shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Peminjam</h6>
                    </div>
                    <div class="card-body">
                        <center class="mb-4">
                        <img width="50%" style="border-radius: 10px;"
                            src="<?= base_url() ?>assets/upload/anggota/<?= $d->foto ?>" alt="">
                        </center>

                         <!-- ID Anggota -->
                         <div class="form-group"><label>ID Anggota</label>
                            <h4 class="h4 text-gray-800"><b><?= $d->id_anggota ?></b></h4>
                        </div>

                         <!-- Divider -->
                         <hr class="sidebar-divider">

                         <!-- Nama Anggota -->
                         <div class="form-group"><label>Nama Lengkap</label>
                            <h4 class="h4 text-gray-800"><?= $d->nama_lengkap ?></h4>
                        </div>

                         <!-- Divider -->
                         <hr class="sidebar-divider">

                         <!-- Nomor Telepon -->
                         <div class="form-group"><label>Nomor Telepon</label>
                            <h4 class="h4 text-gray-800"><?= $d->notelp ?></h4>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-lg">
            
                <div class="card border-bottom-primary shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Data</h6>
                    </div>
                    <div class="card-body">

                        <!-- ID Anggota -->
                        <div class="form-group"><label>ID Pinjam</label>
                            <h4 class="h4 text-gray-800"><b><?= $d->id_pinjam ?></b></h4>
                        </div>

                         <!-- Divider -->
                         <hr class="sidebar-divider">

                         <!-- Tanggal Pinjam -->
                         <div class="form-group"><label>Tanggal Pinjam</label>
                            <h4 class="h4 text-gray-800"><?= tgl_indo($d->tgl_pinjam) ?></h4>
                        </div>

                         <!-- Divider -->
                         <hr class="sidebar-divider">

                         <!-- Tempo -->
                         <div class="form-group"><label>Tempo</label>
                            <h4 class="h4 text-gray-800"><?= tgl_indo($d->tempo) ?></h4>
                         </div>

                         <!-- Divider -->
                         <hr class="sidebar-divider">

                        <!-- Status -->
                        <div class="form-group"><label>Status</label>
                            <?php if($d->status == 'Pinjam'): ?>

                                <div class="card shadow bg-primary">
                                    <div class="card-body">
                                        <h4 class="h4 text-white"><?= $d->status ?></h4>
                                    </div>
                                </div>

                            <?php else: ?>
                                
                                <div class="card shadow bg-success">
                                    <div class="card-body">
                                        <h4 class="h4 text-white"><?= $d->status ?></h4>
                                    </div>
                                </div>

                            <?php endif; ?>

                         </div>

                         <!-- Divider -->
                         <hr class="sidebar-divider">

                         <!-- Keterangan -->
                        <div class="form-group"><label>Keterangan</label>
                            <?php if($d->ket === ''): ?>
                                <h4 class="h4 text-gray-800"><i>(Tidak diisi)</i></h4>
                            <?php else: ?>
                                <h4 class="h4 text-gray-800"><?= $d->ket ?></h4>
                            <?php endif; ?>
                            
                         </div>


                    </div>
                </div>

            </div>

            <div class="col-lg-12">
            
                <div class="card border-bottom-primary shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">List Buku yang di pinjam</h6>
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                                    <table class="table" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th>ID Buku</th>
                                                <th>Judul Buku</th>
                                                <th>ISBN</th>
                                                <th>Pengarang</th>
                                                <th>Qty</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            <?php $no=1; foreach($listbuku as $b): ?>

                                                <tr>
                                                    <td><?= $no++ ?>.</td>
                                                    <td><?= $b->id_buku ?></td>
                                                    <td><?= $b->judul ?></td>
                                                    <td><?= $b->isbn ?></td>
                                                    <td><?= $b->pengarang ?></td>
                                                    <td><?= $b->qty ?></td>
                                                </tr>

                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

<?php endforeach; ?>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>

<?php if($this->session->flashdata('Pesan')): ?>

<?php else: ?>
<script>
$(document).ready(function() {

    let timerInterval
    Swal.fire({
        title: 'Memuat...',
        timer: 1000,
        onBeforeOpen: () => {
            Swal.showLoading()
        },
        onClose: () => {
            clearInterval(timerInterval)
        }
    }).then((result) => {

    })
});
</script>
<?php endif; ?>