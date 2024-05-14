<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_batch_items', function (Blueprint $table) {
            $table->char('wo_no', 8);
            $table->tinyInteger('unit');
            $table->char('sku_bom', 6);
            $table->tinyInteger('batch_seq');
            $table->tinyInteger('item_seq');
            $table->char('sku', 6);
            $table->integer('weight');
            $table->primary(['wo_no', 'unit', 'sku_bom', 'batch_seq', 'item_seq']);
            $table->index(['wo_no', 'unit', 'sku_bom', 'batch_seq', 'item_seq']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_batch_items');
    }
};