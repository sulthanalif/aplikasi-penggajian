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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('date')->format('Y-m-d');
            $table->decimal('total_salary', 10, 2)->default(0);
            $table->decimal('receipt_or_donation', 10, 2)->default(0);
            $table->decimal('savings', 10, 2)->default(0);
            $table->decimal('cooperative', 10, 2)->default(0);
            $table->decimal('bank', 10, 2)->default(0);
            $table->decimal('total_payroll', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
