$(document).ready(function() {
    $('#dtHorizontalExample').DataTable({
        "scrollX": true
    });
    $('.dataTables_length').addClass('bs-select');

    var counter = 1;


    function kosong() {
        $("#buku").trigger("chosen:updated");
        $("input[name='jml']").val('0');
    }

    function pesan(title, icon) {
        swal.fire({
            title: title,
            icon: icon,
            confirmButtonColor: '#4e73df',
        });
    }

    function tmbahRow() {

        var stok = parseInt($('#stok').text());
        var jml = parseInt($("input[name='jml']").val());

        if (jml > stok) {
            pesan("Jumlah melewati stok buku!", "warning");
            return false;
        } else {
            var newRow = $("<tr class='bounceIn'>");
            var cols = "";
            var limit = parseInt($("#limit").text());
            var link = $('#baseurl').val();
            var base_url = link + 'peminjaman/getBuku';
            var idbuku = $('[name="buku"]').val();

            $.ajax({
                type: 'POST',
                data: 'id=' + idbuku,
                url: base_url,
                dataType: 'json',
                success: function(hasil) {
                    cols += '<td><input type="hidden" name="idbuku[]" value="' + hasil[0].id_buku + '"><input type="hidden" name="qty[]" value="' + $("input[name='jml']").val() + '"> ' + counter + '. </td>';
                    cols += '<td>' + hasil[0].judul + '</td>';
                    cols += '<td>' + hasil[0].isbn + '</td>';
                    cols += '<td>' + hasil[0].pengarang + '</td>';
                    cols += '<td>' + $("input[name='jml']").val() + '</td>';
                    cols += '<td><button type="button" class="ibtnDel btn btn-sm btn-danger "> <i class="fa fa-trash"></i> </button></td>';

                    newRow.append(cols);

                    $("table").append(newRow);
                    counter++;

                    kosong();
                    $("#limit").text(limit - 1);

                }
            });
        }

    }


    $("#tmbhrow").on("click", function() {
        if (counter > 3) {
            pesan("Limit Pinjam cuman 3 buku!", "warning");
            return false;
        } else {
            if ($("[name='buku']").val() === '') {
                pesan("Pilih buku terlebih dahulu!", "warning");
                return false;
            } else if ($("input[name='jml']").val() === '' || $("input[name='jml']").val() === '0' || $("input[name='jml']").val() < 0) {
                pesan("Masukan jumlah yg benar!", "warning");
                return false;
            } else {
                tmbahRow();
            }
        }
    });


    $("table").on("click", ".ibtnDel", function(event) {
        $(this).closest("tr").remove();
        counter -= 1
        var limit = parseInt($("#limit").text());
        $("#limit").text(limit + 1);
    });

});


function ambilAnggota() {
    var link = $('#baseurl').val();
    var base_url = link + 'peminjaman/getAnggota';
    var anggota = $('[name="anggota"]').val();

    if (anggota == '') {
        $('#preview').attr("src", link + "assets/upload/anggota/man.png");
        $('#namaL').text("-");
        $('#jk').text("-");
        $('#umur').text("-");
        $('#notelp').text("-");
    } else {
        $.ajax({
            type: 'POST',
            data: 'id=' + anggota,
            url: base_url,
            dataType: 'json',
            success: function(hasil) {
                $('#preview').attr("src", link + "assets/upload/anggota/" + hasil[0].foto);
                $('#namaL').text(hasil[0].nama_lengkap);
                $('#jk').text(hasil[0].jk);
                $('#umur').text(hasil[0].umur);
                $('#notelp').text(hasil[0].notelp);

            }
        });
    }
}

function detail(id) {
    var base_url = $('#baseurl').val();
    window.location.href = base_url + "buku/detail_data/" + id;

}

function konfirmasi(id) {
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
                    window.location.href = base_url + "peminjaman/proses_hapus/" + id;
                }
            );
        }
    });

}

function ambilStok() {
    var idbuku = $('[name="buku"]').val();
    if (idbuku == '') {
        $('#stok').text(parseInt('0'));
    } else {
        var link = $('#baseurl').val();
        var base_url = link + 'buku/getTotalStok';

        $.ajax({
            type: 'POST',
            data: {
                id: idbuku
            },
            url: base_url,
            dataType: 'json',
            success: function(hasil) {
                $('#stok').text(parseInt(hasil.total));
            }
        });
    }

}