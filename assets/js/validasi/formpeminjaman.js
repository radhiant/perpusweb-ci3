function validateForm() {
    var anggota = document.forms["myForm"]["anggota"].value;
    var limit = document.getElementById("limit").innerText;

    if (anggota == "") {
        validasi('Anggota wajib di isi!', 'warning');
        return false;
    } else if (limit === "3") {
        validasi('List pinjam buku masih kosong!', 'warning');
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