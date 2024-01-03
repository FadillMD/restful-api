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
        Schema::create('sopr_product_determinations', function (Blueprint $table) {
            $table->id();
            $table->string('code_number');
            $table->string('id_sopr');
            $table->string('id_product_determination');
            $table->string('qty_order');
            $table->date('delivery_req');
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sopr_product_determinations');
    }
};
