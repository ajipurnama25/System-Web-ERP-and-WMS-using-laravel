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
        Schema::create('t_po_items', function (Blueprint $table) {
            $table->char('po_no', 10);
            $table->char('sku', 6);
            $table->integer('qty');
            $table->integer('outstanding');
            $table->char('uom', 3);
            $table->integer('prc');
            $table->primary(['po_no', 'sku']);
            $table->index(['po_no', 'sku']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_po_items');
    }
};
