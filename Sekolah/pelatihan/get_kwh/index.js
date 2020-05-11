$('#kwh').change(function () {
    id_kwh = $(this).val();

    $.ajax({
        url: 'get_pelanggan.php?id=' + id_kwh,
        type: 'GET',
        dataType: 'JSON'
    })
        .done(function (data) {
            $('#nama').val(data.nama);
            $('#alamat').text(data.alamat);
            $('#awal').val(data.awal);
            $('#bulan').val(data.bulan);
            $('#tahun').val(data.tahun);
        })
        .fail(function () {
            console.log('gagal');
        })
})