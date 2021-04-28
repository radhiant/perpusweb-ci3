<!-- Begin Page Content -->
<div class="container-fluid">

    <?php foreach($user as $u): ?>

    <form action="<?= base_url() ?>user/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">


        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                <a href="<?= base_url() ?>user" class="btn btn-md btn-circle btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                &nbsp;
                <h1 class="h2 mb-0 text-gray-800">Ubah Pengguna</h1>
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
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Form Pengguna</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                             <!-- ID User-->
                             <div class="form-group"><label>ID User</label>
                                <input class="form-control" name="iduser" type="text" value="<?= $u->id_user ?>" readonly>
                            </div>
                            <!-- Nama Lengkap -->
                            <div class="form-group"><label>Nama User</label>
                                <input class="form-control" name="user" type="text" value="<?= $u->nama ?>">
                            </div>

                            <!-- NO Telepon -->
                            <div class="form-group"><label>Nomor Telepon</label>
                                <input class="form-control" name="notelp" type="number" value="<?= $u->notelp ?>">
                            </div>

                            <!-- Email -->
                            <div class="form-group"><label>Email</label>
                                <input class="form-control" name="email" type="email" value="<?= $u->email ?>">
                            </div>

                            <!-- Level -->
                            <div class="form-group"><label>Level</label>
                                <select name="level" class="form-control">
                                    <option value="Administrasi" 
                                    <?php if($u->level == "Administrasi"): ?> Selected <?php endif; ?> >Administrasi</option>
                                    <option value="Petugas" 
                                    <?php if($u->level == "Petugas"): ?> Selected <?php endif; ?> >Petugas</option>
                                    <option value="Kepala" 
                                    <?php if($u->level == "Kepala"): ?> Selected <?php endif; ?> >Kepala</option>
                                </select>
                            </div>

                             <!-- Status -->
                             <div class="form-group"><label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="Aktif" 
                                    <?php if($u->status == "Aktif"): ?> Selected <?php endif; ?> >Aktif</option>
                                    <option value="Tidak Aktif" 
                                    <?php if($u->status == "Tidak Aktif"): ?> Selected <?php endif; ?> >Tidak Aktif</option>
                                </select>
                            </div>

                            <!-- Password -->
                            <div class="form-group"><label>Password</label>
                                <input class="form-control" name="pwd" type="password" value="<?= $u->pass ?>">
                            </div>

                            <!-- Konfirmasi Password -->
                            <div class="form-group"><label>Konfirmasi Password</label>
                                <input class="form-control" name="kpwd" type="password" value="<?= $u->pass ?>">
                            </div>

                        </div>


                        <br>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 mb-4">
                <!-- file -->
                <div class="card shadow mb-4">
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
                            <div>
                                <img src="<?= base_url() ?>assets/upload/pengguna/<?= $u->foto ?>" id="outputImg" width="200"
                                    maxheight="300">
                            </div>
                        </center>
                        <br>
                        <span class="text-danger">*kosongkan jika tidak ingin merubah</span>
                        <!-- foto -->
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="hidden" name="fotoLama" value="<?= $u->foto ?>">
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

<?php endforeach; ?>

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pengguna.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formuser.js"></script>

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