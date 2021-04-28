<!-- Begin Page Content -->
<div class="container-fluid">

    <form action="<?= base_url() ?>anggota/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">


        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                <a href="<?= base_url() ?>anggota" class="btn btn-md btn-circle btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                &nbsp;
                <h1 class="h2 mb-0 text-gray-800">Tambah Anggota</h1>
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
                        <h6 class="m-0 font-weight-bold text-white">Form Anggota</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <!-- Nama Lengkap -->
                            <div class="form-group"><label>Nama Lengkap</label>
                                <input class="form-control" name="nmlengkap" type="text" placeholder="">
                            </div>

                            <!-- NO Telepon -->
                            <div class="form-group"><label>Nomor Telepon</label>
                                <input class="form-control" name="notelp" type="number" >
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="form-group"><label>Jenis Kelamin</label>

                                <div class="col-sm-12 d-flex">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="laki" name="jk" value="Laki-laki" checked>
                                        <label class="custom-control-label" for="laki">Laki - laki</label>
                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" value="Perempuan" id="perempuan" name="jk">
                                        <label class="custom-control-label" for="perempuan">Perempuan</label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="d-sm-flex align-items-center justify-content-between mb-0">
                            <div class="col-lg-4">
                                <!-- Tempat Lahir -->
                                <div class="form-group"><label>Tempat Lahir</label>
                                    <input class="form-control" name="tempat" type="text" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- tgl Lahir -->
                                <div class="form-group"><label>Tgl Lahir</label>
                                    <input class="form-control" name="tgllahir" id="datepicker" type="text"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- umur -->
                                <div class="form-group"><label>Umur</label>
                                    <input class="form-control" name="umur" type="number" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">

                            <!-- Alamat -->
                            <div class="form-group"><label>Alamat</label>
                                <textarea class="form-control" name="alamat" type="text" placeholder=""></textarea>
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
                        <h6 class="m-0 font-weight-bold text-white">Foto</h6>
                    </div>
                    <div class="card-body">
                        <div class="card bg-warning text-white shadow">
                            <div class="card-body">
                                Format
                                <div class="text-white-45 small">.png .jpeg .jpg .tiff .gif .tif</div>
                            </div>
                        </div>
                        <br>
                        <center>
                            <div id="img">
                                <img src="<?= base_url() ?>assets/icon/man.png" id="outputImg" width="200"
                                    maxheight="300">
                            </div>
                            <div id="pdf">
                                <embed src="<?= base_url() ?>assets/icon/man.png" id="outputPdf" width="300"
                                    height="400" type="application/pdf">
                            </div>
                        </center>
                        <br>
                        <!-- foto -->
                        <div class="form-group">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" id="GetFile" name="photo"
                                    onchange="VerifyFileNameAndFileSize()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                                <label class="custom-file-label" for="customFile">Pilih File</label>
                            </div>
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
<script src="<?= base_url(); ?>assets/js/anggota.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formanggota.js"></script>
<script src="<?= base_url(); ?>assets/plugin/datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
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