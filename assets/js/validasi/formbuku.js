function validateForm() {
    var buku = document.forms["myForm"]["buku"].value;
    var kategori = document.forms["myForm"]["kategori"].value;
    var pengarang = document.forms["myForm"]["pengarang"].value;
    var isbn = document.forms["myForm"]["isbn"].value;
    var jmlhal = document.forms["myForm"]["jmlhal"].value;
    var jmlbuku = document.forms["myForm"]["jmlbuku"].value;
    var thn = document.forms["myForm"]["thn"].value;
    var sinopsis = document.forms["myForm"]["sinopsis"].value;
    var penerbit = document.forms["myForm"]["penerbit"].value;
    var rak = document.forms["myForm"]["rak"].value;

    if (buku == "") {
        validasi('Judul buku wajib di isi!', 'warning');
        return false;
    } else if (kategori == '') {
        validasi('Kategori wajib dipilih!', 'warning');
        return false;
    } else if (pengarang == '') {
        validasi('Pengarang wajib di isi!', 'warning');
        return false;
    } else if (isbn == '') {
        validasi('ISBN wajib di isi!', 'warning');
        return false;
    } else if (jmlhal == '') {
        validasi('Jumlah Halaman wajib di isi!', 'warning');
        return false;
    } else if (jmlbuku == '') {
        validasi('Jumlah Buku wajib di isi!', 'warning');
        return false;
    } else if (thn == '') {
        validasi('Tahun Terbit wajib di isi!', 'warning');
        return false;
    } else if (sinopsis == '') {
        validasi('Sinopsis wajib di isi!', 'warning');
        return false;
    } else if (penerbit == '') {
        validasi('Penerbit wajib di isi!', 'warning');
        return false;
    } else if (rak == '') {
        validasi('Rak wajib di isi!', 'warning');
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


function fileIsValid(fileName) {
    var ext = fileName.match(/\.([^\.]+)$/)[1];
    ext = ext.toLowerCase();
    var isValid = true;
    switch (ext) {
        case 'png':
        case 'jpeg':
        case 'jpg':
        case 'tiff':
        case 'gif':
        case 'tif':

            break;
        default:
            this.value = '';
            isValid = false;
    }
    return isValid;
}

function VerifyFileNameAndFileSize() {
    var file = document.getElementById('GetFile').files[0];


    if (file != null) {
        var fileName = file.name;
        if (fileIsValid(fileName) == false) {
            validasi('Format bukan gambar!', 'warning');
            document.getElementById('GetFile').value = null;
            return false;
        }
        var content;
        var size = file.size;
        if ((size != null) && ((size / (1024 * 1024)) > 3)) {
            validasi('Ukuran maximum 1024px', 'warning');
            document.getElementById('GetFile').value = null;
            return false;
        }

        var ext = fileName.match(/\.([^\.]+)$/)[1];
        ext = ext.toLowerCase();

        if (ext == 'pdf') {
            $('#pdf').show();
            $('#img').hide();
            $(".custom-file-label").addClass("selected").html(file.name);
            document.getElementById('outputPdf').src = window.URL.createObjectURL(file);
        } else {
            $('#pdf').hide();
            $('#img').show();
            $(".custom-file-label").addClass("selected").html(file.name);
            document.getElementById('outputImg').src = window.URL.createObjectURL(file);
        }
        return true;

    } else
        return false;
}