$(document).ready(function () {
    $('.dataTable').DataTable({
        "columnDefs": [
            { "targets": [3], "searchable": false }
        ]
    });
});

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
                window.location.href = '/siswa/delete/' + id;
            } else { }
        });
}

$('#modal-edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);

    var modal = $(this);
    modal.find('.modal-title').text('Edit ' + button.data('nama'));
    modal.find('#id').val(button.data('id'));
    modal.find('#nama').val(button.data('nama'));
    modal.find('#nomor').val(button.data('nomor'));
    modal.find('#kelas').val(button.data('kelas')).trigger('change');
})
