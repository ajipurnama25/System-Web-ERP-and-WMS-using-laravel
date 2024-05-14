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
        Schema::create('t_batch', function (Blueprint $table) {
            $table->char('wo_no', 8);
            $table->tinyInteger('unit');
            $table->char('sku_bom', 6);
            $table->tinyInteger('batch_seq');
            $table->integer('weight');
            $table->timestamp('created_at', $precision = 0);
            $table->char('created_by', 6);
            $table->timestamp('updated_at', $precision = 0);
            $table->char('updated_by', 6);
            $table->primary(['wo_no', 'unit', 'sku_bom','batch_seq']);
            $table->index(['wo_no', 'unit', 'sku_bom', 'batch_seq']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_batch');
    }
};