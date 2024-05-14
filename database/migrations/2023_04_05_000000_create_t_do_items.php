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
        Schema::create('t_do_items', function (Blueprint $table) {
            $table->char('doc_so', 10);
            $table->date('delv_date');
            $table->char('site', 1);
            $table->tinyInteger('seq');
            $table->char('sku', 6);
            $table->char('uom', 3);
            $table->smallInteger('delv_qty');
            $table->smallInteger('acc_qty');
            $table->smallInteger('undelv_qty_good');
            $table->smallInteger('undelv_qty_bad');
            $table->primary(['doc_so', 'delv_date', 'site', 'seq', 'sku', 'uom']);
            $table->index(['doc_so', 'delv_date', 'site', 'seq', 'sku', 'uom']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_do_items');
    }
};
