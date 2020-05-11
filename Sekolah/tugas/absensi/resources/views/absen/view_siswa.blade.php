@extends('adminlte::page')

@section('title', 'Absensi Kelas ' . $siswa->first()->kelas->nama_kelas)

@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <h1>Absensi Siswa</h1>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <a href="/absensi/{{$id_kelas}}?date={{$date}}"><button class="btn-primary btn-block active" style="width:10%;">Back</button></a><br>
            <h3 class="box-title">Tambah Absensi Siswa <b>{{$siswa->first()->kelas->nama_kelas}}</b></h3><br>
            <a id="date">{{$date}}</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div hidden>
                <a class="sakit" id="sakit">Sakit</a>
                <a class="izin" id="izin">Izin</a>
                <a class="masuk" id="masuk">Masuk</a>
            </div>
            <table id="example2" class="table table-bordered table-hover dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No_hp</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $dt)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                            <td>{{$dt->nama}}</td>
                            <td>{{$dt->no_hp}}</td>
                            <td style="text-align:center;">
                            <?php $status = $dt->absen()->whereDate('tanggal',$date)->first() ?>
                            @switch($status ? $status->status : '')
                                @case('sakit')
                                <a class="sakit">{{$status->status}}</a>
                                    @break
                                @case('izin')
                                <a class="izin">{{$status->status}}</a>
                                    @break
                                    @case('masuk')
                                <a class="masuk">{{$status->status}}</a>
                                    @break
                                @default
                                <a style="text-decoration:none; font-weight:bolder; font-size:16px; text-transform:capitalize; color:black;">--- Belum Ada Status ---</a>
                            @endswitch
                            </td>
                            <td>
                                
                            <button class="btn btn-success" data-id="{{$dt->id_siswa}}" id="button_masuk"><i class="fa fa-check"></i> Masuk</button>
                            <button class="btn btn-warning" id="warn" data-nama="{{$dt->nama}}" data-id="{{$dt->id_siswa}}" data-stat="izin" data-ket="{{$status ? $status->keterangan : ''}}" data-toggle="modal" data-target="#modal-izin"><i class="glyphicon glyphicon-pencil"></i> Izin</button>
                            <button class="btn btn-danger" id="dang" data-nama="{{$dt->nama}}" data-id="{{$dt->id_siswa}}" data-stat="sakit" data-ket="{{$status ? $status->keterangan : ''}}" data-toggle="modal" data-target="#modal-izin"><i class="fa fa-medkit"></i> Sakit</button>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <!-- /.box-body -->

            {{-- modal izin --}}
<div class="modal fade" id="modal-izin" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title"></h3>
      </div>
      <div class="modal-body">
          <div hidden>
            <input type="hidden" value="" id="stat">
          </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Keterangan Izin:</label>
                <textarea id="Iketerangan" cols="30" rows="10" class="form-control" placeholder="Keterangan"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" id="insert" class="btn btn-info">Izin</button>
        </div>
    </div>
  </div>
</div>


@stop

@section('css')
<link rel="stylesheet" href="{{url('css/absensi.css')}}">    
@stop

@section('js')
<script src="{{url('js/absensi.js')}}"></script>
@stop