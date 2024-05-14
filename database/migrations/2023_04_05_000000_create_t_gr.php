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
        Schema::create('t_gr', function (Blueprint $table) {
            $table->char('po_no', 10);
            $table->tinyInteger('seq');
            $table->char('qc_by', 6);
            $table->string('sj_no', 20);
            $table->date('sj_date');
            $table->char('truck_no', 10);
            $table->string('driver', 30);
            $table->timestamp('created_at', $precision = 0);
            $table->char('created_by', 6);
            $table->timestamp('updated_at', $precision = 0);
            $table->char('updated_by', 6);
            $table->primary(['po_no', 'seq']);
            $table->index(['po_no', 'seq']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_gr');
    }
};
