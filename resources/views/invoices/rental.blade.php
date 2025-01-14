<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice Rental</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 20mm;
        }
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
        }
        .total {
            text-align: right;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Invoice Rental</h1>
        <p>Tanggal: {{ now()->format('d/m/Y') }}</p>
    </div>

    <div class="customer-info">
        <p><strong>Pelanggan:</strong> {{ $user->email }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Barang</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Durasi (Hari)</th>
                <th>Harga per Hari</th>
                <th>Uang Muka</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rentals as $rental)
            <tr>
                <td>{{ $rental->item->name }}</td>
                <td>{{ $rental->start_date->format('d/m/Y') }}</td>
                <td>{{ $rental->end_date->format('d/m/Y') }}</td>
                <td>{{ $rental->start_date->diffInDays($rental->end_date) }}</td>
                <td>Rp {{ number_format($rental->item->price, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($rental->dp, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($rental->item->price * $rental->start_date->diffInDays($rental->end_date), 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        <p>Total: Rp {{ number_format($totalAmount, 0, ',', '.') }}</p>
    </div>
</body>
</html>
