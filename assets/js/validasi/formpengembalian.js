function validateForm() {
    var pinjam = document.forms["myForm"]["pinjam"].value;

    if (pinjam == "") {
        validasi('Pilih ID Pinjam / Anggota dulu!', 'warning');
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