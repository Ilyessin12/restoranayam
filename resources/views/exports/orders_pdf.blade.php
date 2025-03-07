<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        th { background-color: #f89d36; color: white; }
        .total-row { font-weight: bold; background-color: #eee; }
    </style>
</head>
<body>
    <h2>Laporan Keuangan</h2>
    <p>Tanggal: {{ now()->format('d M Y') }}</p>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalSum = 0;
            @endphp
            @foreach ($orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->user->name ?? 'Guest' }}</td>
                <td>Rp. {{ number_format($order->total, 2, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d H:i') }}</td>
                <td>{{ ucfirst($order->status) }}</td>
            </tr>
            @php
                $totalSum += $order->total;
            @endphp
            @endforeach

            <!-- Total Row -->
            <tr class="total-row">
                <td colspan="2">TOTAL</td>
                <td>Rp. {{ number_format($totalSum, 2, ',', '.') }}</td>
                <td colspan="2"></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
