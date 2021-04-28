<!-- Begin Page Content -->
<div class="container-fluid">

    <form action="<?= base_url() ?>pengadaan/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">


        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                <a href="<?= base_url() ?>pengadaan" class="btn btn-md btn-circle btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                &nbsp;
                <h1 class="h2 mb-0 text-gray-800">Tambah Pengadaan</h1>
            </div>

            <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                <span class="text text-white">Simpan Data</span>
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

                            <!-- Judul Buku -->
                            <?php if($jmlbuku > 0): ?>
                            <div class="form-group"><label>Buku</label>
                                <select name="buku" class="form-control chosen" onchange="ambilBuku()">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($buku as $b): ?>
                                    <option value="<?= $b->id_buku ?>"><?= $b->judul ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?php else: ?>
                            <div class="form-group"><label>Buku</label>
                                <input type="hidden" name="buku">
                                <div class="d-sm-flex justify-content-between">
                                    <span class="text-danger"><i>(Belum Ada Data Buku!)</i></span>
                                    <a href="<?= base_url() ?>buku" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon text-white">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Tgl -->
                            <div class="form-group"><label>Tanggal</label>
                                <input class="form-control" name="tgl" id="datepicker" value="<?= $tglnow ?>" type="text" placeholder=""
                                    autocomplete="off">
                            </div>

                            <!-- Jumlah Buku -->
                            <div class="form-group"><label>Jumlah Buku</label>
                                <input class="form-control" name="jmlbuku" type="number" placeholder="">
                            </div>

                            <!-- Asal Buku -->
                            <div class="form-group"><label>Asal Buku</label>
                                <input class="form-control" name="aslbuku" type="text" placeholder="">
                            </div>

                            <!-- Ket -->
                            <div class="form-group"><label>Keterangan</label>
                                <textarea class="form-control" name="ket" placeholder=""></textarea>
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
                                <img id="preview" width="200px" src="<?= base_url() ?>assets/upload/buku/book.png"
                                    alt="">
                            </center>

                            <br>

                            <label><b>Judul Buku</b></label>
                            <br>
                            <h6 class="h6 text-gray-800" id="judul">-</h6>
                            <!-- Divider -->
                            <hr class="sidebar-divider">

                            <label><b>Stok Buku</b></label>
                            <br>
                            <h6 class="h6 text-gray-800" id="stok">-</h6>
                            <!-- Divider -->
                            <hr class="sidebar-divider">


                        </div>
                    </div>
                </div>

            </div>
        </div>


    </form>

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