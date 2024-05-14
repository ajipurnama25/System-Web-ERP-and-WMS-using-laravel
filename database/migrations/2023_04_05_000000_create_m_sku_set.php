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
        Schema::create('m_sku_set', function (Blueprint $table) {
            $table->char('fg_curah', 6);
            $table->char('wip_curah', 6);
            $table->char('wip_lg', 6);
            $table->char('wip_rework', 6);
            $table->char('wip_adonan', 6);
            $table->string('sku_name', 50);
            $table->tinyInteger('sku_cook_type');
            $table->tinyInteger('status');
            $table->smallInteger('lifespan');
            $table->timestamp('created_at', $precision = 0);
            $table->char('created_by', 6);
            $table->timestamp('updated_at', $precision = 0);
            $table->char('updated_by', 6);
            $table->primary(['fg_curah']);
            $table->index(['fg_curah']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_sku_set');
    }
};
