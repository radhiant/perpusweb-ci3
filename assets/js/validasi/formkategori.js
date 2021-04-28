function validateForm() {
    var kategori = document.forms["myForm"]["kategori"].value;

    if (kategori == "") {
        validasi('Nama Kategori wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdate() {
    var kategori = document.forms["myFormUpdate"]["kategori"].value;

    if (kategori == "") {
        validasi('Nama Kategori tidak boleh kosong!', 'warning');
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