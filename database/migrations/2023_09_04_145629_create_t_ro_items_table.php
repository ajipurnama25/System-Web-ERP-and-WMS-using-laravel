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
        Schema::create('t_ro_items', function (Blueprint $table) {
            $table->char('doc_ro', 10);
            $table->tinyInteger('seq');
            $table->tinyInteger('seq_status');
            $table->tinyInteger('req_id');
            $table->smallInteger('qty');
            $table->string('rem', 100);
            $table->primary(['doc_ro', 'seq']);
            $table->index(['doc_ro', 'seq']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_ro_items');
    }
};
