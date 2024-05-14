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
        Schema::create('t_wo_items', function (Blueprint $table) {
            $table->char('wo_no', 8);
            $table->tinyInteger('unit');
            $table->tinyInteger('wo_seq');
            $table->tinyInteger('status');
            $table->boolean('active');
            $table->char('sku', 6);
            $table->datetime('start')->nullable();
            $table->datetime('finish')->nullable();
            $table->integer('weight_assigned');
            $table->integer('weight_produced');
            $table->primary(['wo_no', 'unit',  'wo_seq']);
            $table->index(['wo_no', 'unit', 'wo_seq']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_wo_items');
    }
};
