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
        Schema::create('t_production_bills', function (Blueprint $table) {
            $table->char('doc_no', 12);
            $table->char('raw_mat', 6);
            $table->smallInteger('qty');
            $table->integer('weight');
            $table->primary(['doc_no', 'raw_mat']);
            $table->index(['doc_no', 'raw_mat']);
        });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_production_bills');
    }
};
