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
        Schema::create('t_ro', function (Blueprint $table) {
            $table->char('doc_ro', 10);
            $table->date('doc_date');
            $table->tinyInteger('status');
            $table->smallInteger('dept');
            $table->timestamp('created_at', $precision = 0);
            $table->char('created_by', 6);
            $table->timestamp('approved_at', $precision = 0);
            $table->char('approved_by', 6);
            $table->timestamp('received_at', $precision = 0);
            $table->char('received_by', 6);
            $table->timestamp('executed_at', $precision = 0);
            $table->char('executed_by', 6);
            $table->timestamp('accepted_at', $precision = 0);
            $table->char('accepted_by', 6);
            $table->primary(['doc_ro']);
            $table->index(['doc_ro']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_ro');
    }
};
