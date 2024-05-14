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
        Schema::create('m_request', function (Blueprint $table) {
            $table->smallInteger('dept');
            $table->tinyInteger('req_id');
            $table->string('req_desc', 100);
            $table->primary(['dept', 'req_id']);
            $table->index(['dept', 'req_id']);

                  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_request');
    }
};
