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
 
    <h1>Data Obat</h1>

    <table id="customers">
        <tr>
            <th>No.</th>
            <th>Kode Obat</th>
            <th>Nama Obat</th>
            <th>Merk</th>
            <th>Jenis</th>
            <th>Satuan</th>
            <th>Golongan</th>
            <th>Kemasan</th>
            <th>Harga Jual</th>
            <th>Stok</th>
        </tr>
        
        @php
            $no=1;
        @endphp
        @foreach ($obat as $obat)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $obat->kode_obat }}</td>
            <td>{{ $obat->nama_obat }}</td>
            <td>{{ $obat->merk }}</td>
            <td>{{ $obat->jenis }}</td>
            <td>{{ $obat->satuan }}</td>
            <td>{{ $obat->golongan }}</td>
            <td>{{ $obat->kemasan }}</td>
            <td>{{ $obat->harga_jual }}</td>
            <td>{{ $obat->stok }}</td>
        </tr>
        @endforeach
        
    </table>

</body>

</html>
