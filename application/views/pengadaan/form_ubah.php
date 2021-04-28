<?php
function format($tanggal){
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[1] . '/' . $pecahkan[2] . '/' . $pecahkan[0];
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <?php foreach($data as $d): ?>

    <form action="<?= base_url() ?>pengadaan/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">


        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                <a href="<?= base_url() ?>pengadaan" class="btn btn-md btn-circle btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                &nbsp;
                <h1 class="h2 mb-0 text-gray-800">Ubah Pengadaan</h1>
            </div>

            <button type="submit" class="btn btn-success btn-md btn-icon-split">
                <span class="text text-white">Simpan Perubahan</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>

        </div>

        <div class="d-sm-flex  justify-content-between mb-0">
            <div class="col-lg-8 mb-4">
                <!-- form -->
                <div class="card border-bottom-primary shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Form Pengadaan</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">

                            <!-- ID Pengadaan -->
                            <div class="form-group"><label>ID Pengadaan</label>
                                <input class="form-control" name="id" type="text" value="<?= $d->id_pengadaan ?>"
                                    readonly>
                            </div>

                            <!-- Judul Buku -->
                            <div class="form-group"><label>Judul Buku</label>
                                <input type="hidden" name="buku" value="<?= $d->id_buku ?>">
                                <input class="form-control" name="preview" type="text" value="<?= $d->judul ?>"
                                    autocomplete="off" readonly>
                            </div>

                            <!-- Tgl -->
                            <div class="form-group"><label>Tanggal</label>
                                <input class="form-control" name="tgl" id="datepicker" type="text"
                                    value="<?= format($d->tgl) ?>" autocomplete="off">
                            </div>

                            <!-- Jumlah Buku -->
                            <div class="form-group"><label>Jumlah Buku</label>
                                <input name="jmlbukulama" type="hidden" value="<?= $d->jml ?>">
                                <input class="form-control" name="jmlbuku" type="number" value="<?= $d->jml ?>">
                            </div>

                            <!-- Asal Buku -->
                            <div class="form-group"><label>Asal Buku</label>
                                <input class="form-control" name="aslbuku" type="text" value="<?= $d->asal_buku ?>">
                            </div>

                            <!-- Ket -->
                            <div class="form-group"><label>Keterangan</label>
                                <textarea class="form-control" name="ket"><?= $d->ket ?></textarea>
                            </div>

                        </div>


                        <br>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 mb-4">
                <!-- file -->
                <div class="card border-bottom-primary shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Preview</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">

                            <center>
                                <img id="preview" width="200px"
                                    src="<?= base_url() ?>assets/upload/buku/<?= $d->foto ?>" alt="">
                            </center>

                            <br>

                            <label><b>Judul Buku</b></label>
                            <br>
                            <h6 class="h6 text-gray-800" id="judul"><?= $d->judul ?></h6>
                            <!-- Divider -->
                            <hr class="sidebar-divider">

                            <label><b>Stok Buku</b></label>
                            <br>
                            <h6 class="h6 text-gray-800" id="stok"><?= $d->jmlbuku ?></h6>
                            <!-- Divider -->
                            <hr class="sidebar-divider">


                        </div>
                    </div>
                </div>

            </div>
        </div>


    </form>
    <?php endforeach; ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pengadaan.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formpengadaan.js"></script>
<script src="<?= base_url(); ?>assets/plugin/datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>


<script>
$('.chosen').chosen({
    width: '100%',

});

$('#datepicker').datepicker({
    autoclose: true
});
</script>

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