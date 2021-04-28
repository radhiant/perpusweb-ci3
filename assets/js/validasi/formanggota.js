function validateForm() {
    var nmlengkap = document.forms["myForm"]["nmlengkap"].value;
    var notelp = document.forms["myForm"]["notelp"].value;
    var tempat = document.forms["myForm"]["tempat"].value;
    var tgllahir = document.forms["myForm"]["tgllahir"].value;
    var umur = document.forms["myForm"]["umur"].value;
    var alamat = document.forms["myForm"]["alamat"].value;

    if (nmlengkap == "") {
        validasi('Nama Lengkap wajib di isi!', 'warning');
        return false;
    } else if (tempat == '') {
        validasi('Tempat Lahir wajib di isi!', 'warning');
        return false;
    } else if (notelp == '') {
        validasi('NO.Telepon wajib di isi!', 'warning');
        return false;
    } else if (tgllahir == '') {
        validasi('Tanggal Lahir wajib di isi!', 'warning');
        return false;
    } else if (umur == '') {
        validasi('Umur wajib di isi!', 'warning');
        return false;
    } else if (alamat == '') {
        validasi('Alamat wajib di isi!', 'warning');
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
        case 'pdf':

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