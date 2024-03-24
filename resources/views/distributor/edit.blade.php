@extends('adminlte::page')
@section('title', 'Edit Distributor')
@section('content_header')
 <h1 class="m-0 text-dark">Edit Distributor</h1>
@stop
@section('content')
 <form action="{{route('distributor.update', $distributor)}}" method="post">
 @method('PUT')
 @csrf
 <div class="row">
 <div class="col-12">
 <div class="card">
 <div class="card-body">
 <div class="form-group">

<div class="form-group">
    <label for="exampleInputEmail">Nama Distributor</label>
    <input type="nama_distributor" class="form-control
   @error('nama_distributor') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukan Nama Distributor" name="nama_distributor" value="{{$distributor->nama_distributor ??old('nama_distributor')}}">
    @error('nama_distributor') <span class="textdanger">{{$message}}</span> @enderror
</div>

<div class="form-group">
    <label for="exampleInputEmail">Alamat</label>
    <input type="alamat" class="form-control
   @error('alamat') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukan Alamat Distributor" name="alamat" value="{{$distributor->alamat ??old('alamat')}}">
    @error('alamat') <span class="textdanger">{{$message}}</span> @enderror
</div>

<div class="form-group">
    <label for="exampleInputEmail">Nomor Telfon</label>
    <input type="notelepon" class="form-control
   @error('notelepon') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukan Merk Obat" name="notelepon" value="{{$distributor->notelepon ??old('notelepon')}}">
    @error('notelepon') <span class="textdanger">{{$message}}</span> @enderror
</div>

 </div>
 <div class="card-footer">
 <button type="submit" class="btn btn-primary">Simpan</button>
 <a href="{{route('obat.index')}}" class="btn btn-danger">Batal</a>
 </div>
 </div>
 </div>
 </div>
@stop