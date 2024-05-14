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
        Schema::create('m_bom_tests', function (Blueprint $table) {
            $table->char('sku', 6);
            $table->char('ver', 5);
            $table->tinyInteger('seq');
            $table->char('item', 6);
            $table->string('item_name', 100);
            $table->integer('qty');
            $table->string('uom', 3);
            $table->double('weight');
            $table->tinyInteger('status');
            $table->primary(['sku', 'ver', 'seq']);
            $table->index(['sku', 'ver', 'seq']);

            // $table->char('bom', 8);
            // $table->char('raw_mat', 6);
            // $table->smallInteger('weight_input');
            // $table->primary(['bom', 'raw_mat']);
            // $table->index(['bom', 'raw_mat']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_bom_tests');
    }
};
