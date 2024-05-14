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
        Schema::create('t_wo_batch', function (Blueprint $table) {
            $table->char('wo_no', 8);
            $table->tinyInteger('unit');
            $table->char('sku_bom', 6);
            $table->integer('batch_kg');
            $table->integer('weight_assigned');
            $table->integer('weight_batched');
            $table->integer('weight_produced');
            $table->tinyInteger('produce_seq');
            $table->tinyInteger('batch_seq');
            $table->tinyInteger('status');
            $table->datetime('start')->nullable();
            $table->datetime('finish')->nullable();
            $table->primary(['wo_no', 'unit', 'sku_bom']);
            $table->index(['wo_no', 'unit', 'sku_bom']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_wo_batch');
    }
};