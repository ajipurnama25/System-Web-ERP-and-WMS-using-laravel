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
        Schema::create('t_do', function (Blueprint $table) {
            $table->char('doc_so', 10);
            $table->date('delv_date');
            $table->char('site', 1);
            $table->tinyInteger('seq');
            $table->char('vehicle_id', 10);
            $table->string('driver_name', 30);
            $table->timestamp('checkout_on', $precision = 0);
            $table->char('checkout_by', 6);
            $table->char('checkout_doc_qc', 6);
            $table->char('checkout_qc_checker', 6);
            $table->timestamp('checkin_on', $precision = 0);
            $table->char('checkin_by', 6);
            $table->char('checkin_doc_qc', 6);
            $table->char('checkin_qc_checker', 6);
            $table->char('invoice_no', 10);
            $table->string('reason', 100);
            $table->primary(['doc_so', 'delv_date', 'site', 'seq']);
            $table->index(['doc_so', 'delv_date', 'site', 'seq']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_do');
    }
};
