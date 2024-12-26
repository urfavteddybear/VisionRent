<!-- resources/views/pdf/history-report.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Laporan History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan History Peminjaman</h2>
        <p>Periode: {{ \Carbon\Carbon::parse($start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($end_date)->format('d M Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Peminjam</th>
                <th>Item</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Total Biaya</th>
            </tr>
        </thead>
        <tbody>
            @foreach($histories as $index => $history)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $history->user->name }}</td>
                <td>{{ $history->item->name }}</td>
                <td>{{ $history->start_date->format('d/m/Y') }}</td>
                <td>{{ $history->end_date->format('d/m/Y') }}</td>
                <td>{{ $history->status }}</td>
                <td>Rp {{ number_format($history->total_cost, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
