<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice Rental (Selesai)</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 20mm;
        }
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            position: relative;
        }
        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 72px;
            color: rgba(79, 192, 79, 0.2);
            font-weight: bold;
            z-index: -1;
            width: 100%;
            text-align: center;
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
        .summary {
            margin-top: 30px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="watermark">TRANSAKSI SELESAI</div>

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
                <th>Tanggal Kembali</th>
                <th>Durasi (Hari)</th>
                <th>Biaya Rental</th>
                <th>Penalti</th>
                <th>Uang Muka</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($histories as $history)
            <tr>
                <td>{{ $history->item->name }}</td>
                <td>{{ $history->start_date->format('d/m/Y') }}</td>
                <td>{{ $history->end_date->format('d/m/Y') }}</td>
                <td>{{ $history->return_date->format('d/m/Y') }}</td>
                <td>{{ $history->start_date->diffInDays($history->end_date) }}</td>
                <td>Rp {{ number_format($history->total_cost - $history->penalty_total, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($history->penalty_total, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($history->dp, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($history->total_cost, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        <p><strong>Total Penalti:</strong> Rp {{ number_format($totalPenalty, 0, ',', '.') }}</p>
        <p><strong>Total Keseluruhan:</strong> Rp {{ number_format($totalAmount, 0, ',', '.') }}</p>
    </div>
</body>
</html>

