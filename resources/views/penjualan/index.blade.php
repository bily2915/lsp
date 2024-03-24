@extends('adminlte::page')
@section('title', 'List Penjualan')
@section('content_header')
    <h1 class="m-0 text-dark">List Penjualan</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('penjualan.create') }}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <a href="/exportpdf2" class="btn btn-danger mb-2">Export PDF</a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr style="background-color: #1e81b0">
                                <th style="color: white">No.</th>
                                <th style="color: white">No Nota Penjualan</th>
                                <th style="color: white">Tanggal Penjualan</th>
                                <th style="color: white">Total Penjualan</th>
                                <th style="color: white">Id User</th>
                                <th style="color: white">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penjualan as $key => $penjualan)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td id={{ $key + 1 }}>{{ $penjualan->nonota_jual }}</td>
                                    <td id={{ $key + 1 }}>{{ $penjualan->tgl_jual }}</td>
                                    <td id={{ $key + 1 }}>{{ $penjualan->total_jual }}</td>
                                    <td id={{ $key + 1 }}>{{ $penjualan->fuser->name }}</td>
                                    <td>
                                        <a href="{{ route('penjualan.edit', $penjualan) }}" class="btn btn-primary btn-xs">
                                            Edit
                                        </a>
                                        <a href="{{ route('penjualan.destroy', $penjualan) }}"
                                            onclick="notificationBeforeDelete(event, this, <?php echo $key + 1; ?>)"
                                            class="btn btn-danger btn-xs">
                                            Delete
                                        </a>
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

        function notificationBeforeDelete(event, el, dt) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data penjualan \"' + document.getElementById(dt).innerHTML +
                    '\" ?')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
