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
        Schema::create('emp_salaries', function (Blueprint $table) {
            $table->id();
            $table->string('trn_id');
            $table->string('emp_id');
            $table->string('payroll_field_id');
            $table->double('debit');
            $table->credit('credit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_salaries');
    }
};
