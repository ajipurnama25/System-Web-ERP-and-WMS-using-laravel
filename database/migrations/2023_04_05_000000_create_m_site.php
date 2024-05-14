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
        Schema::create('m_site', function (Blueprint $table) {
            $table->char('site', 1);
            $table->char('site_code', 3);
            $table->string('site_name', 50);
            $table->tinyInteger('line_count');
            $table->tinyInteger('status');
            $table->timestamp('created_at', $precision = 0);
            $table->char('created_by', 6);
            $table->timestamp('updated_at', $precision = 0);
            $table->char('updated_by', 6);
            $table->primary(['site']);
            $table->index(['site']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_site');
    }
};
