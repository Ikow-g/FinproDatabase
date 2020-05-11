$(document).ready(function () {
    $('#tambah_item').click(function () {
        var count_row = parseInt(($('#count_row').val()));
        var new_count = count_row += 1;
        $.ajax({
            url: 'get_barang_keluar.php?count=' + new_count,
            type: 'GET',
        })
            .done(function (data) {
                $('#tb_detail').append(data);
                $('#count_row').val(new_count);
            })
            .fail(function () {
                alert('Oops something wrong happened Try again !');
            });
    });
});

// function count_total(row) {
//     var harga = $('#harga' + row).val();
//     var total = $('#jumlah' + row).val();
//     var total = harga * total;
//     $total = total == 0 || total == '' ? total = '' : '';
//     $('#total' + row).val(total)
// }

function select_barang(row, id_barang) {
    $.ajax({
        url: 'search_harga.php?id_barang=' + id_barang,
        type: 'GET',
        dataType: 'JSON',
    })
        .done(function (data) {
            $('#harga' + row).val(data.harga);
            $('#jumlah' + row).val() == 0 ? '' : count_total(row);
        })
        .fail(function () {
            $('#harga' + row).val('');
            count_total(row);
            alert('Oops something wrong happened Try again !');
        });
}

$(document).on('click', '.btn-remove', function () {
    $(this).closest("tr").remove();
});

$(document).on('keyup', '.jumlah-barang', function () {
    var harga = $(this).closest("tr").find('.harga_barang').val();
    var jumlah = $(this).val();
    var total = parseInt(harga) * parseInt(jumlah);
    $(this).closest("tr").find('.total').val(total);
});