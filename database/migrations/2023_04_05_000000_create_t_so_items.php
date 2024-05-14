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
        Schema::create('t_so_items', function (Blueprint $table) {
            $table->char('doc_so', 10);
            $table->char('sku', 6);
            $table->char('uom', 3);
            $table->integer('sku_price');
            $table->smallInteger('so_qty');
            $table->smallInteger('delv_qty');
            $table->smallInteger('acc_qty');
            $table->primary(['doc_so', 'sku', 'uom']);
            $table->index(['doc_so', 'sku', 'uom']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_so_items');
    }
};
