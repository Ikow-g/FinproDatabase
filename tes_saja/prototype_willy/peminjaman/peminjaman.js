$(document).ready(function () {
    $("#push").click(function () {
        var id_buku = $('#buku').val();

        var selected_buku = $('#buku').children(':selected');

        var nama_buku = selected_buku.text();

        if (id_buku == 0) { return false; }

        var data = `<tr id="` + id_buku + `">` +
            `<td id="nama">` + nama_buku + `</td>` +
            `<td><button class="btn-remove">Delete</button></td>` +
            `</tr>`;

        $('#target').append(data).ready(function () {
            selected_buku.remove();
            $('#buku').val('0').trigger('change');
            $('#insert_buku').val($('#insert_buku').val() + id_buku + ',');
        });
    });

    $('#submit').click(function () {
        var buku = $('#insert_buku').val();
        if (buku == "") {
            event.preventDefault();
            alert('pinjam buku dulu');
        }
    });


});


$(document).on('click', '.btn-remove', function () {
    var tr = $(this).closest('tr');
    var id = tr.prop('id');
    var insert_buku = $('#insert_buku').val();
    nama = tr.find('#nama').text();

    insert_buku = insert_buku.replace(id + ',', '');
    $('#insert_buku').val(insert_buku);

    tr.remove();

    var option = `<option value="` + id + `">` + nama + `</option>`;
    $('#buku').append(option);
});
