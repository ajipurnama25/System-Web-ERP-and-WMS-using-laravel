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
        Schema::create('t_pickpack', function (Blueprint $table) {
            $table->char('doc_ref', 10);
            $table->char('site', 1);
            $table->char('pid', 8);
            $table->char('sku', 6);
            $table->char('uom', 3);
            $table->integer('qty');
            $table->primary(['doc_ref', 'site', 'pid', 'sku', 'uom']);
            $table->index(['doc_ref', 'site', 'pid', 'sku', 'uom']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_pickpack');
    }
};
