$(document).ready(function () {
    $('.select').select2({
        placeholder: ""
    });


    $("#push").click(function () {
        var id = $('#nama_barang').val();
        var jumlah = $('#jumlah').val();
        var satuan = $('#satuan').val();
        var total = $('#total').text();
        $.ajax({
            url: 'get_barang.php',
            type: 'POST',
            data: {
                id: id,
                jumlah: jumlah,
                total: total
            },
            dataType: 'json'
        }).done(function (result) {
            var data = `<tr>` +
                `<td style="width:7%;"><button class="btn-remove">Delete</button></td>` +
                `<td>` + result.nama + `</td>` +
                `<td>` + jumlah + ` ` + satuan + `</td>` +
                `<td id="harga_barang">` + result.harga_barang + `</td>` +
                `<input type="hidden" name="nama[]" value="` + id + `">` +
                `</tr>`;
            $('#total').text(result.total);
            $('#target').append(data).ready(function () {
                $('#nama_barang').val('').trigger('change');
                $('#jumlah').val('');
                $('#satuan').val('').trigger('change');
            });
        });
    });
});

$(document).on('click', '.btn-remove', function () {
    var harga_barang = $(this).closest("tr").find('#harga_barang').text();
    var result = $('#total').text().replace(',', '') - harga_barang.replace(',', '');
    $('#total').text(result)
});