@extends('adminlte::page')
@section('title', 'Edit Data Pembelian')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Data Pembelian</h1>
@stop
@section('content')
    <form action="{{ route('pembelian.update', $pembelian) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="nonota_beli">No Nota Beli</label>
                            <input type="number" class="form-control
@error('nonota_beli') is-invalid @enderror"
                                id="nonota_beli" placeholder="No Nota Beli" name="nonota_beli"
                                value="{{ $pembelian->nonota_beli ?? old('nonota_beli') }}">
                            @error('nonota_beli')
                                <span class="textdanger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tgl_beli">Tanggal Beli</label>
                            <input type="datetime-local" class="form-control 
@error('tgl_beli') is-invalid @enderror"
                                id="tgl_beli" placeholder="Tanggal Beli" name="tgl_beli"
                                value="{{ $pembelian->tgl_beli ?? old('tgl_beli') }}">
                            @error('tgl_beli')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="total_beli">Total Beli</label>
                            <input type="number" class="form-control 
@error('total_beli') is-invalid @enderror"
                                id="total_beli" placeholder="Total Beli" name="total_beli"
                                value="{{ $pembelian->total_beli ?? old('total_beli') }}">
                            @error('total_beli')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="id_distributor">Id Distributor</label>
                            <div class="input-group">
                                <input type="hidden" name="id_distributor" id="id_distributor"
                                    value="{{ $pembelian->fdistributor->id ?? old('id_distributor') }}">
                                <input type="text" class="form-control
@error('nama_distributor') is-invalid @enderror"
                                    placeholder="ID Distributor" id="nama_distributor" name="nama_distributor"
                                    value="{{ $pembelian->fdistributor->nama_distributor ?? old('nama_distributor') }}"
                                    arialabel="Nama Distributor" aria-describedby="cari" readonly>
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                    data-bs-target="#staticBackdrop"></i>
                                    Cari Data Nama Distributor</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Nama User</label>
                            <div class="input-group">
                                <input type="hidden" name="id_user" id="id_user"
                                    value="{{ $pembelian->fuser->id ?? old('id_user') }}">
                                <input type="text" class="form-control
@error('name') is-invalid @enderror"
                                    placeholder="Nama User" id="name" name="name"
                                    value="{{ $pembelian->fuser->name ?? old('name') }}" arialabel="Nama User"
                                    aria-describedby="cari" readonly>
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                    data-bs-target="#staticBackdrop1"></i>
                                    Cari Data Nama User</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('penjualan.index') }}" class="btn btn-danger">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1"
            arialabelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Nama Distributor</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered table-stripped" id="example1">
                            <thead>
                                <tr style="background-color: #1e81b0">
                                    <th style="color: white">No.</th>
                                    <th style="color: white">Nama</th>
                                    <th style="color: white">Alamat</th>
                                    <th style="color: white">No Telepon</th>
                                    <th style="color: white">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($distributor as $key => $dis)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $dis->nama_distributor }}</td>
                                        <td>{{ $dis->alamat }}</td>
                                        <td>{{ $dis->notelepon }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs"
                                                onclick="pilihdistributor('{{ $dis->id }}', '{{ $dis->alamat }}')"
                                                data-bs-dismiss="modal">
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
        <div class="modal fade" id="staticBackdrop1" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1"
            arialabelledby="staticBackdropLabel1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel1">Pencarian Data Nama User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered table-stripped" id="example2">
                            <thead>
                                <tr style="background-color: #1e81b0">
                                    <th style="color: white">No.</th>
                                    <th style="color: white">Name</th>
                                    <th style="color: white">Email</th>
                                    <th style="color: white">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $key => $us)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $us->name }}</td>
                                        <td>{{ $us->email }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs"
                                                onclick="pilihuser('{{ $us->id }}', '{{ $us->name }}')"
                                                data-bs-dismiss="modal">
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

            function pilihdistributor(id, distributor) {
                document.getElementById('id_distributor').value = id
                document.getElementById('nama_distributor').value = distributor
            }


            $('#example2').DataTable({
                "responsive": true,
            });

            function pilihuser(id, name) {
                document.getElementById('id_user').value = id
                document.getElementById('name').value = name
            }
        </script>
    @endpush
