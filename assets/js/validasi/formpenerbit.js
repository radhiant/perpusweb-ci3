function validateForm() {
    var penerbit = document.forms["myForm"]["penerbit"].value;

    if (penerbit == "") {
        validasi('Nama Penerbit wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdate() {
    var penerbit = document.forms["myFormUpdate"]["penerbit"].value;

    if (penerbit == "") {
        validasi('Nama Penerbit tidak boleh kosong!', 'warning');
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