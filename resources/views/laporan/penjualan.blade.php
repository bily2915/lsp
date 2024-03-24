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

    <h1>Data Detail Penjualan</h1>

    <table id="customers">
        <tr style="background-color: #1e81b0">
            <th style="color: white">No.</th>
            <th style="color: white">Nota Jual</th>
            <th style="color: white">Nama Obat</th>
            <th style="color: white">Jumlah Jual</th>
            <th style="color: white">Sub Total Jual</th>
            <th style="color: white">Harga Jual</th>
        </tr>

        @php
            $no = 1;
        @endphp
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

    </table>

</body>

</html>
