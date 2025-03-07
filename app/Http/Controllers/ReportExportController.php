<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Product;

class ReportExportController extends Controller
{
    /**
     * Export as Excel
     */
    public function exportExcel()
	{
		$date = now()->format('Y-m-d'); // Get current date (YYYY-MM-DD)
		return Excel::download(new ProductsExport, "Laporan_Stok_Barang_{$date}.xlsx");
	}

	/*
	 * Export as CSV
	 */
	public function exportCSV()
	{
		$date = now()->format('Y-m-d'); // Get current date (YYYY-MM-DD)
		return Excel::download(new ProductsExport, "Laporan_Stok_Barang_{$date}.csv");
	}
	
	/*
	 * Export as PDF
	 */
	public function exportPDF()
	{
		$products = Product::all();
		$date = now()->format('Y-m-d'); // Get current date (YYYY-MM-DD)

		$pdf = Pdf::loadView('exports.products_pdf', compact('products', 'date'));
		
		return $pdf->download("Laporan_Stok_Barang_{$date}.pdf");
	}

}
