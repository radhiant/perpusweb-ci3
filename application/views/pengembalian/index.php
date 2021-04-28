<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pengembalian</h1>
        <a href="<?= base_url() ?>pengembalian/tambah" class="btn btn-sm btn-primary btn-icon-split">
            <span class="text text-white">Pengembalian Buku</span>
            <span class="icon text-white-50">
                <i class="fas fa-undo"></i>
            </span>
        </a>

    </div>

    <!-- tabel pengembalian -->
    <div class="col-lg-12 mb-4" id="container">
        <div class="card border-bottom-primary shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dtHorizontalExample" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Tgl Kembali</th>
                                <th>ID Pinjam</th>
                                <th>Anggota</th>
                                <th>Tgl Pinjam</th>
                                <th>Jatuh Tempo</th>
                                <th>Terlambat</th>
                                <th>Denda</th>
                                <th width="1%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($pengembalian as $p) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $p->tgl_kembali ?></td>
                                <td><?= $p->id_pinjam ?></td>
                                <td><?= $p->nama_lengkap ?></td>
                                <td><?= $p->tgl_pinjam ?></td>
                                <td><?= $p->tempo ?></td>
                                <td><?= $p->terlambat ?></td>
                                <td><?= $p->denda ?></td>
                                <td>
                                    <a href="#" onclick="konfirmasi('<?= $p->id_kembali ?>')"
                                        class="btn btn-circle btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pengembalian.js"></script>
<?php if($this->session->flashdata('Pesan')): ?>
<?= $this->session->flashdata('Pesan') ?>
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