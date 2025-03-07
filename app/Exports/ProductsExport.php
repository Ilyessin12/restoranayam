<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Collection;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Retrieve data to export
     */
    public function collection()
	{
		$date = now()->format('Y-m-d');

		// Fetch products from database
		$products = Product::select('id', 'name', 'price', 'stock', 'updated_at')->get();

		// Convert to a collection
		return collect($products);
	}

	/**
	 * Define headers for the exported file
	 */
	public function headings(): array
	{
		$date = now()->format('Y-m-d');

		return [
			["Laporan Stok Barang - Tanggal: $date"], // Date in a single column
			['ID', 'Nama Produk', 'Harga', 'Stok', 'Terakhir Diperbarui'], // Headers
		];
	}


    /**
     * Format each row
     */
    public function map($product): array
	{
		if (!($product instanceof Product)) {
			return [$product]; // Return raw data if it's not a Product model
		}

		return [
			$product->id,
			$product->name,
			number_format($product->price, 0, ',', '.'), // Format price
			$product->stock ?? 'N/A',
			$product->updated_at ? $product->updated_at->format('Y-m-d H:i') : 'Never',
		];
	}
}
