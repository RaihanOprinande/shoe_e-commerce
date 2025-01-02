<!DOCTYPE html>
<html>
<head>
    <title>Generate PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 5px;
        }
        h1 {
            text-align: center;
            font-size: 1.2em;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.8em;
        }
        th, td {
            border: 1px solid #000;
            padding: 4px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .no {
            width: 5%;
        }
        .harga, .kategori, .merek {
            width: 12%;
        }
        .size, .jumlah, .total {
            width: 10%;
        }
    </style>
</head>
<body>

<h1>Daftar Keuangan Pemasukan</h1>

<table>
    <tr>
        <th>No</th>
        <th>Sepatu</th>
        <th>Brand</th>
        <th>Harga Satuan</th>
        <th>Ukuran</th>
        <th>quantity</th>
        <th>Tanggal</th>
        <th>Total Harga</th>
    </tr>
    @foreach ($incomes as $data)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->sepatus->nama }}</td>
        <td>{{ $data->sepatus->brands->nama_brand }}</td>
        <td>Rp {{ number_format($data->sepatus->harga, 0, ',', '.') }}</td>
        <td>{{ $data->sizes->size }}</td>
        <td>{{ $data->quantity }}</td>
        <td>{{ $data->tanggal ? $data->tanggal->format('d-m-Y') : '-' }}</td>
        <td>Rp {{ number_format($data->total_harga, 0, ',', '.') }}</td>
    </tr>
    @endforeach
    <tr class="table-secondary">
        <td colspan="7" class="text-start fw-bold">Total Pemasukan:</td>

        <td class="fw-bold">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</td>
    </tr>
</table>

</body>
</html>
