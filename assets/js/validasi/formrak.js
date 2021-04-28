function validateForm() {
    var rak = document.forms["myForm"]["rak"].value;

    if (rak == "") {
        validasi('Nama Rak wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdate() {
    var rak = document.forms["myFormUpdate"]["rak"].value;

    if (rak == "") {
        validasi('Nama Rak tidak boleh kosong!', 'warning');
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