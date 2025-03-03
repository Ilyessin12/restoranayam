<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom alamat dan nomor telepon (opsional)
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            // Kolom role dengan nilai default 'user'
            $table->enum('role', ['admin', 'user'])->default('user');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['address', 'phone', 'role']);
        });
    }
}
