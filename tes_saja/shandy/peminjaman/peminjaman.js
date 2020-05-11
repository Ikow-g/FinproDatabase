$(document).ready(function () {
    $('#push').click(function () {
        var buku = $('#buku');
        if (buku.val() == "") { return false; }
        var data = `<li>` + buku.children(':selected').text() + `<span class="closebtn">x</span></li>`;

        $('#target').append(data);
    })
});

$(document).on('click', '.closebtn', function () {
    $(this).closest('li').remove();
});