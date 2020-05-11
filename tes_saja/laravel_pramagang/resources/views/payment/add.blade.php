<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Guru</title>
</head>
<body>
    <div class="content">
    <form method="post" action="{{route('payment.store')}}">
    {{ csrf_field() }}
    <label>Pendidikan : </label>
    <input type="text" name="studi"><br><br>
    <label>Nominal : </label>
    <input type="text" name="nominal"><br><br>
    <input type="button" value="tambah" name="tambah">
    <button type="submit" name="back" onclick="window.location.href='{{route('payment.index')}}'">Kembali</button>
    </form>
    </div>
</body>
</html>