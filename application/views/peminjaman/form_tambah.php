<!-- Begin Page Content -->
<div class="container-fluid">

    <form action="<?= base_url() ?>peminjaman/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                <a href="<?= base_url() ?>peminjaman" class="btn btn-md btn-circle btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                &nbsp;
                <h1 class="h2 mb-0 text-gray-800">Peminjaman Buku</h1>
            </div>
            <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                <span class="text text-white">Simpan Data</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>

        </div>

        <!-- content -->
        <div class="row">

            <div class="col-lg-7">
                <div class="card border-bottom-primary shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Form Peminjaman</h6>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label>ID Peminjaman</label>
                            <input type="text" name="idpinjam" class="form-control" value="<?= $kode; ?>" readonly>
                        </div>

                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Tanggal Pinjam</label>
                                    <input type="text" name="tglpinjam" readonly class="form-control"
                                        value="<?= $tglsekarang ?>">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Tanggal Kembali</label>
                                    <input type="text" name="tglkembali" readonly class="form-control"
                                        value="<?= $tglplus3 ?>">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Keterangan Lainnya</label>
                                    <textarea name="ket" class="form-control"></textarea>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card border-bottom-primary shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Anggota</h6>
                    </div>
                    <div class="card-body">

                        <div class="input-group mb-4">
                            <select name="anggota" class="form-control chosen" onchange="ambilAnggota()">
                                <option value="">--Pilih Anggota--</option>
                                <?php foreach($anggota as $a): ?>
                                <option value="<?= $a->id_anggota?>">[<?= $a->id_anggota ?>] <?= $a->nama_lengkap ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                        </div>


                        <div class="row">
                            <div class="col-lg-3">
                                <center>
                                    <img style="border-radius: 5px;"
                                        src="<?= base_url() ?>assets/upload/anggota/man.png" id="preview" width="75"
                                        maxheight="300">
                                </center>
                            </div>
                            <div class="col-lg">
                                <p id="namaL">-</p>
                                <!-- Divider -->
                                <hr class="sidebar-divider">
                                <p id="jk">-</p>
                                <!-- Divider -->
                                <hr class="sidebar-divider">
                                <p id="umur">-</p>
                                <!-- Divider -->
                                <hr class="sidebar-divider">
                                <p id="notelp">-</p>
                                <!-- Divider -->
                                <hr class="sidebar-divider">
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-lg">
                <div class="card border-bottom-primary shadow mb-4">
                    <div class="card-header py-3 d-sm-flex justify-content-between bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Buku yg dipinjam</h6>
                        <div class="d-sm-flex">
                            <h6 class="m-0 text-white">Limit Buku:</h6>
                            &nbsp;
                            <h6 class="m-0 font-weight-bold text-white" id="limit">3</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <select name="buku" class="form-control chosen" id="buku" onchange="ambilStok()">
                                        <option selected value="">--Pilih Buku--</option>
                                        <?php foreach($buku as $b): ?>
                                        <option value="<?= $b->id_buku?>">[<?= $b->id_buku ?>] <?= $b->judul ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-1">
                                <span class="badge badge-primary">Stok: <span id="stok">0</span></span>
                            </div>

                            <div class="col-lg-1">
                                <div class="form-group">
                                    <input type="number" name="jml" class="form-control" value="0">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <button type="button" class="btn btn-success btn-circle btn-md" id="tmbhrow">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>

                            <div class="col-lg mb-4">
                                <div class="table-responsive">
                                    <table class="table" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th>Judul Buku</th>
                                                <th>ISBN</th>
                                                <th>Pengarang</th>
                                                <th>Qty</th>
                                                <th width="1%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </form>

</div>
</div>

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/loading.js"></script>
<script src="<?= base_url(); ?>assets/js/peminjaman.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formpeminjaman.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>

<script>
$('.chosen').chosen({
    allow_single_deselect: true,
    no_results_text: "Oops, tidak ditemukan!"

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