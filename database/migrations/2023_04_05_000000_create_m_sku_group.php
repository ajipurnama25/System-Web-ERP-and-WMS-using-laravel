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
        Schema::create('m_sku_group', function (Blueprint $table) {
            $table->char('sku_bulk', 6);
            $table->string('sku_bulk_name', 50);
            $table->char('sku_rework', 6);
            $table->string('sku_rework_name', 50);
            $table->char('sku_wip', 6);
            $table->string('sku_wip_name', 50);
            $table->tinyInteger('sku_cook_type');
            $table->tinyInteger('status');
            $table->string('bom', 8);
            $table->smallInteger('weight_input');
            $table->smallInteger('weight_output');
            $table->smallInteger('lifespan');
            $table->char('md', 12);
            $table->timestamp('created_at', $precision = 0);
            $table->char('created_by', 6);
            $table->timestamp('updated_at', $precision = 0);
            $table->char('updated_by', 6);
            $table->primary(['sku_bulk']);
            $table->index(['sku_bulk']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_sku');
    }
};
