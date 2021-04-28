<?php foreach ($data as $d) { ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <form action="<?= base_url() ?>buku/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                <a href="<?= base_url() ?>buku" class="btn btn-md btn-circle btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                &nbsp;
                <h1 class="h2 mb-0 text-gray-800">Ubah Buku</h1>
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
                <!-- Illustrations -->
                <div class="card border-bottom-primary shadow mb-4">
                    <div class="card-header bg-primary py-3">
                        <h6 class="m-0 font-weight-bold text-white">Form Buku</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <!-- Id Buku -->
                            <div class="form-group"><label>ID Buku</label>
                                <input class="form-control" name="id" type="text" readonly value="<?= $d->id_buku ?>">
                            </div>

                            <!-- Judul Buku -->
                            <div class="form-group"><label>Judul Buku</label>
                                <input class="" name="id" type="hidden" value="<?= $d->id_buku ?>">
                                <input class="form-control" name="buku" type="text" value="<?= $d->judul ?>">
                            </div>

                            <!-- Kategori -->
                            <?php if($jmlKategori > 0): ?>
                            <div class="form-group"><label>Kategori</label>
                                <select name="kategori" class="form-control chosen">
                                    <?php foreach($kategori as $k): ?>

                                    <?php if($d->id_kategori == $k->id_kategori): ?>
                                    <option value="<?= $k->id_kategori ?>" selected><?= $k->kategori ?></option>
                                    <?php else: ?>
                                    <option value="<?= $k->id_kategori ?>"><?= $k->kategori ?></option>
                                    <?php endif; ?>

                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?php else: ?>
                            <div class="form-group"><label>Kategori</label>
                                <input type="hidden" name="kategori">
                                <div class="d-sm-flex justify-content-between">
                                    <span class="text-danger"><i>(Belum Ada Data Kategori!)</i></span>
                                    <a href="<?= base_url() ?>kategori" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon text-white">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Pengarang -->
                            <div class="form-group"><label>Pengarang</label>
                                <input class="form-control" name="pengarang" type="text" value="<?= $d->pengarang ?>">
                            </div>

                            <!-- ISBN -->
                            <div class="form-group"><label>ISBN</label>
                                <input class="form-control" name="isbn" type="text" value="<?= $d->isbn ?>">
                            </div>
                        </div>

                        <div class="d-sm-flex align-items-center justify-content-between mb-0">
                            <div class="col-lg-4">
                                <!-- jmlHal -->
                                <div class="form-group"><label>Jumlah Halaman</label>
                                    <input class="form-control" name="jmlhal" type="number" value="<?= $d->jmlhal ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- jmlBuku -->
                                <div class="form-group"><label>Jumlah Buku</label>
                                    <input class="form-control" name="jmlbuku" type="number" value="<?= $d->jmlbuku ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- thnTerbit -->
                                <div class="form-group"><label>tahun Terbit</label>
                                    <input class="form-control" name="thn" type="number" value="<?= $d->tahun ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">

                            <!-- Sinopsis -->
                            <div class="form-group"><label>Sinopsis</label>
                                <textarea class="form-control" name="sinopsis"
                                    type="text"><?= $d->sinopsis ?></textarea>
                            </div>

                            <!-- Penerbit -->
                            <?php if($jmlPenerbit > 0): ?>
                            <div class="form-group"><label>Penerbit</label>
                                <select name="penerbit" class="form-control chosen" value="<?= $d->id_penerbit ?>">
                                    <?php foreach($penerbit as $p): ?>

                                    <?php if($d->id_penerbit == $p->id_penerbit): ?>
                                    <option value="<?= $p->id_penerbit ?>" selected><?= $p->penerbit ?></option>
                                    <?php else: ?>
                                    <option value="<?= $p->id_penerbit ?>"><?= $p->penerbit ?></option>
                                    <?php endif; ?>

                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?php else: ?>
                            <div class="form-group"><label>Penerbit</label>
                                <input type="hidden" name="penerbit">
                                <div class="d-sm-flex justify-content-between">
                                    <span class="text-danger"><i>(Belum Ada Data Penerbit!)</i></span>
                                    <a href="<?= base_url() ?>penerbit" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon text-white">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Rak -->
                            <?php if($jmlRak > 0): ?>
                            <div class="form-group"><label>Rak</label>
                                <select name="rak" class="form-control chosen" value="<?= $d->id_rak ?>">
                                    <?php foreach($rak as $r): ?>

                                    <?php if($d->id_rak == $r->id_rak): ?>
                                    <option value="<?= $r->id_rak ?>" selected><?= $r->id_rak ?> [<?= $r->rak ?>]</option>
                                    <?php else: ?>
                                    <option value="<?= $r->id_rak ?>"><?= $r->id_rak ?> [<?= $r->rak ?>]</option>
                                    <?php endif; ?>
                                    
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?php else: ?>
                            <div class="form-group"><label>Rak</label>
                                <input type="hidden" name="rak">
                                <div class="d-sm-flex justify-content-between">
                                    <span class="text-danger"><i>(Belum Ada Data Rak!)</i></span>
                                    <a href="<?= base_url() ?>rak" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon text-white">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>


                        <br>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 mb-4">
                <!-- Illustrations -->
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
                                <img src="<?= base_url() ?>assets/upload/buku/<?= $d->foto ?>" id="outputImg"
                                    width="200" maxheight="300">
                            </div>
                            <div id="pdf">
                                <embed src="<?= base_url() ?>assets/upload/buku/<?= $d->foto ?>" id="outputPdf"
                                    width="300" height="400" type="application/pdf">
                            </div>
                        </center>
                        <br>
                        <span class="text-danger">*kosongkan jika tidak ingin merubah</span>
                        <!-- foto -->
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="hidden" name="fotoLama" value="<?= $d->foto ?>">
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

<?php } ?>