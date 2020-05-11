@extends('adminlte::page')

@section('title', 'Siswa')

@section('content_header')
    <h1>Siswa</h1>
@stop

@section('content')
    <p>Selamat Datang di Halaman Siswa</p>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List Siswa</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <button type="button" class="btn btn-block bg-purple btn-flat pull-right" style="width:10%" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Tambah</button><br><br>
            <table id="example2" class="table table-bordered table-hover dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No_hp</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $dt)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                            <td>{{$dt->nama}}</td>
                            <td>{{$dt->no_hp}}</td>
                            <td>{{$dt->kelas->nama_kelas}}</td>
                            <td>
                            <button class="btn btn-warning" data-nama="{{$dt->nama}}" data-id="{{$dt->id_siswa}}" data-nomor="{{$dt->no_hp}}" data-kelas="{{$dt->id_kelas}}" data-toggle="modal" data-target="#modal-edit"><i class="glyphicon glyphicon-pencil"></i> Edit</button>
                            <button class="btn btn-danger" onclick="delete_data('{{$dt->id_siswa}}','{{$dt->nama}}')"><i class="fa fa-trash"></i> Delete</button>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <!-- /.box-body -->

            {{-- modal tambah --}}
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Tambah Siswa</h3>
      </div>
    <form action="{{route('tambah.siswa')}}" method="POST">
        @csrf
      <div class="modal-body">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nama Siswa:</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Siswa" required>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Nomor HP:</label>
                <input type="text" name="nomor" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Nomor Handphone" required>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Kelas:</label>
                    <select name="kelas" class="form-control" required>
                        <option value="">Pilih Kelas</option>
                        @foreach ($kelas as $data)
                        <option value="{{$data->id_kelas}}">{{$data->nama_kelas}}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn bg-purple">Tambah</button>
        </div>
    </form>
    </div>
  </div>
</div>

{{-- modal edit --}}
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"></h3>
      </div>
    <form action="{{route('update.siswa')}}" method="POST">
        @csrf
      <div class="modal-body">
          <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nama Siswa:</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Siswa" id="nama" required>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Nomor HP:</label>
                <input type="text" name="nomor" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="nomor" placeholder="Nomor Handphone" required>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Kelas:</label>
                    <select name="kelas" class="form-control" id="kelas" required>
                        <option value="">Pilih Kelas</option>
                        @foreach ($kelas as $data)
                        <option value="{{$data->id_kelas}}">{{$data->nama_kelas}}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn bg-purple">Update</button>
        </div>
    </form>
    </div>
  </div>
</div>

@stop

@section('css')
    
@stop

@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{url('js/siswa.js')}}"></script>
<script>
@if (session('info'))
    swal({
        title: "{{session('info')}}",
        text: "",
        icon: "success",
    });
@endif
</script>
@stop