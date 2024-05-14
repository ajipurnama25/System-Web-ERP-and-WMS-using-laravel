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
        Schema::create('s_stock', function (Blueprint $table) {
            $table->char('site', 1);
            $table->tinyInteger('wh');
            $table->char('sku', 6);
            $table->char('uom', 3);
            $table->date('exp_date');
            $table->smallInteger('qty');
            $table->integer('weight');
            $table->primary(['site', 'wh', 'sku', 'uom', 'exp_date']);
            $table->index(['site', 'wh', 'sku', 'uom', 'exp_date']);
        });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_stock');
    }
};
