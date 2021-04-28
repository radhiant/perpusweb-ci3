function validateForm() {
    var tgl = document.forms["myForm"]["tgl"].value;
    var buku = document.forms["myForm"]["buku"].value;
    var jmlbuku = document.forms["myForm"]["jmlbuku"].value;
    var aslbuku = document.forms["myForm"]["aslbuku"].value;
    var ket = document.forms["myForm"]["ket"].value;

    if (buku == '') {
        validasi('Buku wajib di isi!', 'warning');
        return false;
    } else if (tgl == '') {
        validasi('Tanggal wajib di isi!', 'warning');
        return false;
    } else if (jmlbuku == '') {
        validasi('Jumlah Buku wajib di isi!', 'warning');
        return false;
    } else if (aslbuku == '') {
        validasi('Asal Buku wajib di isi!', 'warning');
        return false;
    } else if (ket == '') {
        validasi('Keterangan wajib di isi!', 'warning');
        return false;
    }

}

function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}