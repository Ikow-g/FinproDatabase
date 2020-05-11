overlay = document.getElementById('overlay');

function show(a) {
    console.log(a);

    overlay.style.display = 'block';
    btn = document.getElementById('verif');
    deskripsi = document.getElementById('deskripsi');
    if (a.value == 'verif') {
        verif.style.display = 'block';
        document.getElementById('head').innerHTML = "Alasan penolakan";
        document.getElementById('id_siswa').value = a.getAttribute('data-id_siswa');
        document.getElementById('id_sk').value = a.getAttribute('data-id_sk');
        document.getElementById('email').value = a.getAttribute('data-email');
        deskripsi.readOnly = false;
        deskripsi.value = '';
    } else {
        console.log(1);
        verif.style.display = 'none';
        document.getElementById('head').innerHTML = "SK " + a.getAttribute('data-sk');
        deskripsi.value = a.getAttribute('data-deskripsi');
        deskripsi.readOnly = true;
    }

}

document.getElementsByClassName('close')[0].onclick = function () {
    overlay.style.display = "none";
}

window.onclick = function (event) {
    if (event.target == overlay) {
        overlay.style.display = "none";
    }
}

// Get the modal
var modal = document.getElementById('myModal');
function img(a) {
    var modalImg = document.getElementById("img01");
    modal.style.display = "block";

    modalImg.src = 'img_sk/' + a.value;

    document.getElementById('del-img').value = a.value;
    document.getElementById('id_siswa2').value = a.getAttribute('data-id');
    document.getElementById('id_sk2').value = a.getAttribute('data-idSK');

    download = document.getElementById('download');
    download.download = a.value;
    download.href = 'img_sk/' + a.value;
}
var span = document.getElementsByClassName("close")[1];

span.onclick = function () {
    modal.style.display = "none";
}

// Get the image and insert it inside the modal - use its "alt" text as a caption