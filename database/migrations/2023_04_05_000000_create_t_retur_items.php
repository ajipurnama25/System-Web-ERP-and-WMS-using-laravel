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
        Schema::create('t_retur_items', function (Blueprint $table) {
            $table->char('doc_ret', 8);
            $table->char('sku', 6);
            $table->char('uom', 3);
            $table->smallInteger('req_qty');
            $table->smallInteger('app_qty');
            $table->smallInteger('act_qty_good');
            $table->smallInteger('act_qty_bad');
            $table->string('reason', 100);
            $table->primary(['doc_ret', 'sku', 'uom']);
            $table->index(['doc_ret', 'sku', 'uom']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_retur_items
        ');
    }
};
