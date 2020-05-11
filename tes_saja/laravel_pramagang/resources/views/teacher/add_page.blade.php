<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Guru</title>
</head>
<body>
    <form action="{{route('teacher.add')}}" method="post">
    {{ csrf_field() }}
    <label>Nama Guru : </label>
    <input type="text" name="name"><br><br>
    <label>Nama Panggilan : </label>
    <input type="text" name="nickname"><br><br>
    <label>Wali Kelas : </label>
    <input type="text" name="class"><br><br>
    <label>Umur : </label>
    <input type="text" name="age"><br><br>
    <label>Mata Pelajaran : </label>
    <input type="text" name="subject"><br><br>
    <label>Gaji : </label>
    <select name="gaji">
        <option value="volvo">Volvo</option>
    </select><br><br>
    <button type="submit">Tambah</button>
    </form>
    <button style="margin-left:70px;" onclick="window.location.href='{{route('teacher.index')}}'">Kembali</button>
</body>
</html>