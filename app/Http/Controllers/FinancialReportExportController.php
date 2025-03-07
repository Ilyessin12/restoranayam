<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order;

class FinancialReportExportController extends Controller
{
    /**
     * Export as Excel
     */
    public function exportExcel()
    {
        return Excel::download(new OrdersExport, 'Laporan_Keuangan_' . now()->format('Y-m-d') . '.xlsx');
    }

    /**
     * Export as CSV
     */
    public function exportCSV()
    {
        return Excel::download(new OrdersExport, 'Laporan_Keuangan_' . now()->format('Y-m-d') . '.csv');
    }

    /**
     * Export as PDF
     */
    public function exportPDF()
    {
        $orders = Order::with('user')->get();
        $pdf = Pdf::loadView('exports.orders_pdf', compact('orders'))->setPaper('a4', 'landscape');

        return $pdf->download('Laporan_Keuangan_' . now()->format('Y-m-d') . '.pdf');
    }
}
