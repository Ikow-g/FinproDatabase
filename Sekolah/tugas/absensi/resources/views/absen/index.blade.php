{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Absensi Kelas')

@section('content_header')
    <h1>Absen</h1>
@stop

@section('content')
    <p>Selamat Datang di Halaman Absen</p>
      <div class="box">
        <div class="box-header">
            <h3 class="box-title">List Absen Kelas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
    <div class="container">
        <div class="row">
        @foreach ($kelas as $item)   
        <div class="col-lg-4" style="margin-bottom:5%;">
            <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('img/class.jpg')}}" alt="Card image cap" height="200px" width="260px">
              <div class="card-body">
                <h4 class="card-title" style="font-weight:bold">{{$item->nama_kelas}}</h4>
              <p class="card-text">
                Total Murid : {{count($item->siswa)}}<br>
                Siswa : {{count($item->siswa->where('jk',1))}}<br>
                Siswi : {{count($item->siswa->where('jk',0))}}
              </p>
                <a href="{{route('kelas.absen',$item->id_kelas)}}" class="btn btn-info">Lihat Absensi</a>
              </div>
            </div>
          </div>
        @endforeach     
      </div>
    </div>
  </div>
</div>
            <!-- /.box-body -->
@stop

@section('css')

@stop

@section('js')

@stop