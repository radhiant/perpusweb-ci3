<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-sm-flex">
            <a href="<?= base_url() ?>buku" class="btn btn-md btn-circle btn-primary">
                <i class="fas fa-arrow-left"></i>
            </a>
            &nbsp;
            <h1 class="h2 mb-0 text-gray-800">Detail Buku</h1>
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
            <div class="card shadow border-bottom-primary mb-4">
                <div class="card-body d-sm-flex">
                    <div class="col-lg-3">
                        <img width="100%" style="border-radius: 10px;"
                            src="<?= base_url() ?>assets/upload/buku/<?= $d->foto ?>" alt="">
                    </div>

                    <br>

                    <div class="col-lg-9">
                        <!-- ID Buku -->
                        <div class="form-group"><label>ID Buku</label>
                            <h4 class="h4 text-gray-800"><b><?= $d->id_buku ?></b></h4>
                        </div>

                         <!-- Divider -->
                         <hr class="sidebar-divider">

                        <!-- Judul Buku -->
                        <div class="form-group"><label>Judul Buku</label>
                            <h4 class="h4 text-gray-800"><?= $d->judul ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Kategori -->
                        <div class="form-group"><label>Kategori</label>
                            <h4 class="h4 text-gray-800"><?= $d->kategori ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Pengarang -->
                        <div class="form-group"><label>Pengarang</label>
                            <h4 class="h4 text-gray-800"><?= $d->pengarang ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- ISBN -->
                        <div class="form-group"><label>ISBN</label>
                            <h4 class="h4 text-gray-800"><?= $d->isbn ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Jumlah Hal -->
                        <div class="form-group"><label>Jumlah Halaman</label>
                            <h4 class="h4 text-gray-800"><?= $d->jmlhal ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Jumlah Buku -->
                        <div class="form-group"><label>Jumlah Buku</label>
                            <h4 class="h4 text-gray-800"><?= $d->jmlbuku ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Tahun -->
                        <div class="form-group"><label>Tahun</label>
                            <h4 class="h4 text-gray-800"><?= $d->tahun ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Sinopsis -->
                        <div class="form-group"><label>Sinopsis</label>
                            <h4 class="h4 text-gray-800"><?= $d->sinopsis ?></h4>
                        </div>
                        
                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Penerbit -->
                        <div class="form-group"><label>Penerbit</label>
                            <h4 class="h4 text-gray-800"><?= $d->penerbit ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Rak -->
                        <div class="form-group"><label>Rak</label>
                            <h4 class="h4 text-gray-800"><?= $d->rak ?></h4>
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
<script src="<?= base_url(); ?>assets/js/buku.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formbuku.js"></script>
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