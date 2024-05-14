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
        Schema::create('s_pallet', function (Blueprint $table) {
            $table->char('site', 1);
            $table->smallInteger('pallet');
            $table->tinyInteger('status');
            $table->smallInteger('use_freq');
            $table->integer('use_hour');
            $table->char('pid', 8);
            $table->tinyInteger('wh');
            $table->timestamp('created_at', $precision = 0);
            $table->char('created_by', 6);
            $table->timestamp('updated_at', $precision = 0);
            $table->char('updated_by', 6);
            $table->primary(['site', 'pallet']);
            $table->index(['site', 'pallet']);
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_pallet');
    }
};
