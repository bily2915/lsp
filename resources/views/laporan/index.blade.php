@extends('adminlte::page')
@section('title', 'Data Detail Pembelian')
@section('content_header')
    <h1 class="m-0 text-dark"> Data Detail Pembelian</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('laporan.pembelian') }}" class="btn btn-danger mb-2">Export PDF</a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr style="background-color: #1e81b0">
                                <th style="color: white">No.</th>
                                <th style="color: white">Nota Pembelian</th>
                                <th style="color: white">Nama Obat</th>
                                <th style="color: white">Jumlah Beli</th>
                                <th style="color: white">Sub Total Beli</th>
                                <th style="color: white">Harga Beli</th>
                                <th style="color: white">Persen Margin Jual</th>
                                <th style="color: white">Tanggal Kadarluarsa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_pembelian as $key => $detail_pembelian)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $detail_pembelian->fpembelian->nonota_beli }}</td>

                                    <td>{{ $detail_pembelian->fobat->merk . ' - ' . $detail_pembelian->fobat->nama_obat }}
                                    </td>
                                    <td>{{ $detail_pembelian->jumlah_beli }}</td>
                                    <td>Rp. {{ number_format($detail_pembelian->sub_total_beli, 0, '.', '.') }}</td>
                                    <td>Rp. {{ number_format($detail_pembelian->harga_beli, 0, '.', '.') }}</td>
                                    <td>{{ $detail_pembelian->persen_margin_jual }} %</td>
                                    <td>{{ date('d F Y', strtotime($detail_pembelian->tgl_kadarluarsa)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <h3 class="m-0 mb-2 text-dark"> Data Detail Penjualan</h3>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('laporan.penjualan') }}" class="btn btn-danger mb-2">Export PDF</a>
                    <table class="table table-hover table-bordered table-stripped" id="example3">
                        <thead>
                            <tr style="background-color: #1e81b0">
                                <th style="color: white">No.</th>
                                <th style="color: white">Nota Jual</th>
                                <th style="color: white">Nama Obat</th>
                                <th style="color: white">Jumlah Jual</th>
                                <th style="color: white">Sub Total Jual</th>
                                <th style="color: white">Harga Jual</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_penjualan as $key => $sk)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $sk->fpenjualan->nonota_jual }}</td>
                                    <td>{{ $sk->fobat->merk . ' - ' . $sk->fobat->nama_obat }}
                                    </td>
                                    <td>{{ $sk->jumlah_jual }}</td>
                                    <td>Rp. {{ number_format($sk->sub_total_jual, 0, '.', '.') }}</td>
                                    <td>Rp. {{ number_format($sk->harga_jual, 0, '.', '.') }}</td>
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

        $('#example3').DataTable({
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
