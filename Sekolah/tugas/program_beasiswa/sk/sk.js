overlay = document.getElementById('overlay');

function show() {
    overlay.style.display = 'block'

    document.getElementById('head').innerHTML = "Tambah SK";

    document.getElementById('sk').value = "";
    document.getElementById('deskripsi').innerHTML = "";

    document.getElementById('edt').style.display = 'none';
    document.getElementById('tmb').style.display = 'block';
}

function edit(a) {
    overlay.style.display = 'block';

    document.getElementById('head').innerHTML = "Edit SK " + a.getAttribute('data-sk');
    document.getElementById('id').value = a.getAttribute('data-id');
    document.getElementById('sk').value = a.getAttribute('data-sk');
    document.getElementById('deskripsi').innerHTML = a.getAttribute('data-deskripsi');

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