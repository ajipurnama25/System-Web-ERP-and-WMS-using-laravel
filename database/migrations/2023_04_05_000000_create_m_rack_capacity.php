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
        Schema::create('m_rack_capacity', function (Blueprint $table) {
            $table->char('site', 1);
            $table->char('sku', 6);
            $table->tinyInteger('wh');
            $table->tinyInteger('max_cap');
            $table->timestamp('created_at', $precision = 0);
            $table->char('created_by', 6);
            $table->timestamp('updated_at', $precision = 0);
            $table->char('updated_by', 6);
            $table->primary(['site', 'sku', 'wh']);
            $table->index(['site', 'sku', 'wh']);
        });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_rack_capacity');
    }
};
