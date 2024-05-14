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
        Schema::create('t_picking_list', function (Blueprint $table) {
            $table->char('doc_ref', 10);
            $table->date('delv_date');
            $table->char('site', 2);
            $table->integer('wh');
            $table->integer('seq');
            $table->char('sku', 6);
            $table->char('uom', 6);
            $table->char('rack_id', 9);
            $table->char('pallet', 4);
            $table->integer('qty');
            $table->date('outbound_on')->nullable();
            $table->char('outbound_by', 6)->nullable();
            $table->date('inbound_on')->nullable();
            $table->char('inbound_by', 6)->nullable();
            $table->tinyInteger('flag')->default('0');
            $table->primary(['doc_ref', 'delv_date', 'site', 'wh', 'seq', 'sku', 'uom', 'rack_id', 'pallet']);
            $table->index(['doc_ref', 'delv_date', 'site', 'wh', 'seq', 'sku', 'uom', 'rack_id', 'pallet']);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_picking_list');
    }
};