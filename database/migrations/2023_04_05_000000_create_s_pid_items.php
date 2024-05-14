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
        Schema::create('s_pid_items', function (Blueprint $table) {
            $table->char('site', 1);
            $table->char('pid', 8);
            $table->char('sku', 6);
            $table->char('uom', 3);
            $table->date('exp_date');
            $table->smallInteger('qty_origin');
            $table->smallInteger('qty_stock');
            $table->primary(['site', 'pid', 'sku', 'uom', 'exp_date']); 
            $table->index(['site', 'pid', 'sku', 'uom', 'exp_date']); 
        });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_pid_items');
    }
};
