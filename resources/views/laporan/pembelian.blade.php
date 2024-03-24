<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 6px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 8px;
            padding-bottom: 8px;
            text-align: left;
            background-color: #1f0add;
            color: white;
        }
    </style>
</head>

<body>

    <h1 style="text-align: center">Data Detail Pembelian</h1>

    <table id="customers">
        <tr style="background-color: #1e81b0">
            <th style="color: white">No.</th>
            <th style="color: white">Nota Pembelian</th>
            <th style="color: white">Nama Obat</th>
            <th style="color: white">Jumlah Beli</th>
            <th style="color: white">Sub Total Beli</th>
            <th style="color: white">Harga Beli</th>
            <th style="color: white">Persen Margin Jual</th>
            <th style="color: white">Tanggal Kadaluarsa</th>
        </tr>

        @php
            $no = 1;
        @endphp
        @foreach ($detail_pembelian as $key => $dpb)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $dpb->fpembelian->nonota_beli }}</td>

                <td>{{ $dpb->fobat->merk . ' - ' . $dpb->fobat->nama_obat }}
                </td>
                <td>{{ $dpb->jumlah_beli }}</td>
                <td>Rp. {{ number_format($dpb->sub_total_beli, 0, '.', '.') }}</td>
                <td>Rp. {{ number_format($dpb->harga_beli, 0, '.', '.') }}</td>
                <td>{{ $dpb->persen_margin_jual }} %</td>
                <td>{{ date('d F Y', strtotime($dpb->tgl_kadarluarsa)) }}</td>
            </tr>
        @endforeach

    </table>

</body>

</html>
