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
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #87CBB9;
            color: white;
        }
    </style>
</head>

<body>

    <h1>Data Detail Pembelian</h1>

    <table id="customers">
        <tr style="background-color: #1e81b0">
            <th style="color: white">No.</th>
            <th style="color: white">ID Pembelian</th>
            <th style="color: white">Tanggal Kadarluarsa</th>
            <th style="color: white">Harga Beli</th>
            <th style="color: white">Jumlah Beli</th>
            <th style="color: white">Sub Total Beli</th>
            <th style="color: white">Persen margin Jual</th>
            <th style="color: white">Id Obat</th>
        </tr>

        @php
            $no = 1;
        @endphp
        @foreach ($detail_pembelian as $dpb)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $dpb->id_pembelian }}</td>
                <td>{{ $dpb->tgl_kadarluarsa }}</td>
                <td>{{ $dpb->harga_beli }}</td>
                <td>{{ $dpb->jumlah_beli }}</td>
                <td>{{ $dpb->sub_total_beli }}</td>
                <td>{{ $dpb->persen_margin_jual }}</td>
                <td>{{ $dpb->id_obat }}</td>
            </tr>
        @endforeach

    </table>

</body>

</html>
