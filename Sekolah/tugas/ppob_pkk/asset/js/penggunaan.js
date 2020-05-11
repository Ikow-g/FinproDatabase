//const

const a = {
    nama: $('#nama'), awal: $('#awal'), alamat: $('#alamat'),
    id_pelanggan: $('#id_pelanggan'), kwh: $('#pilihan_kwh'),
    bulan: $('#bulan'), tahun: $('#tahun'), inf: $('#inf'),
    inf2: $('#inf2'), inf3: $('#inf3'), bulan2: $('#bulan2'),
    tahun2: $('#tahun2'), tarif: $('#tarif'), email: $('#email')
};

//Function

function check_no_kwh() {
    $.ajax({
        url: 'ajax_act/check_no_kwh.php?no_kwh=' + a.kwh.val(),
        type: 'GET',
        dataType: 'JSON'
    })
        .done(function (data) {
            a.bulan.val(""); a.tahun.val(""); a.bulan2.val("");
            a.tahun2.val("");
            if (data.awal != 0) {
                a.tahun.prop('disabled', true); a.bulan.prop('disabled', true);
                a.bulan.val(data.bulan); a.tahun.val(data.tahun); a.bulan2.val(data.bulan);
                a.tahun2.val(data.tahun);
            } else {
                a.tahun.prop('disabled', false);
                a.inf3.show();
            }
            a.inf2.hide(); a.inf.hide(); a.inf3.hide();
            a.nama.val(data.nama); a.awal.val(data.awal); a.alamat.val(data.alamat);
            a.id_pelanggan.val(data.id_pelanggan); a.tarif.val(data.tarif);
            a.email.val(data.email);
            return true;
        })
        .fail(function () {
            a.kwh.focus();
            a.tahun.prop('disabled', true); a.bulan.prop('disabled', true);
            a.inf.show(); a.inf2.show();
            a.bulan.val(''); a.tahun.val(''); a.id_pelanggan.val('');
            a.nama.val(''); a.awal.val(''); a.alamat.val('');
            a.bulan2.val(''); a.tahun2.val(''); a.tarif.val('');
            a.email.val('');
            a.inf3.hide();
        });
}

//Action

a.kwh.on('change', function () {
    check_no_kwh();
});

a.tahun.change(function () {
    a.bulan.prop('disabled', false);
    a.inf3.hide();
})
