

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
      <title>Document</title>
<style>
    table, th, td {
        border: 0.5px solid black;
}
</style>
</head>
<body>
        <h2>Guru Table</h2>
        <table>
          <tr>
            <th>Nomor</th>
            <th>Nama</th>
            <th>Panggilan</th> 
            <th>Mata Pelajaraqn</th> 
            <th>Kelas</th> 
            <th>Umur</th> 
            <th>Gaji</th>
            <th>Aksi</th>
          </tr>
          @foreach ($teacher as $data)
          <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$data->user->name}}</td>
          <td>{{$data->user->nickname}}</td>
          <td>{{$data->subject}}</td>
          <td>{{$data->class}}</td>
          <td>{{$data->user->age}}</td>
          <td></td>
            <td>
                <button type="button">Edit</button>
                <button type="button">Delete</button>
            </td>
          </tr>
          @endforeach
          <button type="button">Back</button>
          <a href="{{route('teacher.add_page')}}" style="margin-left:10px;"><button type="button">Tambah</button></a>
        </table>
</body>
</html>

