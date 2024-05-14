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
        Schema::create('t_retur', function (Blueprint $table) {
            $table->char('doc_ret', 8);
            $table->tinyInteger('status');
            $table->char('doc_so', 8);
            $table->datetime('req_on', $precision = 0);
            $table->char('req_by', 6);
            $table->datetime('app_on', $precision = 0);
            $table->char('app_by', 6);
            $table->char('serv_site', 1);
            $table->datetime('serv_on', $precision = 0);
            $table->char('serv_by', 6);
            $table->char('vehicle_id', 10);
            $table->string('driver_name', 30);
            $table->datetime('inbound_on', $precision = 0);
            $table->char('inbound_by', 6);
            $table->char('doc_qc', 6);
            $table->char('qc_checker', 6);
            $table->primary(['doc_ret']);
            $table->index(['doc_ret']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_retur');
    }
};
