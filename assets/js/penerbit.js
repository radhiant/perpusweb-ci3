$(document).ready(function() {
    $('#dtHorizontalExample').DataTable({
        "scrollX": true
    });
    $('.dataTables_length').addClass('bs-select');


});

function ambilData(id){
    var link = $('#baseurl').val();
    var base_url = link + 'penerbit/getData';

    $.ajax({
        type:'POST',
            data:'id='+id,
            url:base_url,
            dataType:'json',
            success: function(hasil){
              $('#id').val(hasil[0].id_penerbit);
                $('#penerbit').val(hasil[0].penerbit);
                  $('#ket').val(hasil[0].keterangan);

            }
        });
}

function konfirmasi(id){
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
                    window.location.href = base_url+"penerbit/proses_hapus/"+id;
                }
            );
        }
    });

}
