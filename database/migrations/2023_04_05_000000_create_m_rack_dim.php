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
        Schema::create('m_rack_dim', function (Blueprint $table) {
            $table->tinyInteger('site');
            $table->tinyInteger('wh');
            $table->tinyInteger('bay');
            $table->tinyInteger('row');
            $table->tinyInteger('tier');
            $table->primary(['site', 'wh']);
            $table->index(['site', 'wh']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_rack_dim');
    }
};
