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
        Schema::create('m_warehouse', function (Blueprint $table) {
            $table->char('site', 1);
            $table->tinyInteger('wh');
            $table->string('wh_name', 30);
            $table->string('wh_alias', 50);
            $table->tinyInteger('wh_kind');
            $table->smallInteger('min_temp');
            $table->smallInteger('max_temp');
            $table->tinyInteger('status');
            $table->timestamp('created_at', $precision = 0);
            $table->char('created_by', 6);
            $table->timestamp('updated_at', $precision = 0);
            $table->char('updated_by', 6);
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
        Schema::dropIfExists('m_warehouse');
    }
};
