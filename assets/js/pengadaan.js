$(document).ready(function() {
    $('#dtHorizontalExample').DataTable({
        "scrollX": true
    });
    $('.dataTables_length').addClass('bs-select');


});

function ambilBuku() {
    var link = $('#baseurl').val();
    var base_url = link + 'pengadaan/getBuku';
    var buku = $('[name="buku"]').val();

    if (buku == '') {
        $('#preview').attr("src", link + "assets/upload/buku/book.png");
        $('#judul').text("-");
        $('#stok').text("-");
    } else {
        $.ajax({
            type: 'POST',
            data: 'id=' + buku,
            url: base_url,
            dataType: 'json',
            success: function(hasil) {
                $('#preview').attr("src", link + "assets/upload/buku/" + hasil[0].foto);
                $('#judul').text(hasil[0].judul);
                $('#stok').text(hasil[0].jmlbuku);
            }
        });
    }


}

function detail(id) {
    var base_url = $('#baseurl').val();
    window.location.href = base_url + "pengadaan/detail_data/" + id;

}

function konfirmasi(id, jml, idbk) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 1000,
                showConfirmButton: false,
            }).then(
                function() {
                    window.location.href = base_url + "pengadaan/proses_hapus/" + id + '/' + jml + '/' + idbk;
                }
            );
        }
    });

}