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
        Schema::create('supplier', function (Blueprint $table) {
            $table->string('code', 255);
            $table->string('nama', 255);
            $table->string('address')->nullable();
            $table->string('contact_person', 12);
            $table->string('npwp', 255)->unique();
            $table->string('ceo', 255);
            $table->string('purc', 255);
            $table->string('fin', 255);
            $table->string('c_phone', 255);
            $table->string('p_phone', 255);
            $table->string('f_phone', 255);
            $table->string('c_email', 255);
            $table->string('p_email', 255);
            $table->string('f_email', 255);
            $table->string('bday', 255);

            $table->timestamp('created_at', $precision = 0);
            $table->timestamp('updated_at', $precision = 0);
            $table->primary(['code']);
            $table->index(['code']);
        });
    }

    /**
     * Reverse the migrations.3
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier');
    }
};
