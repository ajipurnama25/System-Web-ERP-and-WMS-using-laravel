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
        Schema::create('t_so', function (Blueprint $table) {
            $table->char('doc_so', 10);
            $table->string('ref_po_so', 20);
            $table->date('ref_po_date');
            $table->tinyInteger('status');
            $table->smallInteger('cust_code');
            $table->string('disc', 10);
            $table->tinyInteger('top');
            $table->integer('so_amt');
            $table->integer('acc_delv_amt');
            $table->integer('inv_amt');
            $table->integer('out_ar_amt');
            $table->primary(['doc_so']);
            $table->index(['doc_so']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_so');
    }
};
