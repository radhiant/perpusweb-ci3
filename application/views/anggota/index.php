<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Anggota</h1>
        <a href="<?= base_url() ?>anggota/tambah" class="btn btn-sm btn-primary btn-icon-split">
            <span class="text text-white">Tambah Data</span>
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
        </a>

    </div>

    <div class="col-lg-12 mb-4" id="container">

        <!-- Illustrations -->
        <div class="card border-bottom-primary shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dtHorizontalExample" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Foto</th>
                                <th>Nama Lengkap</th>
                                <th>No.Telepon</th>
                                <th>Jenis Kelamin</th>
                                <th>Umur</th>
                                <th>Alamat</th>
                                <th width="1%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="cursor:pointer;" id="tbody"> 
                            <?php $no=1; foreach ($anggota as $a): ?>
                            <tr>
                                <td onclick="detail('<?= $a->id_anggota ?>')"><?= $no++ ?>.</td>
                                <td onclick="detail('<?= $a->id_anggota ?>')"><img style="border-radius: 5px;" src="assets/upload/anggota/<?= $a->foto ?>" alt=""
                                        width="75px"></td>
                                <td onclick="detail('<?= $a->id_anggota ?>')"><?= $a->nama_lengkap ?></td>
                                <td onclick="detail('<?= $a->id_anggota ?>')"><?= $a->notelp ?></td>
                                <td onclick="detail('<?= $a->id_anggota ?>')"><?= $a->jk ?></td>
                                <td onclick="detail('<?= $a->id_anggota ?>')"><?= $a->umur ?></td>
                                <td onclick="detail('<?= $a->id_anggota ?>')"><?= $a->alamat ?></td>
                                <td>
                                    <center>
                                        <a href="<?= base_url() ?>anggota/ubah/<?= $a->id_anggota ?>"
                                            class="btn btn-circle btn-success btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="#" onclick="konfirmasi('<?= $a->id_anggota ?>')"
                                            class="btn btn-circle btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </center>
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
<script src="<?= base_url(); ?>assets/js/anggota.js"></script>
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