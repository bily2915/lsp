@extends('adminlte::page')
@section('title', 'Edit Data Detail Penjualan')
@section('content_header')
<h1 class="m-0 text-dark">Edit Data Detail Penjualan</h1>
@stop
@section('content')
<form action="{{route('detail_penjualan.update', $detail_penjualan)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="jumlah_jual">Jumlah Jual</label>
                        <input type="number" class="form-control
@error('jumlah_jual') is-invalid @enderror" id="jumlah_jual" placeholder="Jumlah Jual"
                            name="jumlah_jual" value="{{$detail_penjualan->jumlah_jual ?? old('jumlah_jual')}}">
                        @error('jumlah_jual') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="number" class="form-control 
@error('harga_jual') is-invalid @enderror" id="harga_jual" placeholder="Harga Jual" name="harga_jual" value="{{$detail_penjualan->harga_jual ?? old('harga_jual')}}">
                        @error('harga_jual') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="sub_total_jual">Sub Total Jual</label>
                        <input type="number" class="form-control 
@error('sub_total_jual') is-invalid @enderror" id="sub_total_jual" placeholder="Sub Total Jual" name="sub_total_jual" value="{{$detail_penjualan->sub_total_jual ?? old('sub_total_jual')}}">
                        @error('sub_total_jual') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="id_penjualan">No Nota Jual</label>
                        <div class="input-group">
                            <input type="hidden" name="id_penjualan" id="id_penjualan" value="{{$detail_penjualan->fpenjualan->nonota_jual ?? old('nonota_jual')}}">
                            <input type="text" class="form-control
@error('penjualan') is-invalid @enderror" placeholder="No Nota Jual" id="penjualan" name="penjualan" value="{{$detail_penjualan->fpenjualan->nonota_jual ?? old('nonota_jual')}}" arialabel="penjualan" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop"></i>
                                Cari Data No. Penjualan</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="id_obat">Nama Obat</label>
                        <div class="input-group">
                            <input type="hidden" name="id_obat" id="id_obat" value="{{$detail_penjualan->fobat->nama_obat ?? old('nama_obat')}}">
                            <input type="text" class="form-control
@error('obat') is-invalid @enderror" placeholder="Nama Obat" id="obat" name="obat" value="{{$detail_penjualan->fobat->nama_obat ?? old('nama_obat')}}" arialabel="obat" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop1"></i>
                                Cari Data Nama Obat</button>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('pembelian.index')}}" class="btn btn-danger">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1" arialabelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data No. Penjualan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-bordered table-stripped" id="example1">
                        <thead>
                            <tr style="background-color: #1e81b0">
                                <th style="color: white">No.</th>
                                <th style="color: white">No Nota Jual</th>
                                <th style="color: white">Tanggal Jual</th>
                                <th style="color: white">Total Jual</th>
                                <th style="color: white">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penjualan as $key => $penjualan)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$penjualan->nonota_jual}}</td>
                                <td>{{$penjualan->tgl_jual}}</td>
                                <td>{{$penjualan->total_jual}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs" 
                                        onclick="pilih('{{$penjualan->id}}', '{{$penjualan->nonota_jual}}')" data-bs-dismiss="modal">
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop1" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1" arialabelledby="staticBackdropLabel1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel1">Pencarian Data Nama Obat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr style="background-color: #1e81b0">
                                <th style="color: black">No.</th>
                                <th style="color: black">Nama Obat</th>
                                <th style="color: black">Merk</th>
                                <th style="color: black">Jenis</th>
                                <th style="color: black">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($obat as $key => $obat)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$obat->nama_obat}}</td>
                                <td>{{$obat->merk}}</td>
                                <td>{{$obat->jenis}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs" 
                                        onclick="pilih1('{{$obat->id}}', '{{$obat->nama_obat}}')" data-bs-dismiss="modal">
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    @stop
    @push('js')
    <script>
    $('#example1').DataTable({
        "responsive": true,
    });
    //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Bidang Studi dari Modal ke form tambah

    function pilih(id, penjualan) {
        document.getElementById('id_penjualan').value = id
        document.getElementById('nonota_jual').value = penjualan
    }


    $('#example2').DataTable({
        "responsive": true,
    });
    //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Bidang Studi dari Modal ke form tambah

    function pilih1(id, obat) {
        document.getElementById('id_obat').value = id
        document.getElementById('nama_obat').value = obat
    }
    </script>
    @endpush