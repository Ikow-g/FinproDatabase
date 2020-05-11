@extends('template')
@section('title','Dashboard')
@section('content')
<div class="col-md-12">
    <div class="card strpied-tabled-with-hover">
        <div class="card-header ">
            <h4 class="card-title">Striped Table with Hover</h4>
            <p class="card-category">Here is a subtitle for this table</p>
        </div>
        <div class="card-body table-full-width table-responsive">
            <table class="table table-hover table-striped">
                    <caption style="margin-left:1%;">Total : </caption>
                    <button style="float:right;">Tambah</button>
            <thead>
                <tr>
                    <th>No</th>
                    <th style="width:22%;">Picture</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Status</th>
                    <th>Race</th>
                </tr>
            </thead>
                <tbody>
                    @foreach ($char as $data)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->picture}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->gender}}</td>
                    <td>{{$data->age}}</td>
                    <td>{{$data->status}}</td>
                    <td>{{$data->race_id}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('css')
    <style>

    </style>
@endsection