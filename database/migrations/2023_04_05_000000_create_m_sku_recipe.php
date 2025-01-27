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
        Schema::create('m_sku_recipe', function (Blueprint $table) {
            $table->char('sku', 6);
            $table->char('raw_mat', 6);
            $table->tinyInteger('category');
            $table->smallInteger('weight_input');
            $table->primary(['sku', 'raw_mat']);
            $table->index(['sku', 'raw_mat']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_sku_recipe');
    }
};
