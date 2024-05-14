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
        Schema::create('t_mr', function (Blueprint $table) {
            $table->char('wo_no', 10);
            $table->smallInteger('unit');
            $table->tinyInteger('wh_storage');
            $table->char('sku', 6);
            $table->smallInteger('qty');
            $table->integer('weight');
            $table->smallInteger('qty_released');
            $table->integer('weight_released');
            $table->smallInteger('qty_cancelled');
            $table->integer('weight_cancelled');
            $table->smallInteger('qty_returned');
            $table->integer('weight_returned');
            $table->timestamp('released_at', $precision = 0)->nullable();
            $table->char('released_by', 6)->nullable();
            $table->tinyInteger('status');
            $table->primary(['wo_no','unit','wh_storage','sku']);
            $table->index(['wo_no','unit','wh_storage','sku']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_mr');
    }
};
