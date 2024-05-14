<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_transfer', function (Blueprint $table) {
            $table->char('doc_trf', 10);
            $table->char('serv_site', 2);
            $table->tinyInteger('status');
            $table->date('delv_date')->nullable();
            $table->char('created_by_site', 2)->nullable();
            $table->date('req_date');
            $table->char('req_site', 2);
            $table->tinyInteger('req_wh')->nullable();
            $table->timestamp('req_on', $precision = 0);
            $table->char('req_by', 6);
            $table->timestamp('acc_on', $precision = 0)->nullable();
            $table->char('acc_by', 6)->nullable();
            $table->char('vehicle_id', 10)->nullable();
            $table->string('driver_name', 30)->nullable();
            $table->timestamp('outbound_on', $precision = 0)->nullable();
            $table->char('outbound_by', 6)->nullable();
            $table->char('outbound_doc_qc', 10)->nullable();
            $table->char('outbound_qc_checker', 6)->nullable();
            $table->timestamp('inbound_on', $precision = 0)->nullable();
            $table->char('inbound_by', 6)->nullable();
            $table->char('inbound_doc_qc', 6)->nullable();
            $table->char('inbound_qc_checker', 6)->nullable();
            $table->tinyInteger('type')->default('0')->nullable();
            $table->primary(['doc_trf', 'serv_site', 'req_site']);
            $table->index(['doc_trf', 'serv_site', 'req_site']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_transfer');
    }
};