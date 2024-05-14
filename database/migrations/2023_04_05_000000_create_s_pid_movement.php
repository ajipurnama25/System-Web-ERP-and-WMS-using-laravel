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
        Schema::create('s_pid_movement', function (Blueprint $table) {
            $table->char('site', 1);
            $table->char('pid', 8);
            $table->char('sku', 6);
            $table->char('uom', 3);
            $table->date('exp_date');
            $table->smallInteger('seq');
            $table->char('doc_ref', 12);
            $table->smallInteger('qty');
            $table->timestamp('created_at', $precision = 0);
            $table->char('created_by', 6);
            $table->timestamp('updated_at', $precision = 0);
            $table->char('updated_by', 6);
            $table->primary(['site', 'pid', 'sku', 'uom', 'exp_date', 'seq']);
            $table->index(['site', 'pid', 'sku', 'uom', 'exp_date', 'seq']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_pid_movement');
    }
};
