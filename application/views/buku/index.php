<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Buku</h1>
        <a href="<?= base_url() ?>buku/tambah"  class="btn btn-sm btn-primary btn-icon-split">
            <span class="text text-white">Tambah Data</span>
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
        </a>


    </div>

    <div class="col-lg-12 mb-4" id="container">

        <!-- Illustrations -->
        <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dtHorizontalExample" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Foto</th>
                                <th>Judul Buku</th>
                                <th>Penerbit</th>
                                <th>Stok</th>
                                <th>Kategori</th>
                                <th>Rak</th>
                                <th width="1%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="cursor:pointer;">
                            <?php $no=1; foreach ($buku as $b) { ?>
                            <tr>
                                <td onclick="detail('<?= $b->id_buku ?>')"><?= $no++ ?>.</td>
                                <td onclick="detail('<?= $b->id_buku ?>')"><img style="border-radius: 5px;"
                                        src="assets/upload/buku/<?= $b->foto ?>" alt="" width="75px"></td>
                                <td onclick="detail('<?= $b->id_buku ?>')"><?= $b->judul ?></td>
                                <td onclick="detail('<?= $b->id_buku ?>')"><?= $b->penerbit?></td>
                                <td onclick="detail('<?= $b->id_buku ?>')">
                                <?php  

                                $this->db->select_sum('pb.qty');
                                $this->db->from('peminjaman as p');
                                $this->db->join('p_buku as pb', 'pb.id_pinjam = p.id_pinjam');
                                $this->db->where('pb.id_buku', $b->id_buku);
                                $this->db->where('p.status', 'Pinjam');
                                $query = $this->db->get(); 

                                $p = $query->row();

                                    //$data = $this->db->select_sum('qty')->from('p_buku')->where('id_buku', $b->id_buku)->get();
                                    //$p = $data->row();
                                    $hasil = intval($b->jmlbuku) - intval($p->qty);
                                    ?>
                                    <?= $hasil ?>
                                </td>
                                <td onclick="detail('<?= $b->id_buku ?>')"><?= $b->kategori ?></td>
                                <td onclick="detail('<?= $b->id_buku ?>')"><?= $b->rak ?></td>
                                <td>
                                    <center>
                                        <a href="<?= base_url() ?>buku/ubah/<?= $b->id_buku ?>"
                                            class="btn btn-circle btn-success btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="#" onclick="konfirmasi('<?= $b->id_buku ?>')"
                                            class="btn btn-circle btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </center>
                                </td>
                            </tr>
                            <?php } ?>
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
<script src="<?= base_url(); ?>assets/js/buku.js"></script>
<script src="<?= base_url(); ?>assets/js/loading.js"></script>
<?php if($this->session->flashdata('Pesan')): ?>
<?= $this->session->flashdata('Pesan'); ?>
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