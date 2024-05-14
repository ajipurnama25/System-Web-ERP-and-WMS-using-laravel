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
        Schema::create('m_rm', function (Blueprint $table) {
            $table->char('sku', 6);
            $table->tinyInteger('rm_inv_type');
            $table->smallInteger('rm_cat_type');
            $table->char('rm_group', 4);
            $table->string('sku_name', 50);
            $table->char('uom2', 3);
            $table->smallInteger('rate2');
            $table->char('uom1', 3);
            $table->integer('rate1');
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
        Schema::dropIfExists('m_rm');
    }
};
