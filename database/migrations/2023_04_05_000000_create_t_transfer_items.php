<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_transfer_items', function (Blueprint $table) {
            $table->char('doc_trf', 10);
            $table->char('serv_site', 2);
            $table->char('req_site', 2);
            $table->char('sku', 6);
            $table->char('uom', 3);
            $table->integer('req_qty');
            $table->integer('acc_qty')->nullable();
            $table->integer('rcv_qty_good')->nullable();
            $table->integer('rcv_qty_bad')->nullable();
            $table->date('exp_date')->nullable();
            $table->primary(['doc_trf', 'serv_site', 'req_site', 'sku', 'uom']);
            $table->index(['doc_trf', 'serv_site', 'req_site', 'sku', 'uom']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_transfer_items');
    }
};