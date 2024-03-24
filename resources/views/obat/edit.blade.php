@extends('adminlte::page')
@section('title', 'Edit Obat')
@section('content_header')
 <h1 class="m-0 text-dark">Edit Obat</h1>
@stop
@section('content')
 <form action="{{route('obat.update', $obat)}}" method="post">
 @method('PUT')
 @csrf
 <div class="row">
 <div class="col-12">
 <div class="card">
 <div class="card-body">
 <div class="form-group">

<div class="form-group">
    <label for="exampleInputEmail">Kode Obat</label>
    <input type="kode_obat" class="form-control
   @error('kode_obat') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukan kode Obat" name="kode_obat" value="{{$obat->kode_obat ??old('kode_obat')}}">
    @error('kode_obat') <span class="textdanger">{{$message}}</span> @enderror
</div>

<div class="form-group">
    <label for="exampleInputEmail">Nama Obat</label>
    <input type="nama_obat" class="form-control
   @error('nama_obat') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukan Nama Obat" name="nama_obat" value="{{$obat->nama_obat ??old('nama_obat')}}">
    @error('nama_obat') <span class="textdanger">{{$message}}</span> @enderror
</div>

<div class="form-group">
    <label for="exampleInputEmail">Merk Obat</label>
    <input type="merk" class="form-control
   @error('merk') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukan Merk Obat" name="merk" value="{{$obat->merk ??old('merk')}}">
    @error('merk') <span class="textdanger">{{$message}}</span> @enderror
</div>

<div class="form-group">
    <label for="exampleInputEmail">Jenis</label>
    <input type="jenis" class="form-control
   @error('jenis') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukan Jenis Obat" name="jenis" value="{{$obat->jenis ??old('jenis')}}">
    @error('jenis') <span class="textdanger">{{$message}}</span> @enderror
</div>

<div class="form-group">
    <label for="exampleInputEmail">Satuan</label>
    <input type="satuan" class="form-control
   @error('satuan') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukan Satuan Obat" name="satuan" value="{{$obat->satuan ??old('satuan')}}">
    @error('satuan') <span class="textdanger">{{$message}}</span> @enderror
</div>

<div class="form-group">
    <label for="exampleInputEmail">Golongan Obat</label>
    <input type="golongan" class="form-control
   @error('golongan') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukan Golongan Obat" name="golongan" value="{{$obat->golongan ??old('golongan')}}">
    @error('golongan') <span class="textdanger">{{$message}}</span> @enderror
</div>

<div class="form-group">
    <label for="exampleInputEmail">Kemasan</label>
    <input type="kemasan" class="form-control
   @error('kemasan') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukan Kemasan Obat" name="kemasan" value="{{$obat->kemasan ??old('kemasan')}}">
    @error('kemasan') <span class="textdanger">{{$message}}</span> @enderror
</div>

<div class="form-group">
    <label for="exampleInputEmail">Harga Jual</label>
    <input type="harga_jual" class="form-control
   @error('harga_jual') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukan Harga Jual Obat" name="harga_jual" value="{{$obat->harga_jual ??old('harga_jual')}}">
    @error('harga_jual') <span class="textdanger">{{$message}}</span> @enderror
</div>

<div class="form-group">
    <label for="exampleInputEmail">Stok Obat</label>
    <input type="stok" class="form-control
   @error('stok') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukan Stok Obat" name="stok" value="{{$obat->stok ??old('stok')}}">
    @error('stok') <span class="textdanger">{{$message}}</span> @enderror
</div>

 </div>
 <div class="card-footer">
 <button type="submit" class="btn btn-primary">Simpan</button>
 <a href="{{route('obat.index')}}" class="btn btn-default">Batal</a>
 </div>
 </div>
 </div>
 </div>
@stop