@extends('adminlte::page')

@section('title', 'Absensi')

@section('content_header')
    <h1>Absensi</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
        <h3 class="box-title">Absensi Siswa <b>{{$kelas->nama_kelas}}</b></h3><br>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <label>Date:</label>
        <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                
                <form action="{{url()->current()}}" method="GET">
                    <input type="text" id="date"name="date" class="form-control" style="width:10%;" placeholder="DD/MM/YYYY" onkeypress="return false;" value="{{$date}}"> 
                    &nbsp;<button class="btn bg-fuchsia">Search</button>
                </form>
                </div>
            <a href="tambah/{{$kelas->id_kelas}}/{{$date}}"><button type="button" class="btn btn-block bg-purple btn-flat pull-right" style="width:10%"><i class="fa fa-plus"></i> Tambah</button></a><br><br>
            <table id="example2" class="table table-bordered table-hover dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absen as $dt)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                            <td>{{$dt->nama}}</td>
                            <td style="text-align:center">
                            @switch($dt->status)
                                @case('sakit')
                                    <a style="color:red; text-decoration:none; font-weight:bolder; font-size:18px; text-transform:capitalize">{{$dt->status}}
                                    </a>
                                    @break
                                @case('izin')
                                    <a style="color:orange; text-decoration:none; font-weight:bolder; font-size:18px; text-transform:capitalize">{{$dt->status}}
                                    </a>
                                    @break
                                @default
                                    <a style="color:green; text-decoration:none; font-weight:bolder; font-size:18px; text-transform:capitalize">{{$dt->status}}
                                    </a>
                            @endswitch
                            </td>
                            <td>
                            @if($dt->status != 'masuk')
                            <button class="btn btn-info" data-ket="{{$dt->keterangan}}"  data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-info"></i> Keterangan</button>
                            @endif
                            <button class="btn btn-danger" onclick="delete_data('{{$dt->id_absen}}','{{$dt->siswa->nama}}')"><i class="fa fa-trash"></i> Hapus</button>
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
        <h3 class="modal-title" id="exampleModalLabel">Keterangan Siswa</h3>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Keterangan:</label>
                <textarea name="" id="keterangan" cols="20" rows="5" class="form-control" readonly></textarea>
            </div>
        </div>
    </div>
  </div>
</div>

@stop

@section('css')

@stop

@section('js')
<script src="{{url('js/absensi.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
@if (session('info'))
    swal({
        title: "{{session('info')}}",
        text: "",
        icon: "success",
    });
@endif
    $('#date').datetimepicker({
        format: 'YYYY-MM-DD',
    });

</script>
@stop