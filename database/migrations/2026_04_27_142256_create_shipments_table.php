<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transport_mode_id')->constrained('transport_modes')->onDelete('cascade');
            $table->string('from_city'); // Örn: Houston
            $table->string('to_city');   // Örn: Lagos
            $table->date('shipment_date'); // Sevkiyat tarihi
            $table->string('status')->default('upcoming'); // upcoming, departing, completed
            $table->text('notes')->nullable(); // Ek bilgi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
