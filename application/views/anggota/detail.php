<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-sm-flex">
            <a href="<?= base_url() ?>anggota" class="btn btn-md btn-circle btn-primary">
                <i class="fas fa-arrow-left"></i>
            </a>
            &nbsp;
            <h1 class="h2 mb-0 text-gray-800">Detail Anggota</h1>
        </div>
        <!-- 
            <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                <span class="text text-white">Simpan Data</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>
            -->
    </div>

    <?php foreach ($data as $d): ?>

    <div class="d-sm-flex  justify-content-between mb-0">
        <div class="col-lg-12 mb-4">
            <!-- buku -->
            <div class="card border-bottom-primary shadow mb-4">
                <div class="card-body d-sm-flex">
                    <div class="col-lg-3">
                        <img width="100%" style="border-radius: 10px;"
                            src="<?= base_url() ?>assets/upload/anggota/<?= $d->foto ?>" alt="">
                    </div>

                    <br>

                    <div class="col-lg-9">
                        <!-- ID Anggota -->
                        <div class="form-group"><label>ID Anggota</label>
                            <h4 class="h4 text-gray-800"><b><?= $d->id_anggota ?></b></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Nama Lengkap -->
                        <div class="form-group"><label>Nama Lengkap</label>
                            <h4 class="h4 text-gray-800"><?= $d->nama_lengkap ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- NoTelepon -->
                        <div class="form-group"><label>Nomor Telepon</label>
                            <h4 class="h4 text-gray-800"><?= $d->notelp ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Jenis Kelamin -->
                        <div class="form-group"><label>Jenis Kelamin</label>
                            <h4 class="h4 text-gray-800"><?= $d->jk ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Tempat Lahir -->
                        <div class="form-group"><label>Tempat lahir</label>
                            <h4 class="h4 text-gray-800"><?= $d->tempat ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- tgl Lahir -->
                        <div class="form-group"><label>Tanggal Lahir</label>
                            <h4 class="h4 text-gray-800"><?= $d->tgllahir ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Umur -->
                        <div class="form-group"><label>Umur</label>
                            <h4 class="h4 text-gray-800"><?= $d->umur ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Alamat -->
                        <div class="form-group"><label>Alamat</label>
                            <h4 class="h4 text-gray-800"><?= $d->alamat ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

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
<script src="<?= base_url(); ?>assets/js/anggota.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formanggota.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>

<script>
$('.chosen').chosen({
    width: '100%',

});
</script>

<?php if($this->session->flashdata('Pesan')): ?>

<?php else: ?>
<script>
$(document).ready(function() {

    $('#pdf').hide();

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