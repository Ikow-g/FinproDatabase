
function delete_data(id, nama) {
    swal({
        title: "Menghapus Data",
        text: "Apakah anda ingin menghapus " + nama,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = '/absensi/delete/' + id;
            } else { }
        });
}


$(document).ready(function () {
    $('.dataTable').DataTable({
        "columnDefs": [
            // { "targets": [4], "searchable": false }
        ]
    });
});

var tanggal = $('#date').text();

$('.btn-success').click(function () {
    button = $(this);
    var id_siswa = button.data('id');
    var stat_text = button.closest('tr').find('td:eq(3)');
    $.ajax({
        url: '/absensi/tambah',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { id_siswa: id_siswa, tanggal: tanggal, stat: "masuk" },
        datatype: 'JSON'
    })
        .done(function (data) {
            stat_text.text('');
            button.closest('tr').find('.btn-warning').data('ket', '');
            button.closest('tr').find('.btn-danger').data('ket', '');
            stat_text.append('<a class="masuk">Masuk</a>');
        })
        .fail(function () {
            console.log('gagal');
        });
})


// $('#warn,#dang').on('click', function () {
//     var button = $(this);
//     var tr = button.closest('tr');
//     stat_text = tr.find('td:eq(3)');

//     $('#Iketerangan').val(button.data('ket'));
//     $('.modal-title').text('Nama: ' + button.data('nama'));

//     button_insert = $('#insert');
//     if (button.data('stat') == 'sakit') {
//         button_insert.text('Sakit');
//     } else {
//         button_insert.text('Izin');
//     }

//     button_insert.click(function () {
//         var keterangan = $('#Iketerangan');
//         $.ajax({
//             url: '/absensi/tambah',
//             type: 'POST',
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             data: { id_siswa: id_siswa, keterangan: keterangan.val(), tanggal: tanggal, stat: stat },
//             datatype: 'JSON'
//         })
//             .done(function (data) {
//                 keterangan.val('');
//                 stat_text.text('');
//                 if (data.stat == 'izin') {
//                     stat_text.append('<a class="izin">Izin</a>');
//                 } else {
//                     stat_text.append('<a class="sakit">Sakit</a>');
//                 }
//                 ket.data('ket', data.ket);
//                 dang.data('ket', data.ket);
//                 modal.modal('hide');
//             })
//             .fail(function () {
//                 console.log('gagal');
//             });
//     });
// })


$('#modal-izin').on('shown.bs.modal', function (event) {

    var modal = $(this);
    var button = '';
    button = $(event.relatedTarget);
    var stat_text = button.closest('tr').find('td:eq(3)');
    var id_siswa = button.data('id');
    var stat = button.data('stat');
    ket = button.closest('tr').find('td:eq(4)').find('.btn-danger');
    dang = button.closest('tr').find('td:eq(4)').find('.btn-warning');

    modal.find('#Iketerangan').val(button.data('ket'));
    modal.find('.modal-title').text('Nama: ' + button.data('nama'));
    var button_insert = modal.find('#insert');
    if (button.data('stat') == 'sakit') {
        button_insert.text('Sakit');
    } else {
        button_insert.text('Izin');
    }

    button_insert.click(function () {
        var keterangan = modal.find('#Iketerangan');
        $.ajax({
            url: '/absensi/tambah',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { id_siswa: id_siswa, keterangan: keterangan.val(), tanggal: tanggal, stat: stat },
            datatype: 'JSON'
        })
            .done(function (data) {
                keterangan.val('');
                stat_text.text('');
                if (data.stat == 'izin') {
                    stat_text.append('<a class="izin">Izin</a>');
                } else {
                    stat_text.append('<a class="sakit">Sakit</a>');
                }
                location.reload();
            })
            .fail(function () {
                console.log('gagal');
            });
    });
});


$('#modal-tambah').on('show.bs.modal', function (event) {
    var modal = $(this);
    button = $(event.relatedTarget);
    modal.find('#keterangan').text(button.data('ket'));
});