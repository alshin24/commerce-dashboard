<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')
                ->constrained('barang', 'id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('faktur_id')
                ->constrained('faktur_id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->integer('diskon');
            $table->string('nama_barang');
            $table->integer('harga');
            $table->integer('subtotal');
            $table->integer('qty');
            $table->integer('hasil_qty');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail');
    }
};
