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
        Schema::create('s_pid', function (Blueprint $table) {
            $table->char('site', 1);
            $table->char('pid', 8);
            $table->tinyInteger('wh');
            $table->tinyInteger('source');
            $table->tinyInteger('qc_status');
            $table->string('qc_reason', 100);
            $table->char('rack_stack', 10);
            $table->char('reserved_by', 10);
            $table->timestamp('created_at', $precision = 0);
            $table->char('created_by', 6);
            $table->timestamp('updated_at', $precision = 0);
            $table->char('updated_by', 6);
            $table->primary(['site', 'pid']);
            $table->index(['site', 'pid']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_pid');
    }
};
