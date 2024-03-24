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
 
    <h1>Data Penjualan</h1>

    <table id="customers">
        <tr style="background-color: #1e81b0">
            <th style="color: white">No.</th>
            <th style="color: white">No Nota Jual</th>
            <th style="color: white">Tanggal Jual</th>
            <th style="color: white">Total Jual</th>
            <th style="color: white">Id User</th>
        </tr>
        
        @php
            $no=1;
        @endphp
        @foreach ($penjualan as $penjualan)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $penjualan->nonota_jual }}</td>
            <td>{{ $penjualan->tgl_jual }}</td>
            <td>{{ $penjualan->total_jual }}</td>
            <td>{{ $penjualan->fuser->name }}</td>
        </tr>
        @endforeach
        
    </table>

</body>

</html>
