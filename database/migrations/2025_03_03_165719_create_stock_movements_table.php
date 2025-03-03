<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockMovementsTable extends Migration
{
    public function up()
    {
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel products
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            // Tipe pergerakan: 'in' untuk penambahan, 'out' untuk pengurangan
            $table->enum('movement_type', ['in', 'out']);
            $table->integer('quantity');
            $table->timestamp('movement_date')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_movements');
    }
};