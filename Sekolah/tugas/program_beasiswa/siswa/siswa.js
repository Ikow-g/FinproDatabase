overlay = document.getElementById('overlay');

function show() {
    overlay.style.display = 'block'

    document.getElementById('head').innerHTML = "Tambah Siswa";

    document.getElementById('nama').value = "";
    document.getElementById('email').value = "";
    document.getElementById('nisn').value = "";
    document.getElementById('phone').value = "";
    document.getElementById('tmb').style.display = 'block';
    document.getElementById('edt').style.display = 'none';
}

function edit(a) {
    overlay.style.display = 'block';

    document.getElementById('head').innerHTML = "Edit Siswa " + a.getAttribute('data-nama');
    document.getElementById('nama').value = a.getAttribute('data-nama');
    document.getElementById('email').value = a.getAttribute('data-email');
    document.getElementById('nisn').value = a.getAttribute('data-id');
    document.getElementById('old_nisn').value = a.getAttribute('data-id');
    document.getElementById('phone').value = a.getAttribute('data-phone');
    document.getElementById('edt').style.display = 'block';
    document.getElementById('tmb').style.display = 'none';
}

document.getElementsByClassName('close')[0].onclick = function () {
    overlay.style.display = "none";
}

window.onclick = function (event) {
    if (event.target == overlay) {
        overlay.style.display = "none";
    }
}