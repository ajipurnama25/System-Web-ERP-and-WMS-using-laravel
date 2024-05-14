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
        Schema::create('t_production', function (Blueprint $table) {
            $table->char('doc_no', 12);
            $table->tinyInteger('machine');
            $table->char('batch', 15);
            $table->char('sku', 6);
            $table->date('exp_date');
            $table->smallInteger('qty');
            $table->smallInteger('pallet');
            $table->char('pid', 8);
            $table->timestamp('created_at', $precision = 0);
            $table->char('created_by', 6);
            $table->timestamp('updated_at', $precision = 0);
            $table->char('updated_by', 6);
            $table->primary(['doc_no']);
            $table->index(['doc_no']);
        });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_production');
    }
};
