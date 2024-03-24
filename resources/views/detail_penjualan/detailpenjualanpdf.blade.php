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
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #87CBB9;
            color: white;
        }
    </style>
</head>

<body>
 
    <h1>Data Detail Penjualan</h1>

    <table id="customers">
        <tr style="background-color: #1e81b0">
            <th style="color: white">No.</th>
            <th style="color: white">Jumlah Jual</th>
            <th style="color: white">Harga Jual</th>
            <th style="color: white">Sub Total Jual</th>
            <th style="color: white">No. Penjualan</th>
            <th style="color: white">Nama Obat</th>
        </tr>
        
        @php
            $no=1;
        @endphp
        @foreach ($detail_penjualan as $dpl)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $dpl->jumlah_jual }}</td>
            <td>{{ $dpl->harga_jual }}</td>
            <td>{{ $dpl->sub_total_jual }}</td>
            <td>{{ $dpl->fpenjualan->nonota_jual }}</td>
            <td>{{ $dpl->fobat->nama_obat }}</td>
        </tr>
        @endforeach
        
    </table>

</body>

</html>
