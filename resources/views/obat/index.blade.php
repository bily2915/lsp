@extends('adminlte::page')
@section('title', 'List Obat')
@section('content_header')
    <h1 class="m-0 text-dark">List Obat</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('obat.create') }}" class="btn btn-primary mb-2">Tambah</a>
                    <a href="/exportpdf" class="btn btn-danger mb-2">Export PDF</a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr style="background-color: #1e81b0">
                                <th style="color: white">No.</th>
                                <th style="color: white">Kode Obat</th>
                                <th style="color: white">Nama Obat</th>
                                <th style="color: white">Merk</th>
                                <th style="color: white">Jenis</th>
                                <th style="color: white">Satuan</th>
                                <th style="color: white">Golongan</th>
                                <th style="color: white">Kemasan</th>
                                <th style="color: white">Harga Jual</th>
                                <th style="color: white">Stok</th>
                                <th style="color: white">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obat as $key => $obat)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $obat->kode_obat }}</td>
                                    <td>{{ $obat->nama_obat }}</td>
                                    <td>{{ $obat->merk }}</td>
                                    <td>{{ $obat->jenis }}</td>
                                    <td>{{ $obat->satuan }}</td>
                                    <td>{{ $obat->golongan }}</td>
                                    <td>{{ $obat->kemasan }}</td>
                                    <td>{{ $obat->harga_jual }}</td>
                                    <td>{{ $obat->stok }}</td>
                                    <td>
                                        <a href="{{ route('obat.edit', $obat) }}" class="btn btn-primary btn-xs"> Edit</a>
                                        <a href="{{ route('obat.destroy', $obat) }}"
                                            onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                            Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
