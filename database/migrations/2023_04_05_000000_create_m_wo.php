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
        Schema::create('m_wo', function (Blueprint $table) {
            $table->char('site', 1);
            $table->tinyInteger('unit');
            $table->char('sku_group', 6);
            $table->primary(['site', 'unit']);
            $table->index(['site', 'unit']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_wo');
    }
};
