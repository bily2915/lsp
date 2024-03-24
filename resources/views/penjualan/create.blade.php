@extends('adminlte::page')
@section('title', 'Tambah List Penjualan')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah List Penjualan</h1>
@stop
@section('content')
    <form action="{{ route('penjualan.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="nonota_jual">No Nota Jual</label>
                            <input type="number" class="form-control 
@error('nonota_jual') is-invalid @enderror"
                                id="nonota_jual" placeholder="Nomor Nota Penjualan" name="nonota_jual"
                                value="{{ old('nonota_jual') }}">
                            @error('nonota_jual')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tgl_jual">Tanggal Jual</label>
                            <input type="datetime-local" class="form-control 
@error('tgl_jual') is-invalid @enderror"
                                id="tgl_jual" placeholder="Tanggal Penjualan" name="tgl_jual"
                                value="{{ old('tgl_jual') }}">
                            @error('tgl_jual')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="total_jual">Total Jual</label>
                            <input type="number" class="form-control 
@error('total_jual') is-invalid @enderror"
                                id="total_jual" placeholder="Total Jual" name="total_jual"
                                value="{{ old('total_jual') }}">
                            @error('total_jual')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Nama user</label>
                            <div class="input-group">
                                <input type="hidden" name="id_user" id="id_user" value="{{ old('id_user') }}">
                                <input type="text" class="form-control
        @error('email') is-invalid @enderror"
                                    placeholder="Nama User" id="name" name="name" value="{{ old('name') }}"
                                    arialabel="Nama User" aria-describedby="cari" readonly>
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                    data-bs-target="#staticBackdrop"></i>
                                    Cari ID User</button>
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
        <div class="modal fade" id="staticBackdrop" data-bs-bac kdrop="static" data-bs-keyboard="false" tabindex="-1"
            arialabelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data ID User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <table class="table table-hover table-bordered tablestripped" id="example2">
                            <thead>
                                <tr style="background-color: #2176ff">
                                    <th style="color: white">No.</th>
                                    <th style="color: white">Nama</th>
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
            $('#example2').DataTable({
                "responsive": true,
            });
            //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Bidang Studi dari Modal ke form tambah
            function pilihuser(id, user) {
                document.getElementById('id_user').value = id
                document.getElementById('users').value = user
            }
        </script>
    @endpush
