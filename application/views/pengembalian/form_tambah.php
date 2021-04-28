<!-- Begin Page Content -->
<div class="container-fluid">

    <form action="<?= base_url() ?>pengembalian/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                <a href="<?= base_url() ?>pengembalian" class="btn btn-md btn-circle btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                &nbsp;
                <h1 class="h2 mb-0 text-gray-800">Pengembalian</h1>
            </div>

            <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                <span class="text text-white">Simpan Data</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>
            
        </div>

        <!-- form pengembalian -->
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-body">

                    <div class="form-group mb-4">
                        <label>Cari ID Pinjam / Anggota</label>
                        <div class="row">
                            <div class="col-lg-10">
                                <input type="hidden" name="tglnow" id="tglnow" value="<?= $tglnow ?>">
                                <input type="hidden" name="terlambat" >
                                <input type="hidden" name="denda" >
                                <select name="pinjam" class="form-control chosen" onchange="ambilDataPinjam()">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($pinjam as $p): ?>
                                    <option value="<?= $p->id_pinjam?>"><?= $p->id_pinjam ?> - <?= $p->nama_lengkap ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-lg">
                                <label id="loding">Memuat...</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">

                        <div class="col-lg-2">
                            <div class="form-group">
                                <Label>Tanggal Pinjam</Label>
                                <h6 class="m-0 font-weight-bold" id="tglpinjam">-</h6>
                                <!-- Divider -->
                                <hr class="sidebar-divider">
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="form-group">
                                <Label>Tempo</Label>
                                <h6 class="m-0 font-weight-bold" id="tempo">-</h6>
                                <!-- Divider -->
                                <hr class="sidebar-divider">
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="form-group">
                                <Label>Terlambat</Label>
                                <h6 class="m-0 font-weight-bold" id="lambat">-</h6>
                                <!-- Divider -->
                                <hr class="sidebar-divider">
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="form-group">
                                <Label>Denda</Label>
                                <h6 class="m-0 font-weight-bold" id="denda">-</h6>
                                <!-- Divider -->
                                <hr class="sidebar-divider">
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12 mb-4">
                        <Label>List Buku</Label>
                        <div class="table-responsive">
                            <table class="table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th>ID Buku</th>
                                        <th>Judul</th>
                                        <th>ISBN</th>
                                        <th>Pengarang</th>
                                        <th>Qty</th>
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




    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pengembalian.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formpengembalian.js"></script>
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