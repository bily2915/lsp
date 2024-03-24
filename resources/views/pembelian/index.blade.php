@extends('adminlte::page')
@section('title', 'List Data Pembelian')
@section('content_header')
    <h1 class="m-0 text-dark">List Data Pembelian</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('pembelian.create') }}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <a href="/exportpdf1" class="btn btn-danger mb-2">Export PDF</a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr style="background-color: #1e81b0">
                                <th style="color: white">No.</th>
                                <th style="color: white">No Nota Pembelian</th>
                                <th style="color: white">Tanggal Pembelian</th>
                                <th style="color: white">Total Pembelian</th>
                                <th style="color: white">Nama Distributor</th>
                                <th style="color: white">Nama User</th>
                                <th style="color: white">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembelian as $key => $pembelian)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td id={{ $key + 1 }}>{{ $pembelian->nonota_beli }}</td>
                                    <td id={{ $key + 1 }}>{{ $pembelian->tgl_beli }}</td>
                                    <td id={{ $key + 1 }}>{{ $pembelian->total_beli }}</td>
                                    <td id={{ $key + 1 }}>{{ $pembelian->fdistributor->nama_distributor }}</td>
                                    <td id={{ $key + 1 }}>{{ $pembelian->fuser->name }}</td>
                                    <td>
                                        <a href="{{ route('pembelian.edit', $pembelian) }}" class="btn btn-primary btn-xs">
                                            Edit
                                        </a>
                                        <a href="{{ route('pembelian.destroy', $pembelian) }}"
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
            if (confirm('Apakah anda yakin akan menghapus data Pembelian ?\ "' + document.getElementById(dt).innerHTML +
                    '\" ?')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
