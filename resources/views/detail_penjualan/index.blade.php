@extends('adminlte::page')
@section('title', 'List Data Detail Penjualan')
@section('content_header')
    <h1 class="m-0 text-dark">List Data Detail Penjualan</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('detail_penjualan.create') }}" class="btn btn-primary mb-2">Tambah
                    </a>
                    <a href="/exportpdf4" class="btn btn-danger mb-2">Export PDF</a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr style="background-color: #1e81b0">
                                <th style="color: white">No.</th>
                                <th style="color: white">Jumlah Jual</th>
                                <th style="color: white">Harga Jual</th>
                                <th style="color: white">Sub Total Jual</th>
                                <th style="color: white">No Jual</th>
                                <th style="color: white">Nama Obat</th>
                                <th style="color: white">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_penjualan as $key => $sk)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $sk->jumlah_jual }}</td>
                                    <td>{{ $sk->harga_jual }}</td>
                                    <td>{{ $sk->sub_total_jual }}</td>
                                    <td>{{ $sk->fpenjualan->nonota_jual }}</td>
                                    <td>{{ $sk->fobat->nama_obat }}</td>
                                    <td>
                                        <a href="{{ route('detail_penjualan.edit', $sk) }}" class="btn btn-primary btn-xs">
                                            Edit
                                        </a>
                                        <a href="{{ route('detail_penjualan.destroy', $sk) }}"
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
            if (confirm('Apakah anda yakin akan menghapus data detail penjualan ?')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
