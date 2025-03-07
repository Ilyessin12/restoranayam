<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Collection;

class OrdersExport implements FromCollection, WithHeadings, WithMapping
{
    protected $date;
    protected $totalSum;

    public function __construct()
    {
        $this->date = now()->format('Y-m-d');
    }

    /**
     * Retrieve data to export
     */
    public function collection()
    {
        $orders = Order::with('user')->select('id', 'user_id', 'total', 'order_date', 'status')->get();
        
        // Calculate total sum of all orders
        $this->totalSum = $orders->sum('total');

        // Add total row at the end as an array
        $totalRow = [
            'id' => null, 
            'user_id' => 'TOTAL', 
            'total' => $this->totalSum, 
            'order_date' => null, 
            'status' => null
        ];

        return $orders->push($totalRow); // Push the total row to the orders collection
    }

    /**
     * Define headers for the exported file
     */
    public function headings(): array
    {
        return [
            ["Laporan Keuangan - Tanggal: {$this->date}"], // Title row
            [], // Empty row for spacing
            ['Order ID', 'Customer', 'Total', 'Order Date', 'Status'], // Column headers
        ];
    }

    /**
     * Format each row
     */
    public function map($order): array
    {
        // Check if this is the total row
        if (is_null($order['id'])) {
            return [
                '', // Empty Order ID column
                $order['user_id'], // "TOTAL" label
                'Rp. ' . number_format($order['total'], 2, ',', '.'), // Total amount
                '', // Empty Order Date column
                ''  // Empty Status column
            ];
        }

        return [
            $order->id,
            $order->user->name ?? 'Guest',
            'Rp. ' . number_format($order->total, 2, ',', '.'),
            $order->order_date ? \Carbon\Carbon::parse($order->order_date)->format('Y-m-d H:i') : 'Unknown',
            ucfirst($order->status),
        ];
    }
}
