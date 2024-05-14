<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()    
    {
        Schema::create('m_sku_price', function (Blueprint $table) {
            $table->char('sku', 6);
            $table->date('eff_date');
            $table->date('exp_date');
            $table->integer('reg_price');
            $table->integer('hrc_price');
            $table->timestamp('created_at', $precision = 0);
            $table->char('created_by', 6);
            $table->timestamp('updated_at', $precision = 0);
            $table->char('updated_by', 6);
            $table->primary(['sku', 'eff_date']);
            $table->index(['sku', 'eff_date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_sku_price');
    }
};
