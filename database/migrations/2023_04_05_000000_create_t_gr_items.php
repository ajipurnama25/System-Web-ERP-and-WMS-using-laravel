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
        Schema::create('t_gr_items', function (Blueprint $table) {
            $table->char('po_no', 10);
            $table->tinyInteger('seq');
            $table->char('sku', 6);
            $table->date('exp_date');
            $table->integer('qty_good');
            $table->integer('qty_bad');
            $table->primary(['po_no', 'seq', 'sku', 'exp_date']);
            $table->index(['po_no', 'seq', 'sku', 'exp_date']);
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_gr_items');
    }
};
