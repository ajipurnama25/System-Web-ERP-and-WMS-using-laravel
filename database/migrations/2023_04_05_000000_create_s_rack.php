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
        Schema::create('s_rack', function (Blueprint $table) {
            $table->tinyInteger('site');
            $table->tinyInteger('wh');
            $table->tinyInteger('bay');
            $table->tinyInteger('row');
            $table->tinyInteger('tier');
            $table->char('rack_id', 9);
            $table->tinyInteger('capacity');
            $table->tinyInteger('available');
            $table->char('pid', 8);
            $table->tinyInteger('pallet');
            $table->char('sku', 6);
            $table->date('exp_date');
            $table->char('pid_temp', 8);
            $table->tinyInteger('pallet_temp');
            $table->primary(['site', 'wh', 'bay', 'row', 'tier']);
            $table->index(['site', 'wh', 'bay', 'row', 'tier']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_rack');
    }
};
