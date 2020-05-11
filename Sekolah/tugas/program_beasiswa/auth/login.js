
var x = document.getElementById('form_login');
var y = document.getElementById('form_daftar');

function daftar() {
    x.style.display = 'none';
    y.style.display = 'block';
}

function punya() {
    y.style.display = 'none';
    x.style.display = 'block';
}

function checkPass() {

    pass = document.getElementById('password2');
    confirm_pass = document.getElementById('confirm');
    notice = document.getElementById('notice');

    if (pass.value != confirm_pass.value) {
        event.preventDefault();
        pass.style.borderColor = 'red';
        confirm_pass.style.borderColor = 'red';
        notice.style.display = 'block';
    }
}