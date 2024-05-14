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
        Schema::create('m_sku', function (Blueprint $table) {
            $table->char('sku', 6);
            $table->tinyInteger('sku_brand');
            $table->char('sku_group', 6);
            $table->tinyInteger('sku_cook_type');
            $table->string('sku_name', 50);
            $table->tinyInteger('status');
            $table->smallInteger('weight');
            $table->string('bom', 8);
            $table->smallInteger('weight_input');
            $table->smallInteger('weight_output');
            $table->tinyInteger('ctn_pack');
            $table->smallInteger('lifespan');
            $table->char('barcode', 13);
            $table->char('md', 12);
            $table->timestamp('created_at', $precision = 0);
            $table->char('created_by', 6);
            $table->timestamp('updated_at', $precision = 0);
            $table->char('updated_by', 6);
            $table->primary(['sku']);
            $table->index(['sku']);
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
