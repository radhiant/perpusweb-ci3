$(document).ready(function() {
    ambilPeminjaman();
});


function filter() {
    var tglawal = $("[name='tglawal']").val();
    var tglakhir = $("[name='tglakhir']").val();
    if (tglawal != '' && tglakhir != '') {
        filterPeminjaman(tglawal, tglakhir);
    } else {
        validasi("Tanggal Filter wajib di isi!", "warning");
    }
}

function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}

function refresh() {
    var t = $('#dtHorizontalExample').DataTable();
    t.ajax.reload();
}

function reset() {
    $("[name='tglawal']").val("");
    $("[name='tglakhir']").val("");
    ambilPeminjaman();
}

function ambilPeminjaman() {
    var link = $('#baseurl').val();
    var base_url = link + 'peminjaman/getPeminjaman';


    var t = $('#dtHorizontalExample').DataTable({
        "processing": true,
        "info": false,
        "searching": true,
        "order": [
            [0, "desc"]
        ],
        lengthChange: false,
        "ajax": {
            "url": base_url,
            "dataSrc": ""
        },
        columns: [
            { "data": "id_pinjam" },
            { "data": "id_pinjam" },
            { "data": "tgl_pinjam" },
            { "data": "nama_lengkap" },
            { "data": "tempo" },
            {
                "data": "status",
                "render": function(data, type, row) {
                    if (data == 'Pinjam') {
                        return '<span class="badge badge-primary">' + data + '</span>'
                    } else {
                        return '<span class="badge badge-success">' + data + '</span>'
                    }
                }
            },
            {
                "data": "ket",
                "render": function(data, type, row) {
                    if (data == '') {
                        return '<i>(Tidak diisi)</i>'
                    } else {
                        return data
                    }
                }
            },
        ],

        "destroy": true

    });

    t.on('order.dt search.dt', function() {
        t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();


    $('.dataTables_length').addClass('bs-select');
}

function filterPeminjaman(tglawal, tglakhir) {
    var link = $('#baseurl').val();
    var base_url = link + 'peminjaman/filterPeminjaman/' + tglawal + '/' + tglakhir + '';


    var t = $('#dtHorizontalExample').DataTable({
        "processing": true,
        "info": false,

        "order": [
            [0, "desc"]
        ],
        lengthChange: false,
        "ajax": {
            "url": base_url,
            "dataSrc": ""
        },
        columns: [
            { "data": "id_pinjam" },
            { "data": "id_pinjam" },
            { "data": "tgl_pinjam" },
            { "data": "nama_lengkap" },
            { "data": "tempo" },
            {
                "data": "status",
                "render": function(data, type, row) {
                    if (data == 'Pinjam') {
                        return '<span class="badge badge-primary">' + data + '</span>'
                    } else {
                        return '<span class="badge badge-success">' + data + '</span>'
                    }
                }
            },
            {
                "data": "ket",
                "render": function(data, type, row) {
                    if (data == '') {
                        return '<i>(Tidak diisi)</i>'
                    } else {
                        return data
                    }
                }
            },
        ],

        "destroy": true

    });

    t.on('order.dt search.dt', function() {
        t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();


    $('.dataTables_length').addClass('bs-select');
}