@extends('adminlte::page')
@section('title', 'Edit Data Detail Pembelian')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Data Detail Pembelian</h1>
@stop
@section('content')
    <form action="{{ route('detail_pembelian.update', $detail_pembelian) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="nonota_beli">No Nota Beli</label>
                            <div class="input-group">
                                <input type="hidden" name="id_pembelian" id="id_pembelian"
                                    value="{{ $detail_pembelian->fpembelian->id ?? old('id_pembelian') }}">
                                <input type="text" class="form-control
@error('nonota_beli') is-invalid @enderror"
                                    placeholder="No Nota Pembelian" id="nonota_beli" name="nonota_beli"
                                    value="{{ $detail_pembelian->fpembelian->nonota_beli ?? old('nonota_beli') }}"
                                    arialabel="No Nota Beli" aria-describedby="cari" readonly>
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                    data-bs-target="#staticBackdrop"></i>
                                    Cari Data No Nota Beli</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tgl_kadarluarsa">Tanggal Kadarluarsa</label>
                            <input type="datetime-local" class="form-control
@error('tgl_kadarluarsa') is-invalid @enderror"
                                id="tgl_kadarluarsa" placeholder="Tanggal Kadarluarsa" name="tgl_kadarluarsa"
                                value="{{ $detail_pembelian->tgl_kadarluarsa ?? old('tgl_kadarluarsa') }}">
                            @error('tgl_kadarluarsa')
                                <span class="textdanger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="harga_beli">Harga Beli</label>
                            <input type="text" class="form-control 
@error('harga_beli') is-invalid @enderror"
                                id="harga_beli" placeholder="Harga Beli" name="harga_beli"
                                value="{{ $detail_pembelian->harga_beli ?? old('harga_beli') }}">
                            @error('harga_beli')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jumlah_beli">Jumlah Beli</label>
                            <input type="number" class="form-control 
@error('jumlah_beli') is-invalid @enderror"
                                id="jumlah_beli" placeholder="Jumlah Beli" name="jumlah_beli"
                                value="{{ $detail_pembelian->jumlah_beli ?? old('jumlah_beli') }}">
                            @error('jumlah_beli')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sub_total_beli">Sub Total Beli</label>
                            <input type="number" class="form-control 
@error('sub_total_beli') is-invalid @enderror"
                                id="sub_total_beli" placeholder="Sub Total Beli" name="sub_total_beli"
                                value="{{ $detail_pembelian->sub_total_beli ?? old('sub_total_beli') }}">
                            @error('sub_total_beli')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="persen_margin_jual">Persen Margin Jual</label>
                            <input type="number" class="form-control 
@error('persen_margin_jual') is-invalid @enderror"
                                id="persen_margin_jual" placeholder="Persen Margin Jual" name="persen_margin_jual"
                                value="{{ $detail_pembelian->persen_margin_jual ?? old('persen_margin_jual') }}">
                            @error('persen_margin_jual')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kode_obat">Kode Obat</label>
                            <div class="input-group">
                                <input type="hidden" name="id_obat" id="id_obat"
                                    value="{{ $detail_pembelian->fobat->id ?? old('id_obat') }}">
                                <input type="text" class="form-control
@error('nama_obat') is-invalid @enderror"
                                    placeholder="ID Obat" id="kode_obat" name="kode_obat"
                                    value="{{ $detail_pembelian->fobat->kode_obat ?? old('kode_obat') }}" arialabel="Kode Obat"
                                    aria-describedby="cari" readonly>
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                    data-bs-target="#staticBackdrop1"></i>
                                    Cari Data Kode Obat</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('detail_pembelian.index') }}" class="btn btn-danger">
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
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data No. Pembelian</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered table-stripped" id="example1">
                            <thead>
                                <tr style="background-color: #1e81b0">
                                    <th style="color: white">No.</th>
                                    <th style="color: white">No Nota Beli</th>
                                    <th style="color: white">Tanggal Beli</th>
                                    <th style="color: white">Total Beli</th>
                                    <th style="color: white">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembelian as $key => $pembelian)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $pembelian->nonota_beli }}</td>
                                        <td>{{ $pembelian->tgl_beli }}</td>
                                        <td>{{ $pembelian->total_beli }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs"
                                                onclick="pilih('{{ $pembelian->id }}', '{{ $pembelian->nonota_beli }}')"
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
                        <h1 class="modal-title fs-5" id="staticBackdropLabel1">Pencarian Data Nama Obat</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered table-stripped" id="example2">
                            <thead>
                                <tr style="background-color: #1e81b0">
                                    <th style="color: white">No.</th>
                                    <th style="color: white">Nama Obat</th>
                                    <th style="color: white">Merk</th>
                                    <th style="color: white">Jenis</th>
                                    <th style="color: white">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($obat as $key => $obat)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $obat->nama_obat }}</td>
                                        <td>{{ $obat->merk }}</td>
                                        <td>{{ $obat->jenis }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs"
                                                onclick="pilih1('{{ $obat->id }}', '{{ $obat->nama_obat }}')"
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
            //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Bidang Studi dari Modal ke form tambah

            function pilih(id, pembelian) {
                document.getElementById('id_pembelian').value = id
                document.getElementById('nonota_beli').value = pembelian
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
