

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
        <h2>Daftar Gaji Sesuai dengan Pendidikan</h2>
        <table>
          <tr>
            <th>Nomor</th>
            <th>Pendidikan</th> 
            <th>Nominal</th>
            <th>Aksi</th> 
          </tr>
          @foreach ($payment as $data)
          <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$data->study}}</td>
          <td>{{$data->nominal}}</td>
            <td>
                <button type="button">Edit</button>
                <button type="button">Delete</button>
            </td>
          </tr>
          @endforeach
          <button type="button">Back</button>
          <a href="{{route('payment.add')}}" style="margin-left:10px;"><button type="button">Tambah</button></a>
        </table>
</body>
</html>

