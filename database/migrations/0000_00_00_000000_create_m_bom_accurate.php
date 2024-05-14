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
        Schema::create('m_bom_accurate', function (Blueprint $table) {
            $table->char('sku', 6);
            $table->char('ver', 5);
            $table->tinyInteger('seq');
            $table->string('sku_name', 100);
            $table->char('item', 6);
            $table->string('item_name', 100);
            $table->integer('qty');
            $table->string('uom', 3);
            $table->tinyInteger('status');
            $table->primary(['sku', 'ver', 'seq']);
            $table->index(['sku', 'ver', 'seq']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_bom_accurate');
    }
};
